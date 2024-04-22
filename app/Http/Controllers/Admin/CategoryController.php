<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Helper;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function CategoryAll(){
        $categories= Category::all();
        return view('admin.admin.pages.category.category_all', compact('categories'));
    }// End Methods

    public function StoreCategory(Request $request){

        $validator= $request->validate(
            [
            'category_name'=> 'required|max:255',
            'category_image'=> 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_name.required' => 'The Category Name is required',
                'category_image.required' => 'The Category Image is required',
            ],

        );

        if ($validator) {

            $mainFile = $request->file('category_image');

            $imgPath = storage_path('app/public/category');

            if (empty($mainFile)) {

                Category::create([

                    'category_name' => $request->category_name,
                    'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = Helper::customUpload($mainFile, $imgPath, 20, 20);

                if ($globalFunImg['status'] == 1) {
                    Category::create([

                        'category_name' => $request->category_name,
                        'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
                        'description' => $request->description,

                        'category_image' => $globalFunImg['file_name'],

                    ]);
                } else {

                    toastr()->warning('Image upload failed! plz try again.');
                }
            }
            toastr()->success('Category Created Successfully');
        }

        return redirect()->route('all.category');

    }// End Methods

    public function UpdateCategory(Request $request){

        $category = Category::findOrFail($request->id);

        $validator = $request->validate(

            [
                'category_name' => 'required|max:255',
                'category_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_name.required' => 'Category Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('category_image');

            $uploadPath = storage_path('app/public/category');

            if (isset($mainFile)) {
                $globalFunImg = Helper::customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($category)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/category/requestImg/') . $category->category_image)) {
                        File::delete(public_path('storage/category/requestImg/') . $category->category_image);
                    }
                    if (File::exists(public_path('storage/category/') . $category->category_image)) {
                        File::delete(public_path('storage/category/') . $category->category_image);
                    }
                }

                $category->update([

                    'category_name' => $request->category_name,
                    'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
                    'description' => $request->description,
                    'category_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $category->category_image,

                ]);
            }
        }

        toastr()->success('Category Update Successfully');
        return redirect()->route('all.category');

    }// End Methods

    public function DeleteCategory($id){

        $category = Category::find($id);

        if (File::exists(public_path('storage/category/requestImg/') . $category->category_image)) {
            File::delete(public_path('storage/category/requestImg/') . $category->category_image);
        }

        if (File::exists(public_path('storage/category/') . $category->category_image)) {
            File::delete(public_path('storage/category/') . $category->category_image);
        }

        $category->delete();

        toastr()->success('Category Delete Successfully');

        return redirect()->route('all.category');

    }// End MEthods


    public function InactiveCategory($id){
        Category::find($id)->update([
            'status'=> '0'
        ]);

        toastr()->success('Category Inactive Successfully');

        return redirect()->route('all.category');

    }// End Methods

    public function ActiveCategory($id){
        Category::find($id)->update([
            'status'=> '1'
        ]);

        toastr()->success('Category Active Successfully');

        return redirect()->route('all.category');

    }// End Methods


}
