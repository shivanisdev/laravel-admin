<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permission.index', ['permissions' => Permission::with('roles')->get()]);
    }

    public function assign($role)
    {
        return view('permission.assign', [
            'role' => Role::findByName($role),
            'permissions' => Permission::all()
        ]);
    }

    public function save($role, Request $request)
    {
        Role::findByName($role)->givePermissionTo($request->input('permissions'));
        return redirect('role')->with('status', __('Permissions assigned'));
    }
}
