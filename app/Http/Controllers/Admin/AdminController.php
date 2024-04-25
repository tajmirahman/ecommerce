<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){


        return view('admin.admin.index');
    }// End Methods

    public function AdminProfile(){

        $id = Auth::guard('admin')->user()->id;
        $profileData = Admin::find($id);
        return view('admin.admin.pages.profile.admin_profile',compact('profileData'));
    }// End Methods


    public function AdminProfileUpdate(Request $request){

        $id = Auth::guard('admin')->user()->id;
        $update = Admin::findOrFail($id);

        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->photo = $request->phone;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $update->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            $update['photo'] = $filename;
        }

        $update->save();

        toastr()->success('Profile Update Succeesfully');

        return redirect()->back();
    }// End Methods


    public function AdminPasswordPage(){

        $id = Auth::guard('admin')->user()->id;
        $profileData = Admin::find($id);
        return view('admin.admin.pages.profile.admin_password_page',compact('profileData'));
    }// End Methods

    public function PasswordChange(Request $request){

         //validate
         $request->validate([

            'old_password' => 'required',
            'new_password' => [

                'required', 'confirmed', Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers(),

            ],
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {

            toastr()->error('Old Password Not Match!');

            return redirect()->back();
        }

        //Update New Password
        Admin::whereId(Auth::guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        toastr()->success('Password Change Succeesfully');

        return redirect()->back();
    }// End Methods



}
