<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BackendRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['roles'] = Role::with('permissions')->latest()->get();
        return view('backend.roles', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['permissions'] = Permission::latest()->get()->groupBy('prefix');
        return view('backend.create-role', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|unique:roles,name',
        ]);

        $role = Role::create([
            'name' => $request->role_name,
            'guard_name' => 'web',
        ]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Role Created Successfully');
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
    public function edit(string $id)
    {
        $data['role'] = Role::findOrFail($id);
        $data['permissions'] = Permission::latest()->get()->groupBy('prefix');
        return view('backend.edit-role', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role_name' => "required|unique:roles,name,$role->id,id",
        ]);

        $role->update([
            'name' => $request->role_name,
            'guard_name' => 'web',
            'updated_at' => date("Y-m-d h:i:sa"),
        ]);

        $role->syncPermissions($request->permissions);

        return back()->with('success', 'Role Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success', 'Role Succussfully Deleted');
    }
}
