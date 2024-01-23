@extends('adminlte::page')

@section('title', 'Actives')

@section('content_header')
    <h1>Crear activo</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                
                <div class="card card-default">
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('actives.store') }}" role="form" enctype="multipart/form-data">
                            @csrf                            
                            @include('active.form')
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    @can('users.edit')
                                        <button type="submit" class="btn btn-success">{{ __('Crear') }}</button>
                                    @endcan
                                    <a class="btn btn-light float-right" href="{{ route('actives.index') }}"> {{ __('Volver') }}</a>
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/admin_custom.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@stop

