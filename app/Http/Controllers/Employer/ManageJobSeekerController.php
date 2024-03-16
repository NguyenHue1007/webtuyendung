<?php

namespace App\Http\Controllers\Employer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use App\Models\Employer;
class ManageJobSeekerController extends Controller
{
    public function index()
    {
        $employer = Auth::user();
        $jobs = $employer->jobs;
        return view('employer.manage-jobseeker',compact('jobs'));
    }

    public function updateStatus(Request $request)
    {
        $employer = Auth::user();
        $jobs = $employer->jobs;
        
        foreach ($jobs as $job) {
            foreach ($job->applications as $application) {
                $status = $request->input('status.' . $application->id);
                $application->status = $status;
                $application->update();
            }
        }
    
        session()->flash('success', 'Cập nhật trạng thái thành công');
        return redirect()->back();
    }
    
    
}