<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function AllChild(){
        return view('admin.admin.pages.child.child_all');
    }// End Methods
}
