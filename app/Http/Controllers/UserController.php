<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users= User::orderBy('id', 'asc')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::orderBy('id','asc')->get();

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'nullable',
            'username' =>'required',
            'name'=> 'required',
            'password' => 'required|min:5|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role_id'] = (int) $request->role;

        User::create($validated);

        return redirect(url('users'));
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('id','asc')->get();

        return view('users.update', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'email' => 'nullable',
            'username' =>'required',
            'name'=> 'required',
            'password' => 'nullable|min:5|max:255'
        ]);

        $password = '';

        if ($request->password == $user->password || $request->password == null) {
            $password = $user->password;
        } else {
            $password = Hash::make($request->password);
        }

        $validated['password'] = $password;
        $validated['role_id'] = (int) $request->role;

        $user->fill($validated);
        $user->save();

        return redirect(url('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(url('users'));
    }
}
