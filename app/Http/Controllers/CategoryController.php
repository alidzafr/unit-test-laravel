<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:35|string|unique:categories,name',
            'tagline' => 'max:35|string',
            'photo' => 'image|mimes:png,jpg,svg'
        ], [
            'name.unique' => 'Nama Kategori sudah digunakan.'
        ]);
        
        DB::beginTransaction();

        try {
            $validated['slug'] = Str::slug($request->name);
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('category_photos', 'public');
                $validated['photo'] = $photoPath;
            }

            $newCategory = Category::create($validated);

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }

        
        // need validation for unique
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
