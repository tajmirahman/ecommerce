<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\MultiImage;
use App\Models\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\Color;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
   public function AllProduct(){
    $products= Product::all();
    return view('admin.admin.pages.product.all_product',compact('products'));
   }// End Methods


   public function AddProduct(){

    $products = Product::where('status', '1')->latest()->get();
    $categorys = Category::where('status', '1')->latest()->get();
    $brands = Brand::where('status', '1')->latest()->get();
    $colors = Color::latest()->get();
    return view('admin.admin.pages.product.add_product',compact('products','categorys','colors','brands'));
   }// End Methods


   public function StoreProduct(Request $request){

        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('upload/product/mainimage/' . $name_gen);
        $save_url = 'upload/product/mainimage/' . $name_gen;

        $color = $request->color_id;
        $colors = implode(' ', $color);

        $product_id = Product::insertGetId([

            'product_name' => $request->product_name,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'sku_code' => $request->sku_code,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

            'stock' => $request->stock,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,

            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'color_id' => $colors,

            'tags' => $request->tags,
            'short_desc' => $request->short_desc,
            'overview' => $request->overview,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_image' => $save_url,

        ]);



        // Multi Image

        $images = $request->file('multi_image');

        foreach ($images as $img) {
            $make_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->save('upload/product/multiimage/' . $make_gen);
            $uploadPath = 'upload/product/multiimage/' . $make_gen;

            MultiImage::insert([

                'product_id' => $product_id,
                'multi_image' => $uploadPath,

            ]);
        }

        toastr()->success('Product Created Successfully');
        return redirect()->route('all.product');

   }// End Methods


   public function EditProduct($id){

    $editProduct = Product::findOrFail($id);

    $products = Product::where('status', '1')->latest()->get();
    $categorys = Category::where('status', '1')->latest()->get();
    $brands = Brand::where('status', '1')->latest()->get();
    $colors = Color::latest()->get();

    $cats= $editProduct->category_id;
    $subCategorys= SubCategory::where('category_id',$cats)->latest()->get();

    $childcats = $editProduct->category_id;
    $subcats = $editProduct->subategory_id;
    $childcategorys = ChildCategory::where('subcategory_id', $childcats)->where('subcategory_id', $subcats)->latest()->get();

    $multiImages = MultiImage::where('product_id', $id)->latest()->get();


    return view('admin.admin.pages.product.edit_product',compact('products','categorys','colors','brands','editProduct','subCategorys','childcategorys','multiImages'));


   }// End Methods


   Public function UpdateProduct(Request $request){

    $updateId= $request->id;
    $oldImg= $request->old_img;

    $color = $request->color_id;
    $colors = implode(' ', $color);

    if($request->file('product_image')){

        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('upload/product/mainimage/' . $name_gen);
        $save_url = 'upload/product/mainimage/' . $name_gen;

        if (file_exists($oldImg)) {
            unlink($oldImg);
        }

        Product::findOrFail($updateId)->update([

            'product_name' => $request->product_name,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'sku_code' => $request->sku_code,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

            'stock' => $request->stock,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,

            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'color_id' => $colors,

            'tags' => $request->tags,
            'short_desc' => $request->short_desc,
            'overview' => $request->overview,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_image' => $save_url,

        ]);

        toastr()->success('Product Update Successfully');
        return redirect()->route('all.product');

    }else{
        Product::findOrFail($updateId)->update([

            'product_name' => $request->product_name,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'sku_code' => $request->sku_code,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

            'stock' => $request->stock,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,

            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'color_id' => $colors,

            'tags' => $request->tags,
            'short_desc' => $request->short_desc,
            'overview' => $request->overview,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,


        ]);

        toastr()->success('Product Update Successfully');
        return redirect()->route('all.product');
    }



   }// End Methods







   public function GetCheckDistrict($category_id){

    $subcat= SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();

    return json_encode($subcat);

   }// End Methods

   public function GetCheckChild($subcategory_id){

    $childcat= ChildCategory::where('subcategory_id', $subcategory_id)->orderBy('childcategory_name', 'ASC')->get();

    return json_encode($childcat);

   }// End Methods


}
