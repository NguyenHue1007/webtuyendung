<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use App\Models\Category;

use function Termwind\render;

class ManageJobController extends Controller
{
    public function index()
    {
        $employer = Auth::user();
        $categories = Category::all();
        $jobs = $employer->jobs;
        $activeJobs = 0;
        $experedJobs = 0;
        foreach ($jobs as $job) {
            if ($job->isActive()) {
                $activeJobs++;
            } else {
                $experedJobs++;
            }
        }
        return view('employer.manage-job', compact('jobs', 'categories', 'activeJobs', 'experedJobs'));
    }

    public function update(Request $request, Job $job)
    {

        $job->title = $request->get('title');
        $job->category_id = $request->get('category');
        $job->type = $request->get('type');
        $job->quantity = $request->get('quantity');
        $job->level = $request->get('level');
        $job->gender = $request->get('gender');
        $job->experience = $request->get('experience');
        $job->min_salary = $request->get('min_salary');
        $job->max_salary = $request->get('max-salary');
        $job->location = $request->get('location');
        $job->deadline = $request->get('deadline');
        $job->job_description = $request->get('job_description');
        $job->requirement = $request->get('requirement');
        $job->benefit = $request->get('benefit');
        $job->update();

        session()->flash('success', 'Cập nhật việc làm thành công');

        return redirect()->back();
    }
    public function destroy(Request $request, Job $job)
    {

        $job->delete();

        session()->flash('success', 'Xóa công việc thành công');

        return redirect()->back();
    }

}
