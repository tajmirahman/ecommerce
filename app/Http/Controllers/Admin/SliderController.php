<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
use Helper;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function AllSlider(){
        $sliders= Slider::all();
        return view('admin.admin.pages.slider.all_slider', compact('sliders'));
    }// End Methods

    public function StoreSlider(Request $request){
        $validator= $request->validate(
            [
            'slider_name'=> 'required|max:255',
            'slider_image'=> 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'slider_name.required' => 'The Slider Name is required',
                'slider_image.required' => 'The Slider Image is required',
            ],

        );

        if ($validator) {

            $mainFile = $request->file('slider_image');

            $imgPath = storage_path('app/public/slider');

            if (empty($mainFile)) {

                Brand::create([

                    'slider_name' => $request->slider_name,
                    'slider_slug' => strtolower(str_replace('', '-', $request->slider_name)),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = Helper::customUpload($mainFile, $imgPath, 20, 20);

                if ($globalFunImg['status'] == 1) {
                    Slider::create([

                        'slider_name' => $request->slider_name,
                        'slider_slug' => strtolower(str_replace('', '-', $request->slider_name)),
                        'description' => $request->description,

                        'slider_image' => $globalFunImg['file_name'],

                    ]);
                } else {

                    toastr()->warning('Image upload failed! plz try again.');
                }
            }
            toastr()->success('Slider Created Successfully');
        }

        return redirect()->route('all.slider');
    }// End Methods

    public function UpdateSlider(Request $request){

        $slider = Slider::findOrFail($request->id);
        $validator = $request->validate(

            [
                'slider_name'=> 'required|max:255',
                'slider_image'=> 'required|mimes:jpeg,png,jpg,gif,svg,webp',
                ],

                [
                    'slider_name.required' => 'The Slider Name is required',
                    'slider_image.required' => 'The Slider Image is required',
                ],
        );

        if ($validator) {

            $mainFile = $request->file('slider_image');

            $uploadPath = storage_path('app/public/slider');

            if (isset($mainFile)) {
                $globalFunImg = Helper::customUpload($mainFile, $uploadPath, 200, 200);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($slider)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/slider/requestImg/') . $slider->slider_image)) {
                        File::delete(public_path('storage/slider/requestImg/') . $slider->slider_image);
                    }
                    if (File::exists(public_path('storage/slider/') . $slider->slider_image)) {
                        File::delete(public_path('storage/slider/') . $slider->slider_image);
                    }
                }

                $slider->update([

                    'slider_name' => $request->slider_name,
                    'slider_slug' => strtolower(str_replace('', '-', $request->slider_name)),
                    'description' => $request->description,
                    'slider_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $slider->slider_image,

                ]);
            }

            toastr()->success('Slider Update Successfully');
        }
        return redirect()->route('all.slider');

    }// End Methdos

    public function SliderSlider($id){

        $slider = Slider::find($id);

        if (File::exists(public_path('storage/slider/requestImg/') . $slider->slider_image)) {
            File::delete(public_path('storage/slider/requestImg/') . $slider->slider_image);
        }

        if (File::exists(public_path('storage/slider/') . $slider->slider_image)) {
            File::delete(public_path('storage/slider/') . $slider->slider_image);
        }

        $slider->delete();

        toastr()->success('Slider Delete Successfully');

        return redirect()->route('all.slider');

    }// End Methods

    public function InactiveSlider($id){

        Slider::find($id)->update([
            'status'=> '0'
        ]);
        toastr()->success('Slider Inactive Successfully');

        return redirect ()->route('all.slider');

    }// End Methods

    public function ActiveSlider($id){

        Slider::find($id)->update([
            'status'=> '1'
        ]);
        toastr()->success('Slider Active Successfully');

        return redirect ()->route('all.slider');

    }// End Methods

}
