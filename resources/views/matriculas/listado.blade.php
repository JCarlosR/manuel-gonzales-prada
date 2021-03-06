@extends('layouts.panel')

@section('title', 'Matrículas registradas')
@section('sub-title', 'Listado de matrículas registradas')

@section('navigation')
    <li>Matrícula</li>
    <li class="active">Listado</li>
@endsection

@section('content')
    <!-- Modal to edit course_handbooks -->
    <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar malla curricular</h4>
                </div>
                <div class="modal-body">
                    <p>Modificar la malla curricular seleccionada:</p>
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="course_handbook_id" value="">

                    <div class="form-group">
                        <label for="name">Nombre de la malla curricular:</label>
                        <input type="text" name="name" placeholder="Malla curricular" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <input type="text" name="description" placeholder="Descripción" value="" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Modificar malla curricular</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Template for alerts -->
    <template id="template-alerta">
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Hey!</strong> <span></span>
        </div>
    </template>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Acerca de las matrículas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <p>Al momento de registrar una matrícula se define el pago inicial realizado por el alumno, y se especifica si ha pagado totalmente o aún la matrícula queda en estado pendiente de pago.</p>
                    <p>Desde esta sección usted puede seleccionar un año lectivo, un grado y una sección determinada, y según ello podrá ver el listado de matrículas registradas, según su estado.</p>
                    <p>Para el caso de las matrículas pendientes de pago se podrán registrar cuotas, que son los pagos posteriores realizados a fin de completar el pago por el concepto de matrícula.</p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Matrículas registradas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <p>Seleccione los siguientes parámetros para visualizar las matrículas de un aula determinada:</p>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="school_year_id">Año lectivo:</label>
                            <select name="school_year_id" class="form-control" disabled>
                                <option value="{{ $school_year->id }}">{{ $school_year->name }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="career_id">Carreras:</label>
                            <select name="career_id" class="form-control" id="career_id">
                                @foreach ($careers as $career)
                                <option value="{{ $career->id }}" @if($career->id==$career_id) selected @endif>{{ $career->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="academic_year">Ciclo:</label>
                            <select name="academic_year" id="academic_year" class="form-control">
                                <option value="1" @if($academic_year == 1) selected @endif>Ciclo I</option>
                                <option value="2" @if($academic_year == 2) selected @endif>Ciclo II</option>
                                <option value="3" @if($academic_year == 3) selected @endif>Ciclo III</option>
                                <option value="4" @if($academic_year == 4) selected @endif>Ciclo IV</option>
                                <option value="5" @if($academic_year == 5) selected @endif>Ciclo V</option>
                                <option value="6" @if($academic_year == 6) selected @endif>Ciclo VI</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Estado de pago:</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if($status == 0) selected @endif>Pendiente de pago</option>
                                <option value="1" @if($status == 1) selected @endif>Pago completo</option>
                            </select>
                        </div>
                    </div>

                    <table class="table responsive">
                        <thead>
                        <tr>
                            <td>Alumno</td>
                            <td>Fecha de registro</td>
                            <td>Monto</td>
                            <td>Opciones</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->user->full_name }}</td>
                            <td>{{ $enrollment->created_at }}</td>
                            <td>S/. {{ $enrollment->amount }}</td>
                            <td>
                                <a href="{{ url('/alumnos/editar/'.$enrollment->user->id) }}" class="btn btn-primary">
                                    Editar alumno
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

@section('scripts')
    <script src="{{ asset('custom/js/matriculas.js') }}"></script>
@endsection