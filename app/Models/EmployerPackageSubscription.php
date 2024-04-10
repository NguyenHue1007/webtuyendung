<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerPackageSubscription extends Model
{
    use HasFactory;
    protected $table = 'employer_package_subscription';
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function package()
    {
        return $this->belongsTo(JobPackage::class);
    }
}
