@extends('backend.layouts.layouts')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> 
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Listado de Roles y Permisos</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="card-title">Roles Creados</h4>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{route('gestion-usuario.create')}}" class="btn btn-primary btn-sm waves-effect waves-light w-md float-end"><i class="mdi mdi-plus"></i> Crear Usuario</a>
                            </div>
                        </div>
                        <hr>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>A. Paterno</th>
                                <th>A. Materno</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Creado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>


                            <tbody class="body-roles">
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->apellido_paterno}}</td>
                                        <td>{{$usuario->apellido_materno}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->estado->nombre}}</td>
                                        <td>{{$usuario->created_at->format('d/m/Y')}}</td>
                                        <td>
                                            <a href="{{route('gestion-usuario.edit', $usuario->slug)}}"><button class="btn btn-warning btn-sm">
                                                <i class="uil-edit"></i> Editar
                                            </button></a>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="uil-trash-alt"></i> Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>
    <script src="{{asset('backend/assets/js/ajax-pages/usuario/index.js')}}"></script>
@endsection
