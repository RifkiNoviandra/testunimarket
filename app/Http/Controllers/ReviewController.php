<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    function create(Request $request, $id){
        $request->validate([
            'review' => 'required',
            'rating' => 'required',
            'user_id' => 'required',
        ]);

        $input = $request->only('review', 'rating', 'user_id');
        $input['product_id'] = $id;

        $create = Review::create($input);

        if (!$create) {
            return redirect()->route('product.detail', $id)->with('message');
        }
        return redirect()->route('product.detail', $id)->with('message');
    }

    function update(Request $request, $id){

        $request->validate([
            'review' => 'required',
        ]);

        $data = Review::find($id);

        $input = $request->only('review');

        if ($request->rating) {
            $input['rating'] = $request->rating;
        }

        $update = $data->update($input);

        if (!$update) {
            return redirect()->route('product.detail', $data['product_id'])->with('message');
        }
        return redirect()->route('product.detail', $data['product_id'])->with('message');
    }

    function delete(Request $request, $id){

        $data = Review::find($id);

        $delete = $data->delete();

        if (!$delete) {
            return redirect()->route('product.detail', $data['product_id'])->with('message');
        }
        return redirect()->route('product.detail', $data['product_id'])->with('message');
    }
}
