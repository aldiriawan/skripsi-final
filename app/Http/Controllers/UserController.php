<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user.index', [
            'title' => 'Detail User',
            'user' => User::all()
        ]);
    }

    public function edit(User $user)
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('user.edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:6|confirmed',
        ];

        $validatedData = $request->validate($rules);

        // Update user details
        $user->update([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
        ]);

        return redirect('/user')->with('success', 'Pengguna berhasil diperbarui!');
    }
}
