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

        $products = Product::with('category')->orderBy('id', 'DESC')->paginate(10);
        return view('product.index', compact('products'));
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
            'price' => 'required|max:1000000|integer',
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
        return view('product.edit', ['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:25|string',
            'price' => 'required|max:25|string',
            'brand' => 'required|max:25',
            'category' => 'required|max:25',
            'color' => 'required|max:25',
            'description' => 'required|max:1000|string',
            'qty' => 'required|max:25',
            'image' => 'max:25',
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
