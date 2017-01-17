<?php

namespace App\Http\Controllers;

use App\SchoolYear;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = User::where('role_id', 2)->get();
        return view('alumnos.index')->with(compact('students'));
    }

    public function create()
    {
        $id = auth()->user()->id;
        Log::info("El usuario $id ha ingresado a la página de registro de un alumno.");
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:4',
            'identity_card' => 'required|digits:8',
            'gender' => 'required',
            'birth_date' => 'date',
            'photo' => 'image',
            'remark' => 'min:4',
            'phone' => 'min:6',
            'cellphone' => 'min:6',
            'address' => 'min:4'
        ];

        $messages = [
            'email.required' => 'Es necesario especificar una dirección de correo electrónico.',
            'email.email' => 'El campo e-mail no tiene el formato adecuado.',
            'email.unique' => 'El e-mail es único por cada usuario, ya que se usará para acceder al sistema.',
            'first_name.required' => 'Es necesario ingresar los nombres del usuario.',
            'first_name.min' => 'Ingrese un nombre adecuado.',
            'last_name.required' => 'Es necesario ingresar los apellidos del usuario.',
            'last_name.min' => 'Ingrese un apellido adecuado.',
            'identity_card.required' => 'El campo DNI es obligatorio. Su contraseña inicialmente será su DNI.',
            'identity_card.digits' => 'El DNI debe presentar 8 dígitos.',
            'gender.required' => 'Debe especificar el género del docente.',
            'birth_date' => 'Por favor ingrese una fecha de nacimiento adecuada.',
            'photo.image' => 'Asegúrese de subir una imagen adecuada para la foto.',
            'remark.min' => 'Ingrese adecuadamente las observaciones.',
            'phone.min' => 'Ingrese al menos 6 caracteres para el teléfono.',
            'cellphone.min' => 'Ingrese al menos 6 caracteres para el celular.',
            'address.min' => 'Ingrese al menos 4 caracteres para la dirección.'
        ];

        $v = Validator::make($request->all(), $rules, $messages);

        if ($v->fails())
            return back()->withErrors($v)->withInput();

        // here we add a custom validations

        $user = User::create([
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('identity_card')),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'identity_card' => $request->get('identity_card'),
            'gender' => $request->get('gender'),
            'birth_date' => $request->get('birth_date'),
            // 'photo' => $request->hasFile('photo'),
            'remark' => $request->get('remark'),
            'phone' => $request->get('phone'),
            'cellphone' => $request->get('cellphone'),
            'address' => $request->get('address'),
            'role_id' => 2 // Alumno
        ]);

        if ($request->hasFile('photo'))
        {
            $archivo = $request->file('photo');

            // the file name is based on the user id
            $extension = $archivo->getClientOriginalExtension();
            $nombreArchivo = $user->id . "." . $extension;

            // save the image
            $archivo->move(public_path() . '/imagenes/alumnos/', $nombreArchivo);

            // update the extension
            $user->photo = $extension;
            $user->save();
        }

        $id = auth()->user()->id;
        Log::info("El usuario $id ha finalizado el registro satisfactorio del alumno $user->id.");
        return redirect('/alumnos')->with('success', 'El alumno se ha registrado exitosamente.');
    }

    public function edit($id)
    {
        $student = User::find($id);
        return view('alumnos.edit')->with(compact('student'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        if (!$user)
            return redirect('/');

        // photo and password can be blank
        $rules = [
            'email' => 'required|email|unique:users,id,'.$request->get('id'),
            'password' => 'min:6',
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:4',
            'identity_card' => 'required|digits:8',
            'birth_date' => 'date',
            'photo' => 'image',
            'remark' => 'min:4',
            'phone' => 'min:6',
            'cellphone' => 'min:6',
            'address' => 'min:4'
        ];

        $messages = [
            'email.required' => 'Es necesario especificar una dirección de correo electrónico.',
            'email.email' => 'El campo e-mail no tiene el formato adecuado.',
            'email.unique' => 'El e-mail es único por cada usuario, ya que se usará para acceder al sistema.',
            'password.min' => 'La contraseña debe presentar al menos 6 caracteres.',
            'first_name.required' => 'Es necesario ingresar los nombres del usuario.',
            'first_name.min' => 'Ingrese un nombre adecuado.',
            'last_name.required' => 'Es necesario ingresar los apellidos del usuario.',
            'last_name.min' => 'Ingrese un apellido adecuado.',
            'identity_card.required' => 'El campo DNI es obligatorio. Su contraseña inicialmente será su DNI.',
            'identity_card.digits' => 'El DNI debe presentar 8 dígitos.',
            'birth_date' => 'Por favor ingrese una fecha de nacimiento adecuada.',
            'photo.image' => 'Asegúrese de subir una imagen adecuada para la foto.',
            'remark.min' => 'Ingrese adecuadamente las observaciones.',
            'phone.min' => 'Ingrese al menos 6 caracteres para el teléfono.',
            'cellphone.min' => 'Ingrese al menos 6 caracteres para el celular.',
            'address.min' => 'Ingrese al menos 4 caracteres para la dirección.'
        ];

        $v = Validator::make($request->all(), $rules, $messages);

        if ($v->fails())
            return back()->withErrors($v)->withInput();

        // here we add a custom validations

        $user->email = $request->get('email');
        $password = $request->get('password');
        if ($password)
            $user->password = bcrypt($password);

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->identity_card = $request->get('identity_card');
        $user->gender = $request->get('gender');
        $user->birth_date = $request->get('birth_date');
        /// photo
        $user->remark = $request->get('remark');
        $user->phone = $request->get('phone');
        $user->cellphone = $request->get('cellphone');
        $user->address = $request->get('address');

        if ($request->hasFile('photo'))
        {
            $archivo = $request->file('photo');

            // the file name is based on the user id
            $extension = $archivo->getClientOriginalExtension();
            $nombreArchivo = $user->id . "." . $extension;

            // save the image
            $archivo->move(public_path() . '/imagenes/alumnos/', $nombreArchivo);

            // update the extension
            $user->photo = $extension;
        }

        $user->save();
        return back()->with('success', 'Los datos del alumno se han modificado exitosamente.');
    }

    public function destroy($id)
    {
        $student = User::find($id);
        $student->delete();
        return back()->with('success', 'El alumno se ha eliminado de la base de datos.');
    }

}
