<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getData(Request $request, $id)
    {
        $data = Product::where('user_id', $id)->get();
        $category = Category::all();

        return view('organizeProduct')->with('data', $data)->with('category', $category);
    }

    function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $input = $request->only('name', 'price', 'description', 'category_id', 'user_id');

        $user = User::where('id', $input['user_id'])->first();

        $files = $request->file('image');
        $ext = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
        $file_ext = $files->getClientOriginalExtension();

        if (in_array($file_ext, $ext)) {
            $name = \Illuminate\Support\Str::random(7) . "_" . $user['name'] . "_" . $files->getClientOriginalName();
            $input['gallery'] = $name;
            $request->image->move(public_path() . "/product_images", $name);
        } else {
            return redirect()->route('organize', session()->get('user')['id']);
            // return redirect()->route('organize' , session()->get('user')['id'])->with('error');
        }

        $insert = Product::create($input);

        if (!$insert) {
            return redirect()->route('organize', session()->get('user')['id']);
            // return redirect()->route('organize', session()->get('user')['id'])->with('error1');
        }

        return redirect()->route('organize', session()->get('user')['id']);
    }

    function detail(Request $request, $id)
    {
        $data = Product::where('id', $id)->first();
        $category = Category::all();

        return view('User.productDetail')->with('data', $data)->with('category', $category);
    }

    function update(Request $request, $id)
    {

        $data = Product::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $input = $request->only('name', 'price', 'description', 'category_id');

        $user = User::where('id', $data['user_id'])->first();

        if ($request->image) {
            $files = $request->file('image');
            $ext = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
            $file_ext = $files->getClientOriginalExtension();

            if (in_array($file_ext, $ext)) {
                $name = \Illuminate\Support\Str::random(7) . "_" . $user['name'] . "_" . $files->getClientOriginalName();
                $input['gallery'] = $name;
                $request->image->move(public_path() . "/product_images", $name);
            } else {
                return redirect()->route('organize', session()->get('user')['id']);
                // return redirect()->route('organize' , session()->get('user')['id'])->with('error');
            }
        }

        $update = $data->update($input);

        if (!$update) {
            return redirect()->route('organize', session()->get('user')['id']);
            // return redirect()->route('organize', session()->get('user')['id'])->with('error1');
        }

        return redirect()->route('organize', session()->get('user')['id']);
    }

    function delete(Request $request, $id){
        $data = Product::where('id' , $id)->first();

        $delete = $data->delete();

        if ($delete) {
            return redirect()->route('organize', session()->get('user')['id']);
        }else{
            return redirect()->route('organize', session()->get('user')['id']);
        }
    }
}
