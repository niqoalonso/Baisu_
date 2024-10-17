<?php

namespace App\Http\Controllers;

use App\Models\RolesPermisos;
use App\Http\Requests\StoreRolesPermisosRequest;
use App\Http\Requests\UpdateRolesPermisosRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

 
class RolesPermisosController extends Controller
{

    public function index()
    {   
        $roles = Role::all();
        return view('backend.roles-permisos.index', compact('roles'));
    }


    public function create()
    {
        $data = Permission::all();
        
        return view('backend.roles-permisos.create', compact('data'));
    }


    public function store(Request $request)
    {   
        $role = Role::create(['name' => $request->name, 'slug' => rand(1, 1000000)]);
        $role->syncPermissions($request->permission);

        return response()->json($role);
    }


    public function show(RolesPermisos $rolesPermisos)
    {
        //
    }

    public function edit($slug)
    {
        $role = Role::where('slug', $slug)->first();
        $permissions = Permission::all();
        return view('backend.roles-permisos.edit', compact('role', 'permissions'));
    }


    public function update(UpdateRolesPermisosRequest $request, $id)
    {   
        $role = Role::UpdateOrCreate(['id' => $id],['name' => $request->name]);
        $role->syncPermissions($request->permission);
        
        return response()->json("Rol actualizado correctamente");
    }

    public function destroy(RolesPermisos $rolesPermisos)
    {
        //
    }
}
