@extends('backend.layouts.layouts')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Gestionar Roles & Permisos</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('roles-permisos.index')}}">Roles & Permisos</a></li>
                            <li class="breadcrumb-item active">Editar Rol</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Actualizar Rol</h4>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-4">
                                    <form id="formEdit">
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{$role->id}}">
                                        <div class="mb-3">
                                            <label class="form-label"  for="formrow-Fullname-input">Nombre del Rol</label>
                                            <input type="text" name="name" class="form-control" id="formrow-Fullname-input" value="{{$role->name}}">
                                        </div>

                                        <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Seleccionar Permisos</h5>

                                        <div class="row">  
                                            @foreach ($permissions as $key => $item)
                                            <div class="col-lg-4 mt-2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="permission[]" class="form-check-input" value="{{$item->name}}" id="formCheck{{$key}}" @if($role->permissions->contains($item->id)) checked @endif>
                                                    <label class="form-check-label" for="formCheck{{$key}}">
                                                        {{ $item->name }}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach                                                          
                                            
                                        </div>
                                        
                                        <div class="row">   
                                            <div class="col-lg-12">
                                                <div class="d-flex flex-wrap gap-3 mt-3 justify-content-end">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="mdi mdi-content-save"></i> Actualizar</button>
                                                    <a href="{{route('roles-permisos.index')}}"><button type="button" class="btn btn-outline-danger waves-effect waves-light w-md"><i class="mdi mdi-close"></i> Volver Lista</button></a>
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
    <script src="{{asset('backend/assets/js/ajax-pages/roles-permisos/edit.js')}}"></script>
@endsection
