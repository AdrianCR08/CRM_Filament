<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function createRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles, name',
        ]);

        $role = Role::create(['name' => $request->name]);
        return response()->json(['role' => $role], 201);
    }

    public function createPermission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions, name',
        ]);

        $permission = Permission::create(['name' => $request->name]);

        return response()->json(['permission' => $permission], 201);

    }

    public function assignPermissionToRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,name',
            'permission_name' => 'required|exists:permissions,name', 
        ]);

        $role = Role::findByName($request->role_name);
        $permission = Permission::findByName($request->permission_name);

        $role->givePermissionTo($permission);

        return response()->json(['role' => $role, 'permission' => $permission], 201);
        
    }
}
