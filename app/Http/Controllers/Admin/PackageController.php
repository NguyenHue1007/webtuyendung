<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\JobPackage;

use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;

class PackageController extends BaseController
{
    public function index()
	{
		$packages = JobPackage::paginate(7);

		return view('admin.package.index', compact('packages'));

	}

    public function create()
	{
		return view('admin.package.create');
	}

	public function edit(JobPackage $package)
	{

		return view('admin.package.edit', ['package' => $package]);
	}

    public function store(Request $request)
	{
		$package = new JobPackage();

        $package->name = $request->input('name');
        $package->description = $request->input('description');
        $package->max_jobs = $request->input('max_jobs');
        $package->price = $request->input('price');
		$package->save();

		session()->flash('success','package store successfull');

		// return to_route('package.edit',$package->id);
        return view('admin.package.create');
	}

	public function update(Request $request, JobPackage $package)
	{

		$validated = $request->validate(['name'=>'required']);

		$package->name = $request->input('name');
        $package->description = $request->input('description');
        $package->max_jobs = $request->input('max_jobs');
        $package->price = $request->input('price');

		$package->update();

		session()->flash('success','package update successfull');

		return to_route('package.edit',$package->id);
	}

	public function destroy(Request $request, JobPackage $package)
	{

		$package->delete();

		session()->flash('success','package delete successfull');

		return to_route('package.index');       
	}

}
