<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\Color;
use App\Models\Admin\MultiImage;

class IndexController extends Controller
{
    public function ProductDetails($id,$slug){

        $products= Product::findOrFail($id);
        $color= Color::latest()->get();
        $multiImages= MultiImage::where('product_id', $id)->get();

        $catId= $products->category_id;
        $relProducts= Product::where('category_id',$catId)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();

        return view('frontend.pages.product.product_details',compact('products','color','multiImages','relProducts'));

    }// End Methods
}
