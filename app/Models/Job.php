<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Job extends Model
{
    use HasFactory;
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function isSaved($jobId, $userId)
    {
        $isSaved = FavoriteJob::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->exists();

        return $isSaved;
    }

    public function isApplied($jobId, $userId)
    {
        $isApplied = Application::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->exists();

        return $isApplied;
    }

    public function isActive()
    {
        $today = Carbon::now()->format('Y-m-d');
        if($this->deadline >= $today )
        
        return true;
        
    }

    public function formatDeadline()
    {
       
        return Carbon::parse($this->deadline)->format('d/m/Y');
        
    }

    public function formatSalary()
    {
       
        return number_format($this->min_salary / 1000000) . '-' . number_format($this->max_salary / 1000000) . ' triệu';
        
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
