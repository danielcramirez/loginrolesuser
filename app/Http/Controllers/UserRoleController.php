<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    // Mostrar formulario para asignar roles a un usuario
    public function edit($userId)
    {
        $user = \App\Models\RegisterUser::findOrFail($userId);
        $roles = \App\Models\Role::all();
        return view('users.assign_role', compact('user', 'roles'));
    }

    // Actualizar los roles asignados a un usuario
    public function update(Request $request, $userId)
    {
        $user = \App\Models\RegisterUser::findOrFail($userId);
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('users.index')->with('success', 'Roles asignados correctamente.');
    }
}