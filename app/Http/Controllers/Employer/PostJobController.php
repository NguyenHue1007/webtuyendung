<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\EmployerPackageSubscription;

class PostJobController extends Controller
{
    public function index()
    {

        $employer = Auth::user();
        $activePackageSubscription = EmployerPackageSubscription::where('employer_id', $employer->id)
            ->where('status', 'on')->first();
        $categories = Category::all();
        return view('employer.post-job', compact('employer', 'categories', 'activePackageSubscription'));
    }

    public function store(Request $request)
    {
        $employer = Auth::user();
        $activePackageSubscription = EmployerPackageSubscription::where('employer_id', $employer->id)
            ->where('status', 'on')->first();
        if ($activePackageSubscription) {
            if ($activePackageSubscription->remaining_posts > 0) {
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

                $activePackageSubscription->remaining_posts --;

                $activePackageSubscription->update();

                session()->flash('success', 'Đăng tin tuyển dụng thành công');


                return redirect()->back();

            } else {
                session()->flash('error', 'Bạn đã sử dụng hết lượt đăng bài, đăng ký gói mới để tiếp tục');

                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Bạn chưa đăng ký gói, đăng ký ngay để đăng bài');

            return to_route('employer.service');
        }
    }
}
