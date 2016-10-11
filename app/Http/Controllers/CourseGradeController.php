<?php

namespace App\Http\Controllers;

use App\Career;
use App\Course;
use App\CourseGrade;
use App\CourseHandbook;
use App\Grade;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CourseGradeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirect($handbook)
    {
        $career = Career::first();
        return redirect('configuracion/malla/' . $handbook . '/carrera/' . $career->id);
    }

    public function index($handbook_id, $career_id)
    {
        $handbook = CourseHandbook::find($handbook_id);

        // Get all courses and grades to fill the selects
        $courses = Course::all();
        $careers = Career::all();

        // Select the grade and its courses associated in the current handbook
        $current_career = Career::find($career_id);
        /*$current_courses = CourseCareer::where('course_handbook_id', $handbook_id)
                            ->where('career_id', $career_id)->get(['course_id']);
        $current_courses = $this->convertToCourseCollection($current_courses);*/
        $current_courses = [];

        return view('configuracion.asignar-cursos')->with(compact('handbook', 'courses', 'careers', 'current_courses', 'current_career'));
    }

    public function convertToCourseCollection($course_grades) {
        // Just one column is selected, but the result is a Collection of objects
        // Using pluck we convert it to Collection of arrays (no associative)
        $course_grades = $course_grades->pluck('course_id');
        // Using toArray method, we get an uni-dimensional arry
        $course_grades = $course_grades->toArray();
        // We have an array of integers (representing ids)
        return Course::find($course_grades);
    }

    public function store($handbook_id, $course_id, $grade_id)
    {
        $course = Course::find($course_id);

        // If the course is already associated, nothing to do
        $relationExist = CourseGrade::where('course_handbook_id', $handbook_id)
                            ->where('course_id', $course_id)->where('grade_id', $grade_id)
                            ->first();
        if ($relationExist) {
            $message = "Este curso ya ha sido asignado al grado.";
            $type = "info";
            return back()->with(compact(['message', 'type']));
        }

        // Setting a new course for a grade in this course_handbook
        CourseGrade::create([
            'course_handbook_id' => $handbook_id,
            'course_id' => $course_id,
            'grade_id' => $grade_id
        ]);
        $message = "Curso asignado correctamente.";
        $type = "success";
        return back()->with(compact(['message', 'type']));
    }

    public function destroy($handbook_id, $course_id, $grade_id)
    {
        $course = Course::find($course_id);

        // If the course is already associated
        $relationExist = CourseGrade::where('course_handbook_id', $handbook_id)
                            ->where('course_id', $course_id)->where('grade_id', $grade_id)
                            ->first();
        if ($relationExist) {
            $relationExist->delete();
            $message = "Se ha eliminado correctamente el curso del grado.";
            $type = "success";
            return back()->with(compact(['message', 'type']));
        }

        $message = "El curso no se encuentra asignado al grado.";
        $type = "warning";
        return back()->with(compact(['message', 'type']));
    }

}
