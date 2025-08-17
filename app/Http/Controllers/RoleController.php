<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
    public function create() {
        return view('roles.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:roles',
            'description' => 'nullable',
        ]);
        Role::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }
    public function edit(Role $role) {
        return view('roles.edit', compact('role'));
    }
    public function update(Request $request, Role $role) {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'description' => 'nullable',
        ]);
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol actualizado.');
    }
    public function destroy(Role $role) {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado.');
    }
}
