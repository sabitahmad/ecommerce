<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class BackendUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view user'])->only('index');
        $this->middleware(['permission:add user'])->only(['create', 'store']);
        $this->middleware(['permission:edit user'])->only(['edit', 'update']);
        $this->middleware(['permission:delete user'])->only('distroy');
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
            $query = User::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('fname', 'like', "%{$value}%")
                        ->orWhere('lname', 'like', "%{$value}%")
                        ->orWhere('email', 'like', "%{$value}%")
                        ->orWhere('phone', 'like', "%{$value}%");
                }
            })->latest();
            $query_param = ['search' => $request['search']];
        } else {
            $query = User::latest();
        }

        $users = $query->paginate(10)->appends($query_param);

        return view('admin.users.users', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['roles'] = Role::latest()->get();

        return view('admin.users.create-user', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email:filter|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'status' => 'required',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        //User Store
        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'password' => Hash::make($request['password']),
        ]);

        $user->syncRoles($request->role);

        if ($user) {
            return back()->with('success', 'Account Create Successfully!');
        } else {
            return back()->with('error', 'Something is Worng!');
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
        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::latest()->get();
        $data['data'] = $data['user']->roles()->pluck('id')->toArray();

        return view('admin.users.edit-user', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => "required|email:filter|unique:users,email,$user->id,id",
            'phone' => "required|unique:users,phone,$user->id,id",
            'role' => 'required',
            'status' => 'required',
            'password' => 'nullable|min:6',
        ]);

        if (! empty($request->password)) {
            $user->update([
                'password' => $request->password,
            ]);
        }

        //User Update
        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        $user->syncRoles($request->role);

        if ($user) {
            return back()->with('success', 'Account Update Successfully!');
        } else {
            return back()->with('error', 'Something is wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'Successfully Deleted');
    }
}
