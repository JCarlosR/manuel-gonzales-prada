<table class="table table-hover">
    <thead>
    <tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>DNI</th>
        <th data-breakpoints="all">Dirección</th>
        <th data-breakpoints="all">Celular</th>
        <th data-breakpoints="xs sm md lg">E-mail</th>
        <th data-breakpoints="xs" data-type="html">Imagen</th>
        <th data-type="html">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td data-first>{{ $student->first_name }}</td>
            <td data-last>{{ $student->last_name }}</td>
            <td>{{ $student->identity_card }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->cellphone }}</td>
            <td>{{ $student->email }}</td>
            <td>
                @if($student->photo)
                    <img src="{{ url('imagenes/alumnos/' . $student->id) }} }}" height="40"
                         width="40">
                @else
                    <img src="{{ url('imagenes/not-available.png') }}" height="40" width="40">
                @endif
            </td>
            <td>
                <a href="#" class="btn btn-success" data-student="{{ $student->id }}">Seleccionar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $students->render() !!}
