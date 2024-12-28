<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    function index(): View
    {
        $data = Product::all();
        $data_banner = Product::where('flag_banner', 'yes')->get();
        $data_sale = Product::where('flag_flash', 'yes')->get();
        return view('product', ['products' => $data, 'banner' => $data_banner, 'sale' => $data_sale]);
    }

    function detail($id): View
    {
        $data = Product::find($id);
        if (session()->get('user')['id']) {
            $review_user = Review::with('user')->where('user_id', session()->get('user')['id'])->where('product_id', $id)->get();
            $review = Review::with('user')->whereNot('user_id', session()->get('user')['id'])->where('product_id', $id)->get();
            return view('detail', ['product' => $data, 'review_user' => $review_user, 'review' => $review]);
        }else{
            $review = Review::with('user')->where('product_id', $id)->get();
            return view('detail', ['product' => $data, 'review' => $review]);
        }
    }

    function search(Request $request): View
    {
        $data = Product::where('name', 'like', '%' . $request->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }

    function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart();
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    static function cartItems()
    {
        $user_id = session('user')['id'];
        return Cart::where('user_id', $user_id)->count();
    }

    function cartList()
    {
        $user_id = session()->get('user')['id'];
        $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $user_id)
            ->select('products.*', 'carts.id as cart_id')
            ->get();
        return view('cartlist', ['products' => $products]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cart-list');
    }

    function orderNow()
    {
        $user_id = session()->get('user')['id'];
        $total = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $user_id)
            ->sum('products.price');
        return view('ordernow', ['total' => $total]);
    }

    function placeOrder(Request $request)
    {
        $user_id = session()->get('user')['id'];
        $all_cart = Cart::where('user_id', $user_id)->get();

        foreach ($all_cart as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $user_id;
            $order->status = "pending";
            $order->payment_method = $request->payment;
            $order->payment_status = "pending";
            $order->address = $request->address;
            $order->save();
            Cart::where('user_id', $user_id)->delete();
        }

        return redirect('/');
    }

    function myOrders()
    {
        if (session()->has('user')) {
            $user_id = session()->get('user')['id'];
            $orders = DB::table('orders')
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->where('orders.user_id', $user_id)
                ->get();
            return view('myorders', ['orders' => $orders]);
        } else {
            return redirect('login');
        }
    }
}
