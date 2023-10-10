<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class BackendPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view permission'])->only('index');
        $this->middleware(['permission:add permission'])->only(['create','store']);
        $this->middleware(['permission:edit permission'])->only(['edit','update']);
        $this->middleware(['permission:delete permission'])->only('distroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query_param = [];
        $search = $request['search'];

        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $query = Permission::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%")
                        ->orWhere('prefix', 'like', "%{$value}%");
                }
            })->latest();
            $query_param = ['search' => $request['search']];
        }else{
            $query = Permission::latest();
        }

        $permissions = $query->paginate(10)->appends($query_param);

        return view('admin.permissions', compact('permissions', 'search'));
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
