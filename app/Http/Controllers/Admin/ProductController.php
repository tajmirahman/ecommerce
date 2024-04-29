<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Color;

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


}
