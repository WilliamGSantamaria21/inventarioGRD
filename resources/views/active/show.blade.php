@extends('adminlte::page')

@section('title', 'Actives')

@section('content_header')
    <h1>Ver activo</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="m-0">Detalles del Activo</h5>
                            <div>
                                <a class="btn btn-light" href="{{ route('actives.index') }}">Volver</a>
                                @can('actives.edit')
                                    <a class="btn btn-success" href="{{ route('actives.edit', $active->id) }}">Editar</a>
                                @endcan
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Área:</strong>
                                    {{ $areas[$active->area_id] ?? 'N/A' }}
                                </div>
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    {{ $active->name }}
                                </div>
                                <div class="form-group">
                                    <strong>Descripción:</strong>
                                    {{ $active->description }}
                                </div>
                                <div class="form-group">
                                    <strong>Serial:</strong>
                                    {{ $active->serial }}
                                </div>
                                <div class="form-group">
                                    <strong>No.Placa:</strong>
                                    {{ $active->placaInt }}
                                </div>
                                <div class="form-group">
                                    <strong>Poseedor:</strong>
                                    {{ $owners[$active->owner_id] ?? 'N/A' }}
                                </div>
                                <div class="form-group">
                                    <strong>Acceso:</strong>
                                    {{ $access[$active->access_id] ?? 'N/A' }}
                                </div>
                                <div class="form-group">
                                    <strong>Categoría:</strong>
                                    {{ $categories[$active->category_id] }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Ubicación:</strong>
                                    {{ $ubications[$active->ubication_id] ?? 'N/A' }}
                                </div>
                                <div class="form-group">
                                    <strong>Fecha de Ingreso:</strong>
                                    {{ $active->dateAdmission->format('d/m/Y') }}
                                </div>
                                <div class="form-group">
                                    <strong>Fecha de Salida:</strong>
                                    {{ $active->departureDate ? \Carbon\Carbon::parse($active->departureDate)->format('d/m/Y') : 'N/A' }}
                                </div>
                                <div class="form-group">
                                    <strong>Actualización:</strong>
                                    {{ $active->actualizacion }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/admin_custom.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@stop
