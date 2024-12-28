<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function getData(){
        $product = Product::with('user')->get();

        $product_banner = Product::where('flag_banner' , 'yes')->get();

        return view('admin.views.bannerSelect')->with(['product' => $product, 'product_banner' => $product_banner]);
    }

    function upBanner(Request $request, $id){
        $data = Product::find($id);

        $input['flag_banner'] = 'yes';

        $update = $data->update($input);

        if (!$update) {
            return redirect()->route('admin.banner')->with('message');
        }
        return redirect()->route('admin.banner')->with('message');
    }

    function downBanner(Request $request, $id){
        $data = Product::find($id);

        $input['flag_banner'] = 'no';

        $update = $data->update($input);

        if (!$update) {
            return redirect()->route('admin.banner')->with('message');
        }
        return redirect()->route('admin.banner')->with('message');
    }
}
