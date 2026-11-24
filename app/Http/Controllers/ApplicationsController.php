<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationsRequest;
use App\Http\Requests\ChangeStatusRequest;
use App\Models\Application;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    public function application(ApplicationsRequest $request, Course $course)
    {
        if (Auth::user()) {
            $application = new Application;
            $application->user_id = Auth::user()->id;

            $application->course_id = $course->id;
            $application->date = $request->date;
            $application->payment = $request->payment;

            $application->save();

            return redirect()->route('index');
        }

        return abort(404);

    }

    public function changeStatus(ChangeStatusRequest $request, Application $application)
    {

        $application->status = $request->status;

        $application->save();

        return back();

    }
}
