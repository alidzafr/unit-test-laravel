<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest();

        if (request('search')) {
            $products->where('name', 'like', '%' . request('search') . '%');
        }

        // $products = Product::with('category')->orderBy('id', 'DESC')->paginate(10)->withQueryString();
        return view('product.index', [
            'products' => $products->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|max:25|string',
            'price' => 'required|max:1000000|numeric',
            'brand' => 'required|max:25|string',
            'category_id' => 'required|max:1000|integer',
            'color' => 'required|max:25|string',
            'description' => 'required|max:1000|string',
            'qty' => 'required|max:1000000|integer',
            'photo' => 'required|image|mimes:png,jpg,svg'
        ]);
        DB::beginTransaction();

        try {
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('product_photos', 'public');
                $validated['photo'] = $photoPath;
            }
            $validated['slug'] = Str::slug($request->name);
            // slug product
            $newProduct = Product::create($validated);

            DB::commit();

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            DB::rollback();

            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    public function show(Product $products)
    {
        $cat_id = $products->category_id;
        $category = Category::findOrFail($cat_id);

        return view('product.show', [
            'product' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $products)
    {
        $categories = Category::all();
        return view('product.edit', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $products)
    {
        $validated = $request->validate([
            'name' => 'required|max:25|string',
            'price' => 'required|max:1000000|numeric',
            'brand' => 'required|max:25|string',
            'category_id' => 'required|max:1000|integer',
            'color' => 'required|max:25|string',
            'description' => 'required|max:1000|string',
            'qty' => 'required|max:1000000|integer',
            'photo' => 'sometimes|image|mimes:png,jpg,svg'
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('photo')) {
                $productPath = $request->file('photo')->store('product_photos', 'public');
                $validated['photo'] = $productPath;
            }
            // Slug nama
            $products->update($validated);

            DB::commit();

            return redirect()->route('products.show', $products->id);
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
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
