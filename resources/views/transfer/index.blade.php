@extends('adminlte::page')

@section('title', 'Transfers')

@section('content_header')
    <h1>Traslados</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-0">Lista de Traslados</h5>
                                <a href="{{ route('transfers.create') }}" class="btn btn-primary">Crear Nueva Solicitud</a>
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
                                        <th>ID</th>
                                        <th>Solicitante</th>
                                        <th>Nuevo Poseedor</th>
                                        <th>Fecha Solicitud</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transfers as $transfer)
                                        <tr>
                                            <td>{{ $transfer->id }}</td>
                                            <td>{{ $ownerName[$transfer->user_id] }}</td>
                                            <td>{{ $newOwnerName[$transfer->new_user_id] }}</td>
                                            <td>{{ $transfer->DateAdmission }}</td>
                                            <td>{{ $statuses[$transfer->status_id] }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('transfers.show', $transfer->id) }}">Ver</a>

                                                    @can('transfers.edit')
                                                        <a class="btn btn-success btn-sm" href="{{ route('transfers.edit', $transfer->id) }}">Editar</a>
                                                    @endcan

                                                    @can('transfers.delete')
                                                        <form action="{{ route('transfers.destroy', $transfer->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?')">Eliminar</button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="22"><strong>No hay solicitudes registradas</strong></td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                {!! $transfers->links() !!}
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
