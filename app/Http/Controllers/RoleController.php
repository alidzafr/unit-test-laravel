<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255', 'unique:roles,name'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,id'],
        ]);

        $role = Role::create([
            'name' =>$validated['name']
        ]);

        $permissionNames = Permission::whereIn('id', $validated['permissions'] ?? [])
            ->pluck('name')
            ->all();

        $role->syncPermissions($permissionNames);

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        $role->load('permissions');

        return view('roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255', 'unique:roles,name,' . $role->id,],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,id'],
        ]);

        $role->update([
            'name' => $validated['name']
        ]);

        $permissionNames = Permission::whereIn('id', $validated['permissions'] ?? [])
            ->pluck('name')
            ->all();

        $role->syncPermissions($permissionNames);

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role Updated successfully.');
    }

    public function destroy(Role $role)
    {
        // Prevent Delete super admin
        if ($role->name === 'Super Admin') {
            return back()->with('error', 'Super Admin cannot be deleted.');
        }

        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('Success', 'Role deleted successfully');
    }

}
