<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.home.home',[
        'products' =>   Product::where('status',1)->orderBy('id','desc')->take(4)->get()
        ]);
    }
    public function productCategory($catId)
    {
        return view('website.product.product-category',[
            'products'   => Product::where('category_id', $catId)->get(),
            'categories' => Category::where('status',1)->get()
        ]);
    }
    public function productDetails($id)
    {
        return view('website.product.product-details',[
         'product'  => Product::find($id)
        ]);
    }

}
