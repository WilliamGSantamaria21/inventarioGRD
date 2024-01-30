@extends('adminlte::page')

@section('title', 'Transfers')

@section('content_header')
    <h1>Crear solicitud de traslado</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                
                <div class="card card-default">
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('transfers.store') }}" role="form" enctype="multipart/form-data">
                            @csrf                            
                            @include('transfer.form')
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                        <button type="submit" class="btn btn-success">{{ __('Crear') }}</button>
                    
                                    <a class="btn btn-light float-right" href="{{ route('transfers.index') }}"> {{ __('Volver') }}</a>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- plugin -->
    <script src="https://www.virtuosoft.eu/code/bootstrap-duallistbox/bootstrap-duallistbox/v3.0.2/jquery.bootstrap-duallistbox.js"></script>

    <link rel="stylesheet" type="text/css" href="https://www.virtuosoft.eu/code/bootstrap-duallistbox/bootstrap-duallistbox/v3.0.2/bootstrap-duallistbox.css">
    <style>
        .moveall,
        .removeall {
        border: 1px solid #ccc !important;
        
        &:hover {
            background: #efefef;
        }
        }

        .moveall::after {
        content: attr(title);
        
        }

        .removeall::after {
        content: attr(title);
        }

        .form-control option {
            padding: 10px;
            border-bottom: 1px solid #efefef;
        }
    </style>
@stop

