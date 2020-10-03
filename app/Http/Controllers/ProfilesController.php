<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $attributes = $this->validate($request, [
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['file'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
        ]);
        if ($request->avatar) {
            $attributes['avatar'] = $request->avatar->store('avatars', 'public');
        }
        $user->update($attributes);
        return redirect($user->path());
    }
}
