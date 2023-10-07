<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class BackendPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['permissions'] = Permission::latest()->get();
        return view('backend.permissions', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'display_name' => 'required|unique:permissions,name',
            'prefix' => 'required',
        ]);

        $permission = Permission::create([
            'name' => $request->display_name,
            'prefix' => $request->prefix,
        ]);
        
        if($permission){
            return back()->with('success','Permission Create Successfully!');
        }else{
            return back()->with('error','Something is Worng!');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'display_name' => "required|unique:permissions,name,$permission->id",
            'prefix' => 'required',
        ]);

        $permission->update([
            'name' => $request->display_name,
            'prefix' => $request->prefix,
        ]);
        
        if($permission){
            return back()->with('success','Permission Update Successfully!');
        }else{
            return back()->with('error','Something is Worng!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        if($permission){
            return back()->with('success','Permission Delete Successfully!');
        }else{
            return back()->with('error','Something is Worng!');
        }
    }
}
