@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{-- Sección de cards para información relevante --}}
    <section class="content container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?= 'Usuarios registrados' ?></span>
                        <span class="info-box-number">{{$userCount}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div id="container"></div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/admin_custom.css') }}">
@stop

@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    {{-- Activar este script si quieren poder descargar la grafica y los datos de la misma --}}
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
        <div id="container"></div>
        {{-- <p class="highcharts-description">
            A variation of a 3D pie chart with an inner radius added.
            These charts are often referred to as donut charts.
        </p> --}}
    </figure>
    <script>
        var chartData = {!! $data !!};
    </script>
    <script src="{{ asset('vendor\adminlte\dist\js\admin_custom.js') }}"></script>

    {{-- <script>
        // Data retrieved from https://olympics.com/en/olympic-games/beijing-2022/medals
        Highcharts.chart('container', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Activos de información',
                align: 'left'
            },
            subtitle: {
                text: 'Sena',
                align: 'left'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Cantidad de activos',
                data: <?= $data ?>
            }]
        });
    </script> --}}
@stop
