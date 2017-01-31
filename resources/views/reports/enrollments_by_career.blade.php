@extends('layouts.panel')

@section('title', 'Reporte por carreras')
@section('sub-title', 'Chart mostrando estado de pago')

@section('navigation')
    <li>Reporte por carreras</li>
    <li class="active">Reporte</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Reporte por carreras según estado de pago</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="alert alert-info">
                        El reporte tardó {{ $totalMilliseconds }} milisegundos en generarse !
                    </div>

                    <select id="career_id" class="form-control">
                        <option value="0">Todas las carreras</option>
                        @foreach ($careers as $career)
                            <option value="{{ $career->id }}" @if ($career->id==$career_id) selected @endif>{{ $career->name }}</option>
                        @endforeach
                    </select>

                    <canvas id="myChart" style="max-width: 75%; margin: 0 auto; display: block;"></canvas>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var numberStatePayment = [ {{ $pending }}, {{ $completed }} ];
    </script>
    <script src="{{ asset('plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('custom/reports/enrollments_by_career.js') }}"></script>
@endsection