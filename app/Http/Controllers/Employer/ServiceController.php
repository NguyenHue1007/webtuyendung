<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\EmployerPackageSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\JobPackage;
class ServiceController extends Controller
{
    public function index()
    {
        $packages = JobPackage::all();
        return view('employer.service', compact('packages'));
    }
    public function showFormPayment(JobPackage $package)
    {
        return view('payment', compact('package'));
    }

    public function packageSubscription(Request $request)
    {
        $employer=Auth::user();
        $activePackageSubscription = EmployerPackageSubscription::where('employer_id', $employer->id)
            ->where('status', 'on')->first();
        if($activePackageSubscription)
        {
            session()->flash('error','Vui lòng hủy gói để đăng ký gói mới');
        }
        else{
            $packageSubscription = new EmployerPackageSubscription();
            $packageSubscription->employer_id = Auth::guard('employer')->user()->id;
            $packageSubscription->package_id = $request->get('package_id');
            $packageSubscription->price = $request->get('package_price');
            $packageSubscription->remaining_posts = $request->get('package_max_jobs');
            $packageSubscription->save();
            session()->flash('success','Đăng ký gói thành công');
        }
        return to_route('employer.purchase_history');
    }

    public function purchaseHistory()
    {
        $employer = Auth::guard('employer')->user();
        $packages = $employer->employerPackages;
        return view('employer.purchase-history',compact('packages'));
    }

    public function deletePackageSubscription(EmployerPackageSubscription $employerPackageSubscription)
    {
        $employerPackageSubscription->status = "off";
        $employerPackageSubscription->update();

        session()->flash('success', 'Hủy gói đăng ký thành công');

        return redirect()->back();
    }

}