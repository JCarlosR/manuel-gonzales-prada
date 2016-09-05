@extends('layouts.panel')

@section('title', 'Dashboard')
@section('sub-title', 'Página de bienvenida')

@section('styles')
    <style>
        .logo {
            display: block;
            margin: 0 auto;
            width: 40em;
            max-width: 100%;
        }
    </style>
@endsection

@section('navigation')
    <li class="active">Dashboard</li>
@endsection

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Bienvenido al sistema académico</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>Usted ha iniciado sesión correctamente.</p>
        <p>Bienvenido nuevamente, {{ $first_name }}.</p>
        <img src="{{ asset('/imagenes/logo.jpg') }}" alt="Logo" class="logo">
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection
