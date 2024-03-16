<?php

namespace App\Http\Controllers\JobSeeker;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProfileJobSeekerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        return view('jobseeker.index',compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $user->name = $request->input('name');
        $user->gender = $request->input('gender');
        $user->age = $request->input('age');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->address = $request->input('address');

        if ($request->hasFile('avatar')) {
            if (!empty($user->avatar)) {
                Storage::delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('public/avatars');
        }
        $user->update(); 
        session()->flash('success','Cập nhật trang cá nhân thành công');

        return redirect()->back();
    }

    public function showChangePasswordForm()
    {
        $user = Auth::user();
        return view('jobseeker.change-password',compact('user'));
    }


    public function changePassword(Request $request, User $user ){
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required||same:new_password',
        ]);
        if (!Hash::check($request->old_password, $user->password)) {
            session()->flash('error','Mật khẩu cũ không chính xác');
        } 
        else {
            $user->password = bcrypt($request->input('new_password')); 
            $user->update(); 
            session()->flash('success','Thay đổi mật khẩu thành công');
        }
        
        return redirect()->back();
    }


}