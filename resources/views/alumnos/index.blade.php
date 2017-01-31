@extends('layouts.panel')

@section('title', 'Gestión de alumnos')
@section('sub-title', 'Administrar los datos de los alumnos')

@section('navigation')
    <li>Usuarios</li>
    <li class="active">Alumnos</li>
@endsection

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Alumnos</h3>
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

        <div class="form-group">
            <a href="{{ url('/alumnos/registrar') }}" class="btn btn-success pull-right">Registrar nuevo alumno</a>
        </div>

        <p>A continuación usted puede editar y dar de baja a los alumnos del instituto.</p>

        <form action="" class="form-inline">
            <div class="form-group">
                <label for="dni">Buscar por DNI:</label>
                <input type="text" class="form-control" name="dni" id="dni" value="{{ $dni }}">
            </div>
            <button class="btn btn-primary">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
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
            @foreach($students as $student)
            <tr>
                <td><img src="{{ asset($student->photo_url) }}" alt="Avatar" width="30" height="30"></td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->identity_card }}</td>
                <td>{{ $student->cellphone }}</td>
                <td>
                    <a href="{{ url('alumnos/editar/' . $student->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ url('alumnos/eliminar/' . $student->id) }}" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection
