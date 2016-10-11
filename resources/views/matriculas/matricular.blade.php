@extends('layouts.panel')

@section('title', 'Matrícula')
@section('sub-title', 'Formulario para el registro de matrículas')

@section('navigation')
    <li>Matrícula</li>
    <li class="active">Registrar</li>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/footable.bootstrap.min.css') }}">
@endsection

@section('content')
<!-- Modal to find students -->
<div id="modalStudents" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Seleccionar alumno</h4>
            </div>
            <div class="modal-body">
                <!-- This content will be loaded using ajax -->
                @include('tablas.students')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>

    </div>
</div>

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Registro de matrículas</h3>
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

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('matricula/registrar') }}" method="POST" id="newEnrollment">
            {{ csrf_field() }}

                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="name">Seleccione alumno</label>
                        <div class="row">
                            <div class="col-xs-9">
                                <input type="hidden" name="user_id" value="{{ old('user_id') }}" required>
                                <input type="text" name="name" placeholder="Nombre del alumno" class="form-control" value="{{ old('name') }}" readonly>
                            </div>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalStudents">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    Buscar
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="catchword">Semestre actual</label>
                        <select name="school_year_id" class="form-control">
                            <option value="{{ $school_year->id }}">{{ $school_year->name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="career_id">Seleccione carrera</label>
                        <select name="career_id" id="career_id" class="form-control">
                            @foreach ($careers as $career)
                            <option value="{{ $career->id }}">{{ $career->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="section_id">Seleccione sección</label>
                        <select name="section_id" id="section_id" class="form-control" data-source="{{ url('grado/{id}/secciones') }}">
                            <!-- The options will be re-loaded when the grade change -->
                            <option value="">Sección A</option>
                            <option value="">Sección B</option>
                            <option value="">Sección C</option>
                        </select>
                    </div>

                </div>
                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="amount">Pago por matrícula</label>
                        <input type="text" name="amount" placeholder="Monto a pagar ahora" class="form-control" value="{{ old('amount') }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Estado actual</label>
                        <select name="status" class="form-control">
                            <option value="0">Pendiente de pago</option>
                            <option value="1">Pago completo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="observations">Observaciones</label>
                        <textarea name="observations" class="form-control">{{ old('observations') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success pull-right">Registrar matrícula</button>
                </div>
            </div>

        </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/footable.min.js') }}"></script>
    <script>$(function(){ $('.table').footable(); })</script>
    <script src="{{ asset('custom/js/matricular.js') }}"></script>
@endsection