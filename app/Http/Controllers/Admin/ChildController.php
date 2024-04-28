<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Helper;
use Illuminate\Support\Facades\File;

class ChildController extends Controller
{
    public function AllChild(){

        $categorys= Category::orderBy('category_name','ASC')->latest()->get();
        $childs= ChildCategory::all();
        return view('admin.admin.pages.child.child_all',compact('childs','categorys'));
    }// End Methods

    public function StoreChild(Request $request){

        $validator = $request->validate(

            [
                'category_id' => 'required',
                'subcategory_id'=> 'required',
                'childcategory_name' => 'required|max:255',
                'childcategory_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_id.required' => 'Category Name is required',
                'subcategory_id.required' => 'Sub-Category Name is required',
                'childcategory_name.required' => 'Child Category Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('childcategory_image');
            $imgPath = storage_path('app/public/childcategory');

            if (empty($mainFile)) {
                ChildCategory::insert([

                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'childcategory_name' => $request->childcategory_name,
                    'childcategory_slug' => strtolower(str_replace('', '-', $request->childcategory_name)),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = Helper::customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {

                    ChildCategory::insert([

                        'category_id' => $request->category_id,
                        'subcategory_id' => $request->subcategory_id,
                        'childcategory_name' => $request->childcategory_name,
                        'childcategory_slug' => strtolower(str_replace('', '-', $request->childcategory_name)),
                        'description' => $request->description,

                        'childcategory_image' => $globalFunImg['file_name'],

                    ]);

                } else {
                    toastr()->warning('Image upload failed! plz try again.');
                }

            }

            toastr()->success('Child Category Created Successfully');
            return redirect()->route('all.child');
        }

    }// End Mehthods

}
