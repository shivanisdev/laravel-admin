<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use Illuminate\Foundation\Console\RouteListCommand;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('role.index', ['roles' => $roles]);
    }

    public function store(StoreRole $request)
    {
        $validated = $request->validated();
        Role::create($validated);
        return redirect('role')->with('status', __('Role Created'));
    }

    public function destroy(Role $role)
    {

    }

}
