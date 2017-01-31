<?php

namespace App\Http\Controllers;

use App\Career;
use App\Enrollment;
use App\SchoolYear;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // check GET filters

        $career_id = $request->input('career_id');
        if (! $career_id)
            $career_id = Career::all('id')->first()->id;

        $academic_year = $request->input('academic_year');
        if (! $academic_year)
            $academic_year = 1;

        $status = $request->input('status');
        if (! $status)
            $status = 0;

        // queries

        $school_year = SchoolYear::orderBy('id', 'desc')->first();
        $careers = Career::all();

        $enrollments = Enrollment::where('school_year_id', $school_year->id);
        $enrollments = $enrollments->where('career_id', $career_id);
        $enrollments = $enrollments->where('academic_year', $academic_year);
        $enrollments = $enrollments->where('status', $status)->get();

        return view('matriculas.listado')->with(compact(
            'career_id', 'academic_year', 'status',
            'school_year', 'careers', 'enrollments'
        ));
    }

    public function create()
    {
        $school_year = SchoolYear::orderBy('id', 'desc')->first();

        $careers = Career::all();

        $students = User::where('role_id', 2)->paginate(6);

        return view('matriculas.matricular')->with(compact(
            'school_year', 'careers', 'students'
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
            'school_year_id' => 'required|exists:school_years,id',
            'career_id' => 'required|exists:careers,id',
            'status' => 'required',
            'amount' => 'required|min:0'
        ];

        $messages = [
            'user_id.required' => 'Debe seleccionar al alumno que desea matricular.',
            'user_id.exists' => 'El alumno seleccionado no existe en la base de datos.',
            'school_year_id.required' => 'Es necesario seleccionar un año lectivo.',
            'school_year_id.exists' => 'El año lectivo seleccionado no existe en la base de datos.',
            'status.required' => 'Es necesario indicar el estado de la matrícula.',
            'amount.required' => 'Debe especificar el monto del pago.',
            'amount.min' => 'No se admiten valores negativos en el pago.'
        ];

        $v = Validator::make($request->all(), $rules, $messages);

        if ($v->fails())
            return back()->withErrors($v)->withInput();

        // here we add custom validations

        // to prevent duplicate enrollments
        $enrollments = Enrollment::where('user_id', $request->get('user_id'))
                        ->where('school_year_id', $request->get('school_year_id'))
                        ->count();

        if ($enrollments > 0)
            return back()
                ->withErrors(['duplicated' => 'El alumno ya se encuentra matriculado en este año lectivo.'])
                ->withInput();

        $enrollment = Enrollment::create($request->all());

        // Timer log
        $message  = 'El usuario ' . auth()->user()->full_name;
        $message .= ' ha registrado la matrícula del alumno ' . $enrollment->user->full_name;
        $message .= ' satisfactoriamente en ' . $request->input('input_timer') . ' !';
        Log::info($message);

        return back()->with('success', 'La matrícula se ha registrado exitosamente.');
    }
}
