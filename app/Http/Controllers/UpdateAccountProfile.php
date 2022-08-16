<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateAccountProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'email' => 'nullable',
            'username' => 'required',
            'name' => 'required',
            'password' => 'nullable|min:5|max:255|confirmed'
        ]);

        $password = '';

        if ($request->password == $user->password || $request->password == null) {
            $password = $user->password;
        } else {
            $password = Hash::make($request->password);
        }

        $validated['password'] = $password;

        $user->fill($validated);
        $user->save();

        return redirect(url('account'));
    }
}
