<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Employer;

use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;

class EmployerController extends BaseController
{
    public function index()
	{
		$employers = Employer::paginate(7);

		return view('admin.employer', compact('employers'));

	}

	public function destroy(Request $request, Employer $employer)
	{

		$employer->delete();

		session()->flash('success','Xóa nhà tuyển dụng thành công');

		return redirect()->back();      
	}
}
