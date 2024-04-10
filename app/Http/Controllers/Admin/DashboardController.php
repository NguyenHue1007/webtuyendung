<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\EmployerPackageSubscription;

use App\Models\Employer;

use App\Models\User;

use App\Models\Job;

use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function index()
	{
		$revenue = EmployerPackageSubscription::sum('price');
		$countEmployers = Employer::count();
		$countUsers = User::count();
		$countJobs = Job::count();
		return view('admin.dashboard.index', compact('revenue','countEmployers','countUsers','countJobs'));

	}


}
