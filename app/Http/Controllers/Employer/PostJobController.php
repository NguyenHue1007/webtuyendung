<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;

class PostJobController extends Controller
{
    public function index()
    {
        $employer = Auth::user();
        $categories = Category::all();
        return view('employer.post-job',compact('employer', 'categories'));
    }

    public function store(Request $request)
	{
		$job = new Job();
        $job->employer_id = auth()->user()->id;
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

		$job->save();

		session()->flash('success','Post job successfull');

		return redirect()->back();
	}
}
