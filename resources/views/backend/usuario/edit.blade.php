@extends('backend.layouts.layouts')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Gestionar Usuarios</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('gestion-usuario.index')}}">Gestión de Usuarios</a></li>
                            <li class="breadcrumb-item active">Actualizar Usuario</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <h4 class="card-title">Actualizar Usuario</h4>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-4">
                                    <form id="formUpdate">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label"  for="formrow-Fullname-input">Nombres</label>
                                                    <input type="text" name="name" class="form-control" id="formrow-Fullname-input" value="{{$gestion_usuario->name}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label"  for="formrow-Fullname-input">Apellidos Paterno</label>
                                                    <input type="text" name="apellido_paterno" class="form-control" id="formrow-Fullname-input" value="{{$gestion_usuario->apellido_paterno}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label"  for="formrow-Fullname-input">Apellidos Materno</label>
                                                    <input type="text" name="apellido_materno" class="form-control" id="formrow-Fullname-input" value="{{$gestion_usuario->apellido_materno}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label"  for="formrow-Fullname-input">Correo Electronico</label>
                                                    <input type="text" name="email" class="form-control" id="formrow-Fullname-input" value="{{$gestion_usuario->email}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4"> 
                                                <div class="mb-3">
                                                    <label class="form-label"  for="formrow-Fullname-input">Seleccionar Estado</label>
                                                    <select name="estado" class="form-control" id="formrow-Fullname-input">
                                                        @foreach ($estados as $estado)
                                                            <option value="{{$estado->id_estado}}" @if($gestion_usuario->estado->id_estado == $estado->id_estado) selected @endif>{{$estado->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label"  for="formrow-Fullname-input">Contraseña</label>
                                                    <input type="password" name="password" class="form-control" id="formrow-Fullname-input" placeholder="Contraseña">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Seleccionar Permisos</h5>

                                            <div class="row">  
                                                @foreach ($roles as $key => $role)
                                                <div class="col-lg-4 mt-2">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="roles[]" class="form-check-input" value="{{$role->name}}" id="formCheck{{$key}}" @if($gestion_usuario->hasRole($role->name)) checked @endif>
                                                        <label class="form-check-label" for="formCheck{{$key}}">
                                                            {{ $role->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach                                                          
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="row">   
                                            <div class="col-lg-12">
                                                <div class="d-flex flex-wrap gap-3 mt-3 justify-content-end">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="mdi mdi-content-save"></i> Crear Usuario</button>
                                                    <a href="{{route('gestion-usuario.index')}}"><button type="button" class="btn btn-outline-danger waves-effect waves-light w-md"><i class="mdi mdi-close"></i> Cancelar</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                           
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{asset('backend/assets/js/ajax-pages/usuario/edit.js')}}"></script>
@endsection
