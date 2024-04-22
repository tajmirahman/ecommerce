<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Helper;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function AllBrand(){

        $brands= Brand::all();
        return view('admin.admin.pages.brand.brand_all', compact('brands'));
    }// End MEthods

    public function StoreBrand(Request $request){
        $validator= $request->validate(
            [
            'brand_name'=> 'required|max:255',
            'brand_image'=> 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'banner_name.required' => 'The Banner Name is required',
                'banner_image.required' => 'The Banner Image is required',
            ],

        );

        if ($validator) {

            $mainFile = $request->file('brand_image');

            $imgPath = storage_path('app/public/brand');

            if (empty($mainFile)) {

                Brand::create([

                    'brand_name' => $request->brand_name,
                    'brand_slug' => strtolower(str_replace('', '-', $request->brand_name)),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = Helper::customUpload($mainFile, $imgPath, 20, 20);

                if ($globalFunImg['status'] == 1) {
                    Brand::create([

                        'brand_name' => $request->brand_name,
                        'brand_slug' => strtolower(str_replace('', '-', $request->brand_name)),
                        'description' => $request->description,

                        'brand_image' => $globalFunImg['file_name'],

                    ]);
                } else {

                    toastr()->warning('Image upload failed! plz try again.');
                }
            }
            toastr()->success('Brand Created Successfully');
        }

        return redirect()->route('all.brand');


    }// End Methods

    public function UpdateBrand(Request $request){

        $brand = Brand::findOrFail($request->id);
        $validator = $request->validate(

            [
                'brand_name' => 'required|max:255',
                'brand_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'brand_name.required' => 'The Brand Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('brand_image');

            $uploadPath = storage_path('app/public/brand');

            if (isset($mainFile)) {
                $globalFunImg = Helper::customUpload($mainFile, $uploadPath, 200, 200);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($brand)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/brand/requestImg/') . $brand->brand_image)) {
                        File::delete(public_path('storage/brand/requestImg/') . $brand->brand_image);
                    }
                    if (File::exists(public_path('storage/brand/') . $brand->brand_image)) {
                        File::delete(public_path('storage/brand/') . $brand->brand_image);
                    }
                }

                $brand->update([

                    'brand_name' => $request->brand_name,
                    'brand_slug' => strtolower(str_replace('', '-', $request->brand_name)),
                    'description' => $request->description,
                    'brand_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $brand->brand_image,

                ]);
            }

            toastr()->success('Brand Update Successfully');
        }
        return redirect()->route('all.brand');

    }// End Methods


    public function DeleteBrand($id){
        $brand = Brand::find($id);

        if (File::exists(public_path('storage/brand/requestImg/') . $brand->brand_image)) {
            File::delete(public_path('storage/brand/requestImg/') . $brand->brand_image);
        }

        if (File::exists(public_path('storage/brand/') . $brand->brand_image)) {
            File::delete(public_path('storage/brand/') . $brand->brand_image);
        }

        $brand->delete();

        toastr()->success('Brand Delete Successfully');

        return redirect()->route('all.brand');
    }// End Methods

    public function InactiveBrand($id){

        Brand::find($id)->update([
            'status'=> '0'
        ]);
        toastr()->success('Brand Inactive Successfully');

        return redirect ()->route('all.brand');

    }// End Methods

    public function ActiveBrand($id){

        Brand::find($id)->update([
            'status'=> '1'
        ]);
        toastr()->success('Brand Active Successfully');

        return redirect ()->route('all.brand');

    }// End Methods

}
