<?php

namespace App\Http\Controllers\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Employer;
class ProfileController extends Controller
{
    public function index()
    {
        $employer = Auth::guard('employer')->user();
        return view('employer.index',compact('employer'));
    }

    public function updateProfile(Request $request, Employer $employer)
    {
        // $employer = Auth::guard('employer')->user();
        $employer->company = $request->input('company');
        $employer->email = $request->input('email');
        $employer->website = $request->input('website');
        $employer->date = $request->input('date');
        $employer->phone = $request->input('phone');
        $employer->description = $request->input('description');
        $employer->city = $request->input('city');
        $employer->distric = $request->input('district');
        $employer->commune = $request->input('ward');
        if ($request->hasFile('logo')) {
            if (!empty($employer->logo)) {
                Storage::delete($employer->logo);
            }
            $employer->logo = $request->file('logo')->store('public/logoes');
        }
        $employer->update(); 
        session()->flash('success','Cập nhật thông tin thành công');


        return redirect()->back();
    }

    public function showChangePasswordForm()
    {
        $employer = Auth::guard('employer')->user();
        return view('employer.change-password',compact('employer'));
    }

    public function changePassword(Request $request, Employer $employer ){
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required||same:new_password',
        ]);
        if (!Hash::check($request->old_password, $employer->password)) {
            session()->flash('error','Mật khẩu cũ không chính xác');
        } 
        else {
            $employer->password = bcrypt($request->input('new_password')); 
            $employer->update(); 
            session()->flash('success','Thay đổi mật khẩu thành công');
        }
        
        return redirect()->back();

    }

}
