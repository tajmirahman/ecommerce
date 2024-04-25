<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Color;

class ColorController extends Controller
{
    public function AllColor(){
        $colors= Color::all();
        return view('admin.admin.pages.color.color_all', compact('colors'));
    }// End Methods

    public function StoreColor(Request $request){
        Color::insert([
            'name'=> $request->name,
            'slug'=> strtolower(str_replace('','-',$request->name)),
            'color_code'=> $request->color_code,

            'created_at' => now(),
        ]);

        toastr()->success('Color inserted Successfully');
        return redirect()->route('all.color');

    }// End Methods

    public function UpdateColor(Request $request){
        $colorid= $request->id;

        Color::find($colorid)->update([
            'name'=> $request->name,
            'slug'=> strtolower(str_replace('','-',$request->name)),
            'color_code'=> $request->color_code,

            'created_at' => now(),
        ]);

        toastr()->success('Color Updated Successfully');
        return redirect()->route('all.color');


    }// End Methods

    public function DeleteColor($id){

        Color::find($id)->delete();

        toastr()->success('Color Delete Successfully');
        return redirect()->route('all.color');

    }// End Methods

}
