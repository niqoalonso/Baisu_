<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Estado;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view('backend.usuario.index', compact('usuarios'));
    }

    public function create()
    {   
        $roles = Role::all();
        $estados = Estado::all();
        return view('backend.usuario.create', compact('roles', 'estados'));
    }

    public function store(Request $request)
    {   
        $usuario = User::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_estado' => $request->estado,
            'slug' => rand(1000, 9999),
        ]);
        $usuario->assignRole($request->roles);

        return response()->json("Usuario creado correctamente");
    }


    public function show(string $id)
    {
        //
    }

    public function edit(User $gestion_usuario)
    {

        $roles = Role::all();
        $estados = Estado::all();
        return view('backend.usuario.edit', compact('gestion_usuario', 'roles', 'estados'));
    }

    public function update(Request $request, User $gestion_usuario)
    {
        $gestion_usuario->update([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_estado' => $request->estado,
        ]);
        $gestion_usuario->syncRoles($request->roles);
        return response()->json("Usuario actualizado correctamente");
    }

    public function destroy(string $id)
    {
        //
    }
}
