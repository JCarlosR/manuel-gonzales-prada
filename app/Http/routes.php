<?php

// Really we need a default page != home?
Route::get('/', function () {
    return redirect('home');
});

// Routes relative to authentication
Route::auth();

// When a user is authenticated
Route::get('/home', 'HomeController@index');

// Configuration routes
Route::get('configuracion/datos', 'InstitutionController@index');
Route::get('configuracion/parametros', 'ParameterController@index');
Route::get('configuracion/cursos', 'CourseController@index');
Route::get('configuracion/mallas', 'CourseHandbookController@index');
Route::get('configuracion/semestres', 'SchoolYearController@index');
Route::get('configuracion/periodo-lectivo/{id}', 'UnitController@index');

// Course CRUD
Route::post('curso/registrar', 'CourseController@store');
Route::put('curso/editar', 'CourseController@update');
Route::get('curso/eliminar/{id}', 'CourseController@destroy');

// CourseHandbook CRUD
Route::post('malla/registrar', 'CourseHandbookController@store');
Route::put('malla/editar', 'CourseHandbookController@update');
Route::get('malla/eliminar/{id}', 'CourseHandbookController@destroy');

// CourseGrade operations
Route::get('configuracion/malla/{handbook}', 'CourseGradeController@redirect');
Route::get('configuracion/malla/{handbook}/carrera/{grade}', 'CourseGradeController@index');
Route::post('asociar/{handbook}/curso/{course}/grado/{grade}', 'CourseGradeController@store');
Route::get('desasociar/{handbook}/curso/{course}/grado/{grade}', 'CourseGradeController@destroy');

// SchoolYear CRUD
Route::post('ano-lectivo/registrar', 'SchoolYearController@store');


// Unit CRUD
Route::post('unidad/registrar', 'UnitController@store');
Route::put('unidad/editar', 'UnitController@update');
Route::get('unidad/eliminar/{id}', 'UnitController@destroy');


// Users CRUD
Route::get('alumnos', 'StudentController@index');
Route::get('alumnos/registrar', 'StudentController@create');
Route::post('alumnos/registrar', 'StudentController@store');
Route::get('alumnos/editar/{id}', 'StudentController@edit');
Route::post('alumnos/editar/{id}', 'StudentController@update');
Route::get('alumnos/eliminar/{id}', 'StudentController@destroy');

Route::get('docentes', 'TeacherController@index');
Route::get('docentes/registrar', 'TeacherController@create');
Route::post('docentes/registrar', 'TeacherController@store');
Route::get('docentes/editar/{id}', 'TeacherController@edit');
Route::post('docentes/editar/{id}', 'TeacherController@update');
Route::get('docentes/eliminar/{id}', 'TeacherController@destroy');

Route::get('administrativos', 'WorkerController@index');
Route::get('administrativos/registrar', 'WorkerController@create');
Route::post('administrativos/registrar', 'WorkerController@store');
Route::get('administrativos/editar/{id}', 'WorkerController@edit');
Route::post('administrativos/editar/{id}', 'WorkerController@update');
Route::get('administrativos/eliminar/{id}', 'WorkerController@destroy');


// Enrollment CRUD
Route::get('matricula/listar', 'EnrollmentController@index');
Route::get('matricula/registrar', 'EnrollmentController@create');
Route::post('matricula/registrar', 'EnrollmentController@store');

// Reports
Route::get('reporte/matriculas/carrera', 'ReportController@careerCount');
