<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BackendUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('backend.users', $data);
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
            'name' => 'required',
            'email' => 'required|email:filter|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'status' => 'required',
            'password' => 'required|min:6',
        ]);

        //User Store
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'password' => Hash::make($request['password']),
        ]);

        if($user){
            return back()->with('success','Account Create Successfully!');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => "required|email:filter|unique:users,email,$id,id",
            'phone' => "required|unique:users,phone,$id,id",
            'status' => 'required',
            'password' => 'nullable|min:6',
        ]);

        if(!empty($request->password)){
            User::findOrFail($id)->update([
                'password' => $request->password,
            ]);
        }
        //User Update
        $user = User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        if($user){
            return back()->with('success','Account Update Successfully!');
        }else{
            return back()->with('error','Something is Worng!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Succussfully Deleted');
    }
}
