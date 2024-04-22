<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.admin.index');
    }// End Methods

    public function AdminProfile(){
        return view('admin.admin.pages.profile.admin_profile');
    }// End Methods



}
