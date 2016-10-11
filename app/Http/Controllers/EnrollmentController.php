<?php

namespace App\Http\Controllers;

use App\Career;
use App\Enrollment;
use App\SchoolYear;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $school_year = SchoolYear::orderBy('id', 'desc')->first();
        $careers = Career::all();
        // $sections = $grades->first()->sections;
        $sections = [];
        return view('matriculas.listado')->with(compact('school_year', 'careers', 'sections'));
    }

    public function create()
    {
        $school_year = SchoolYear::orderBy('id', 'desc')->first();
        $careers = Career::all();
        // $sections = $grades->first()->sections;
        $sections = [];
        $students = User::where('role_id', 2)->paginate(6);
        return view('matriculas.matricular')->with(compact('school_year', 'careers', 'sections', 'students'));
    }

    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
            'school_year_id' => 'required|exists:school_years,id',
            'section_id' => 'required|exists:sections,id',
            'status' => 'required',
            'amount' => 'required|min:0',
            'observations' => 'min:5'
        ];

        $messages = [
            'user_id.required' => 'Debe seleccionar al alumno que desea matricular.',
            'user_id.exists' => 'El alumno seleccionado no existe en la base de datos.',
            'school_year_id.required' => 'Es necesario seleccionar un año lectivo.',
            'school_year_id.exists' => 'El año lectivo seleccionado no existe en la base de datos.',
            'section_id.required' => 'Es necesario indicar un grado y sección para el alumno.',
            'section_id.exists' => 'La sección indicada no existe en la base de datos',
            'status.required' => 'Es necesario indicar el estado de la matrícula.',
            'amount.required' => 'Debe especificar el monto del pago.',
            'amount.min' => 'No se admiten valores negativos en el pago.',
            'observations' => 'Por favor sea más específico en las observaciones.'
        ];

        $v = Validator::make($request->all(), $rules, $messages);

        if ($v->fails())
            return back()->withErrors($v)->withInput();

        // here we add a custom validations

        // to prevent duplicate enrollments
        $enrollments = Enrollment::where('user_id', $request->get('user_id'))
                        ->where('school_year_id', $request->get('school_year_id'))
                        ->count();

        if ($enrollments > 0)
            return back()
                ->withErrors(['duplicated' => 'El alumno ya se encuentra matriculado en este año lectivo.'])
                ->withInput();

        Enrollment::create($request->all());

        return back()->with('success', 'La matrícula se ha registrado exitosamente.');
    }
}
