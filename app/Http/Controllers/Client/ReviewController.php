<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable',
        ]);

        Auth::user()->reviews()->create(array_merge($data, [
            'product_id' => $product->id,
        ]));

        return redirect()->route('products.show', $product);
    }
}
