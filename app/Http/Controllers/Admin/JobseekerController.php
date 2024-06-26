<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;

class JobseekerController extends BaseController
{
    public function index()
	{
		$users = User::paginate(7);

		return view('admin.jobseeker', compact('users'));

	}

	public function destroy(Request $request, User $user)
	{

		$user->delete();

		session()->flash('success','Xóa người tìm việc thành công');

		return redirect()->back();      
	}


}
