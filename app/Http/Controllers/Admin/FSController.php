<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FSController extends Controller
{
    function getData(){
        $product = Product::with('user')->get();

        $product_flash = Product::where('flag_flash' , 'yes')->get();

        return view('admin.views.flashSelect')->with(['product' => $product, 'product_flash' => $product_flash]);
    }

    function upFlash(Request $request, $id){
        $data = Product::find($id);

        $input['flag_flash'] = 'yes';

        $update = $data->update($input);

        if (!$update) {
            return redirect()->route('admin.flash')->with('message');
        }
        return redirect()->route('admin.flash')->with('message');
    }

    function downFlash(Request $request, $id){
        $data = Product::find($id);

        $input['flag_flash'] = 'no';

        $update = $data->update($input);

        if (!$update) {
            return redirect()->route('admin.flash')->with('message');
        }
        return redirect()->route('admin.flash')->with('message');
    }
}
