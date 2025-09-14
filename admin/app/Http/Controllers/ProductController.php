<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCreated;
use App\Jobs\ProductDeleted;
use App\Jobs\ProductUpdated;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:255',

        ]);

        $product = Product::create([
            'title' => $request->title,
            'image' => $request->image,

        ]);

        // return $product->toArray();

        ProductCreated::dispatch($product->toArray());

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|string|max:255',
        ]);

        $product = Product::find($id);

        // Add a check to handle cases where the product is not found
        if (!$product) {
            return response()->json([
                'message' => 'Product not found.'
            ], 404);
        }

        $product->update($request->only(['title', 'image']));

        // return gettype($product->toArray());


        ProductUpdated::dispatch($product->toArray());

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id);
        ProductDeleted::dispatch($id);

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
