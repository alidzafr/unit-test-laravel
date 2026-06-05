<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:25|string',
            'price' => 'required|max:25|string',
            'brand' => 'required|max:25',
            'category' => 'required|max:25',
            'color' => 'required|max:25',
            'description' => 'required|max:25',
            'qty' => 'required|max:25',
            'image' => 'max:25',
        ]);
        dd($validated);
        Product::create($validated);
        return redirect()->route('products.index');
        // dd($newProduct);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $products)
    {
        return view('product.edit', ['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:25|string',
            'price' => 'required|max:25|string'
        ]);

        Product::where('id', $id)->update($validated);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where('id', $id)->delete();

        return redirect()->route('products.index');
    }
}
