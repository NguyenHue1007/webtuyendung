<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Employer;

use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function index()
	{

		return view('admin.dashboard.index');

	}


}
