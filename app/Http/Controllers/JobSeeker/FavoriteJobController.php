<?php

namespace App\Http\Controllers\JobSeeker;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use App\Models\FavoriteJob;
class FavoriteJobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveJob(Job $job)
    {
        $userId = Auth::user()->id;
        $jobId = $job->id;

        $isExistingJob = FavoriteJob::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->exists();

        if ($isExistingJob) {
            session()->flash('error', 'Công việc đã tồn tại trong danh sách đã lưu');
        } else {
            $favoriteJob = new FavoriteJob();
            $favoriteJob->user_id = $userId;
            $favoriteJob->job_id = $jobId;
            $favoriteJob->save();

            session()->flash('success', 'Lưu công việc thành công');
        }

        return redirect()->back();
    }

    public function index()
    {
       
        $user = Auth::user();
        
        $favoriteJobs = $user->favoriteJobs;
    
        return view('jobseeker.favoritejob',compact('favoriteJobs'));
    }
    public function deleteFavoriteJob(FavoriteJob $favoriteJob)
    {
       
        $favoriteJob->delete();

		session()->flash('success','Bỏ lưu công việc thành công');
    
        return redirect()->back();
    }

}