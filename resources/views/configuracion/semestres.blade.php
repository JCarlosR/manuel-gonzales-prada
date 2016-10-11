@extends('layouts.panel')

@section('title', 'Semestres')
@section('sub-title', 'Configuración de los semestres')

@section('navigation')
    <li>Configuración</li>
    <li class="active">Semestres</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Acerca de los semestres</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <p>Es necesario definir los semestres para la institución educativa.</p>
                    <p>Cada semestre se asociará con matrículas y otros procesos que se llevarán a cabo en un periodo determinado.</p>
                    <p>Tenga en cuenta que si un semestre ha iniciado, no podrá modificarse la fecha de inicio, y si ha finalizado, tampoco se podrá modificar la fecha de cierre.</p>
                    <p>La información de todos los semestres permanece en el sistema, y podrá consultarse las veces que sea necesario.</p>
                    <p>Semestre actual:</p>
                    <ul>
                        <li>Semestre: <strong>{{ $current_year->name }}</strong> ({{ $current_year->range or 'Ninguno' }})</li>
                        <li>Malla curricular en uso: <strong><a href="{{ url('configuracion/malla/'.$current_handbook->id) }}">{{ $current_handbook->name }}</a></strong></li>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrar nuevo semestre</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
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

                    <p>A continuación, usted puede definir un nuevo semestre.</p>
                    <form action="{{ url('ano-lectivo/registrar') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="name">Nombre del semestre:</label>
                                    <input type="text" name="name" placeholder="Ejemplo: 2016-II" value="{{ old('name') }}" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label for="course_handbook_id">Malla curricular asociada:</label>
                                    <select name="course_handbook_id" class="form-control">
                                        @foreach ($handbooks as $handbook)
                                            <option value="{{ $handbook->id }}">{{ $handbook->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="start">Fecha de inicio:</label>
                                    <input type="date" name="start" value="{{ old('start') }}" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label for="end">Fecha de fin:</label>
                                    <input type="date" name="end" value="{{ old('end') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success pull-right">Registrar nuevo semestre</button>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Configuración de los semestres</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <p>Gestión de semestres:</p>
                    <a href="{{ url('configuracion/ano-lectivo/' . $current_year->id) }}" class="btn btn-primary btn-block" style="margin-bottom: 2em;">
                        Modificar semestre actual actual
                    </a>

                    <p>Historial de semestres concluidos:</p>
                    <table class="table responsive">
                        <thead>
                        <tr>
                            <td>Código</td>
                            <td>Semestre</td>
                            <td>Malla curricular</td>
                            <td>Fecha de inicio</td>
                            <td>Fecha de fin</td>
                            <td>Opciones</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($years as $year)
                        <tr>
                            <td>{{ $year->id }}</td>
                            <td>{{ $year->name }}</td>
                            <td>{{ $year->course_handbook->name }}</td>
                            <td>{{ $year->start_format }}</td>
                            <td>{{ $year->end_format }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" title="Editar">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

@endsection
