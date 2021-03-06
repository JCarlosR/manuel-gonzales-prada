@extends('layouts.panel')

@section('title', 'Asignar cursos')
@section('sub-title', 'Asignación de cursos a las carreras')

@section('navigation')
    <li>Configuración</li>
    <li class="active">Asignar cursos</li>
@endsection

@section('content')
<!-- Default box -->
<div class="box">

    <div class="box-header with-border">
        <h3 class="box-title">Asignación de cursos a "{{ $handbook->name }}"</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar">
                <i class="fa fa-minus"></i>
            </button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>

    <div class="box-body">

        <div class="row">
            @if (session('message'))
                <div class="col-md-12">
                    <div class="alert alert-{{ session('type') }}">
                        <p>{{ session('message') }}</p>
                    </div>
                </div>
            @endif

            <div class="col-sm-6">
                <form id="formAsignar" data-action="{{ url('asociar/'.$handbook->id.'/curso/{course}/grado/{grade}') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="grade">Seleccione carrera a gestionar:</label>
                        <select id="cboGrade" name="grade" class="form-control" data-redirect="{{ url('configuracion/malla/'.$handbook->id.'/grado/{grade}') }}">
                            @foreach ($careers as $career)
                                @if ($career->id == $current_career->id)
                                    <option value="{{ $career->id }}" selected>{{ $career->name }}</option>
                                @else
                                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="course">Seleccione curso a asignar:</label>
                        <select name="course" class="form-control">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cycle">Seleccione ciclo asociado:</label>
                        <select name="cycle" class="form-control">
                            <option value="">Ciclo I</option>
                            <option value="">Ciclo II</option>
                            <option value="">Ciclo III</option>
                            <option value="">Ciclo IV</option>
                            <option value="">Ciclo V</option>
                            <option value="">Ciclo VI</option>
                        </select>
                    </div>

                    <button id="btnAsignar" type="button" class="btn btn-success">Asignar curso</button>
                </form>
            </div>
            <div class="col-sm-6">

                <p>Listado de cursos asignados a la carrera <strong>{{ $current_career->name }}</strong>:</p>
                <table class="table responsive">
                    <thead>
                    <tr>
                        <td>Código</td>
                        <td>Nombre del curso</td>
                        <td>Descripción</td>
                        <td>Opciones</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($current_courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td data-name>{{ $course->name }}</td>
                            <td data-description>{{ $course->description }}</td>
                            <td>
                                <a href="{{ url('desasociar/'.$handbook->id.'/curso/'.$course->id.'/grado/'.$current_grade->id) }}" class="btn btn-danger">Desasignar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('scripts')
    <script src="{{ asset('custom/js/asignar-cursos.js') }}"></script>
@endsection