<?php

namespace App\Http\Controllers;

use App\Career;
use App\Enrollment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    public function careerCount(Request $request)
    {
        $curTime = microtime(true);
                
        
        $career_id = $request->input('career_id');

        if ($career_id)
            $enrollments = Enrollment::where('career_id', $career_id)->get();
        else {
            $enrollments = Enrollment::all();
            $career_id = 0;
        }

        $pending = 0; $completed = 0;
        foreach ($enrollments as $enrollment) {
            if ($enrollment->status == 0)
                $pending++;
            else $completed++;
        }

        $careers = Career::all();


        // get time difference in milliseconds
        $totalMilliseconds = round(microtime(true) - $curTime,3)*1000;

        return view('reports.enrollments_by_career')->with(compact(
            'pending', 'completed', 'totalMilliseconds',
            'careers', 'career_id'
        ));
    }

}
