<?php

namespace App\Http\Controllers\JobSeeker;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;
class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function apply(Request $request, Job $job)
    {
        $validatedData = $request->validate([
            'cover_letter' => 'required',
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        $resumePath = $request->file('resume')->store('public/resumes');

        $application = new Application();
        $application->job_id = $job->id;
        $application->user_id = auth()->user()->id;
        $application->cover_letter = $request->get('cover_letter');
        $application->resume = $resumePath;
        $application->save();

        session()->flash('success','Application submitted successfully');

        return redirect()->back();
    }

    

}
