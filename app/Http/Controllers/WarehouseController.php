<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::filter(request(['search']))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('warehouse.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|string',
            'phone' => 'required|max:10000000000|numeric',
            'address' => 'required|max:50|string'
        ]);

        DB::beginTransaction();

        try {
            $newWarehouse = Warehouse::create($validated);
            $newWarehouse->slug;

            DB::commit();

            return redirect()->route('warehouse.index')
                ->with('success', 'Warehouse created successfully');
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
    public function show(Warehouse $warehouse)
    {
        $warehouse->load('products');
        return view('warehouse.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|string',
            'phone' => 'required|max:10000000000|numeric',
            'address' => 'required|max:50|string'
        ]);

        DB::beginTransaction();

        try {
            $warehouse->update($validated);
            // slug
            if ($request['name'] != $warehouse->name) {
                $warehouse->slug;
            }

            DB::commit();

            return redirect()->route('warehouse.show', $warehouse->slug)
                ->with('success', 'Warehouse updated successfully');
        } catch (\Exception $e) {
            DB::rollback();

            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        DB::beginTransaction();

        try {
            $warehouse->delete();

            DB::commit();

            return redirect()->route('warehouse.index')
                ->with('success', 'Warehouse deleted successfully');
        } catch (\Exception $e) {
            DB::rollback();

            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }
}
