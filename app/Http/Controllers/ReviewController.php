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
}
