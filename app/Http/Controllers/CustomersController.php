<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::filter(request(['search']))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|string',
            'phone' => 'required|max:10000000000|numeric',
            'email' => 'required|max:50|string|unique:customers,email',
            'address' => 'required|max:50|string'
        ], [
            'email.unique' => 'Email sudah digunakan'
        ]);

        DB::beginTransaction();

        try {
            $newCustomer = Customer::create($validated);
            $newCustomer->slug;

            DB::commit();

            return redirect()->route('customers.index')
                ->with('success', 'Customer created successfully');
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
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|string',
            'phone' => 'required|max:10000000000|numeric',
            'address' => 'required|max:50|string'
        ]);

        DB::beginTransaction();

        try {
            // name must unique or same as previous
            if ($request['email'] == $customer->email) {
                $request->validate(['email' => 'required|max:50|string']);
                $validated['email'] =  $request['email'];
            } else {
                $request->validate(
                    ['email' => 'required|max:50|string|unique:customers,email'],
                    ['email.unique' => 'Nama Kategori sudah digunakan.']
                );
                $validated['email'] = $request['email'];
            }

            $customer->update($validated);
            // slug
            if ($request['name'] != $customer->name) {
                $customer->slug;
            }

            DB::commit();

            return redirect()->route('customers.show', $customer->slug)
                ->with('success', 'Customer updated successfully');
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
    public function destroy(String $id)
    {
        Customer::where('id', $id)->delete();

        return redirect()->route('customers.index')
            ->with('success', 'customer deleted successfully');
    }
}
