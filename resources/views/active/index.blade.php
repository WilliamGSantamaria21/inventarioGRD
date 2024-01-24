@extends('adminlte::page')

@section('title', 'Actives')

@section('content_header')
    <h1>Activos</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-0">Lista de Activos</h5>
                            @can('actives.create')
                                <a href="{{ route('actives.create') }}" class="btn btn-primary">Crear Nuevo</a>
                            @endcan
                        </div>
                    </div>
                    {{-- Diferentes mensajes dependiendo de la acción --}}
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success mt-2 mx-3">
                            {{ $message }}
                        </div>
                    @elseif ($message = Session::get('warning'))
                        {{-- Cambiado de 'alert' a 'warning' --}}
                        <div class="alert alert-warning mt-2 mx-3">
                            {{ $message }}
                        </div>
                    @elseif ($message = Session::get('danger'))
                        {{-- Cambiado de 'alert' a 'danger' --}}
                        <div class="alert alert-danger mt-2 mx-3">
                            {{ $message }}
                        </div>
                    @endif


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Área</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Marca</th>
                                        <th>Serial</th>
                                        <th>No.Placa</th>
                                        <th>Ubicación</th>
                                        <th>Poseedor</th>
                                        <th>Acceso</th>
                                        <th>Fecha ingreso</th>
                                        <th>Fecha salida</th>
                                        <th>Categoría</th>
                                        <th>Actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($actives as $active)
                                        <tr>
                                            <td>{{ $areaName[$active->area_id] }}</td>
                                            <td>{{ $active->name }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($active->description, $limit = 15, $end = '...') }}</td>
                                            <td>{{ $brandName[$active->marca_id] }}</td>
                                            <td>{{ $active->serial }}</td>
                                            <td>{{ $active->placaInt }}</td>
                                            <td>{{ $ubicationName[$active->ubication_id] }}</td>
                                            <td>{{ $ownerName[$active->owner_id] }}</td>
                                            <td>{{ $accessName[$active->access_id] }}</td>
                                            <td>{{ $active->dateAdmission }}</td>
                                            <td>{{ $active->departureDate }}</td>
                                            <td>{{ $categories[$active->category_id]}}</td>
                                            <td>{{ $active->actualizacion }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('actives.show', $active->id) }}">Ver</a>
                                                    
                                                    @can('actives.edit')
                                                        <a class="btn btn-success btn-sm" href="{{ route('actives.edit', $active->id) }}">Editar</a>
                                                    @endcan
                                                    
                                                    @can('actives.delete')    
                                                        <form action="{{ route('actives.destroy', $active->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este activo?')">Eliminar</button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="22"><strong>No hay activos registrados</strong></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                {!! $actives->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/admin_custom.css') }}">
    <style>
        /* .btn-group {
            display: flex;
            gap: 5px;
        } */
    </style>
@stop
