<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser as User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function create() {
        return view('users.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }
    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Usuario actualizado.');
    }
    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado.');
    }
}
