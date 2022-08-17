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
        $users = User::orderBy('id', 'asc')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::orderBy('id', 'asc')->get();

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'nullable',
            'username' => 'required',
            'name' => 'required',
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
        $roles = Role::orderBy('id', 'asc')->get();

        return view('users.update', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'email' => 'nullable',
            'username' => 'required',
            'name' => 'required',
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

    public function getNotificationUser()
    {
        $user = User::find(auth()->user()->id);
        $notifications = $user->unreadNotifications->sortBy('created_at');
        return response()->json([
            'code' => 200,
            'data' => $notifications,
            'last_created_at' => date('Y-m-d H:i:s', strtotime($notifications->last()->created_at))
        ]);
    }

    public function getOneNewestNotification(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $notification = $user->unreadNotifications->where('created_at', '>', $request->last_date)->first();
        $last_created_at = null;
        if (isset($notification)) {
            $last_created_at = date('Y-m-d H:i:s', strtotime($notification->created_at));
        }

        return response()->json([
            'code' => 200,
            'data' => $notification,
            'last_created_at' => $last_created_at
        ]);
    }

    public function readNotif(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $notification = $user->unreadNotifications->where('id', $request->id)->first();
        $notification->markAsRead();
        return response()->json([
            'code' => 200,
            'data' => $notification
        ]);
    }
}
