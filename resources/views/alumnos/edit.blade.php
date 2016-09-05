@extends('layouts.panel')

@section('title', 'Edición de alumnos')
@section('sub-title', 'Editar datos de un alumno')

@section('navigation')
    <li>Usuarios</li>
    <li class="active"><a href="{{ url('/alumnos') }}">Alumnos</a></li>
@endsection

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edición de alumno</h3>
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

        <form action="{{ url('alumnos/editar/'.$student->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" placeholder="Correo electrónico" class="form-control" value="{{ old('email', $student->email) }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña <em>Solo si se desea modificar</em></label>
                        <input type="text" name="password" placeholder="¿Modificar contraseña?" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="first_name">Nombres</label>
                        <input type="text" name="first_name" placeholder="Nombres" class="form-control" value="{{ old('first_name', $student->first_name) }}">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellidos</label>
                        <input type="text" name="last_name" placeholder="Apellidos" class="form-control" value="{{ old('last_name', $student->last_name) }}">
                    </div>

                    <div class="form-group">
                        <label for="identity_card">DNI</label>
                        <input type="text" name="identity_card" placeholder="DNI" class="form-control" value="{{ old('identity_card', $student->identity_card) }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">Género</label>
                        <div class="radio">
                            <label>
                                <input type="radio" value="Hombre" name="gender" @if(old('gender', $student->gender) == 'Hombre') checked @endif> Hombre
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" value="Mujer" name="gender" @if(old('gender', $student->gender) == 'Mujer') checked @endif> Mujer
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="birth_date">Fecha de nacimiento</label>
                        <input type="date" name="birth_date" placeholder="Fecha de nacimiento" class="form-control" value="{{ old('birth_date', $student->birth_date_format) }}">
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto de perfil <em>Solo si desea modificar</em></label>
                        <input type="file" name="photo" placeholder="Foto de perfil" class="form-control">
                    </div>

                    <p>Información de contacto:</p>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" placeholder="Teléfono" class="form-control" value="{{ old('phone', $student->phone) }}">
                    </div>

                    <div class="form-group">
                        <label for="cellphone">Celular</label>
                        <input type="text" name="cellphone" placeholder="Celular" class="form-control" value="{{ old('cellphone', $student->cellphone) }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" placeholder="Dirección" class="form-control" value="{{ old('address', $student->address) }}">
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Guardar cambios</button>
                </div>
            </div>

        </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection
