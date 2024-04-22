<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Banner;


class BannerController extends Controller
{
    public function AllBanner(){
        $banners = Banner::all();
        return view('admin.admin.pages.banner.banner_all',compact('banners'));
    }// End MEthods

    public function StoreBanner(Request $request){
        $request->validate(
            [
                'banner_name' => 'required|max:255',
                'banner_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'banner_name.required' => 'The Banner Name is required',
                'banner_image.required' => 'The Banner Image is required',
            ],
        );

        $image = $request->file('banner_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(900, 900)->save('upload/banner/' . $name_gen);
        $save_url = 'upload/banner/' . $name_gen;

        $banner = new Banner();
        $banner->banner_name = $request->banner_name;
        $banner->banner_slug = strtolower(str_replace('', '-', $request->banner_name));
        $banner->description = $request->description;

        $banner->banner_image = $save_url;
        $banner->save();

        toastr()->success('Banner Created Successfully');

        return redirect()->route('all.banner');

    }// End Methods


    public function UpdateBanner(Request $request){

        $request->validate(
            [
                'banner_name' => 'required|max:255',
                'banner_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'banner_name.required' => 'The Banner Name is required',

            ],
        );

        $banner_id = $request->id;
        $old_img = $request->old_img;

        if($request->file('banner_image')){

        $image = $request->file('banner_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(900, 900)->save('upload/banner/' . $name_gen);
        $save_url = 'upload/banner/' . $name_gen;

        if (file_exists($old_img)) {
            unlink($old_img);
        }


        Banner::findOrFail($banner_id)->update([

        'banner_name' => $request->banner_name,
        'banner_slug' => strtolower(str_replace('', '-', $request->banner_name)),
        'description' => $request->description,
        'banner_image' => $save_url,

        ]);

        toastr()->success('Banner Updated Successfully With Image');

        return redirect()->route('all.banner');

        }else{

            Banner::findOrFail($banner_id)->update([

                'banner_name' => $request->banner_name,
                'banner_slug' => strtolower(str_replace('', '-', $request->banner_name)),
                'description' => $request->description,

                ]);

                toastr()->success('Banner Updated Successfully WithOut Image');

                return redirect()->route('all.banner');

        }



    }// End MEthods


    public function DeleteBanner($id){

        $delete = Banner::findOrFail($id);
        $delete_image = $delete->banner_image;
        unlink($delete_image);

        Banner::findOrFail($id)->delete();

        toastr()->success('Banner Delete Successfully');

        return redirect()->route('all.banner');

    }// End MEthods

    public function  BannerInactive($id){
        Banner::find($id)->update([
            'status'=> '0',
        ]);
        toastr()->success('Banner Inactive Successfully');
        return redirect()->back();
    }// End MEthods

    public function  BannerActive($id){
        Banner::find($id)->update([
            'status'=> '1',
        ]);
        toastr()->success('Banner Active Successfully');
        return redirect()->back();
    }// End MEthods


}
