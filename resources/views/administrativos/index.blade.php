@extends('layouts.panel')

@section('title', 'Gestión de administrativos')
@section('sub-title', 'Administrar los datos de los administrativos')

@section('navigation')
    <li>Usuarios</li>
    <li class="active">Administrativos</li>
@endsection

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Administrativos</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <a href="{{ url('/administrativos/registrar') }}" class="btn btn-success pull-right">Registrar nuevo administrativo</a>
        <br />
        <p>A continuación usted puede editar y dar de baja a los administrativos del instituto.</p>
        <table class="table">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Email</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Celular</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
            <tr>
                <td><img src="{{ asset($worker->photo_url) }}" alt="Avatar" width="30" height="30"></td>
                <td>{{ $worker->email }}</td>
                <td>{{ $worker->first_name }}</td>
                <td>{{ $worker->last_name }}</td>
                <td>{{ $worker->identity_card }}</td>
                <td>{{ $worker->cellphone }}</td>
                <td>
                    <a href="{{ url('administrativos/editar/' . $worker->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ url('administrativos/eliminar/' . $worker->id) }}" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection
