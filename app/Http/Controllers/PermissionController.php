<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }
    public function create() {
        return view('permissions.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:permissions',
            'description' => 'nullable',
        ]);
        Permission::create($request->all());
        return redirect()->route('permissions.index')->with('success', 'Permiso creado correctamente.');
    }
    public function edit(Permission $permission) {
        return view('permissions.edit', compact('permission'));
    }
    public function update(Request $request, Permission $permission) {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
            'description' => 'nullable',
        ]);
        $permission->update($request->all());
        return redirect()->route('permissions.index')->with('success', 'Permiso actualizado.');
    }
    public function destroy(Permission $permission) {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permiso eliminado.');
    }
}
