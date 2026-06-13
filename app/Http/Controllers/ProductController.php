<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function Nette\Utils\delete;
use function Symfony\Component\HttpFoundation\Session\Storage\save;

class ProductController extends Controller
{
    private static $product;
    public function addProductForm()
    {
        return view('admin.product.add-product',[
           'categories' =>  Category::where('status',1)->get()
            ]);
    }

    public function saveProduct(Request $request)
    {
       Product::saveProduct($request);
       return back()->with('message', 'info save successfully');
    }
    public function manageProduct()
    {
        return view('admin.product.manage-product',[
            'products' => Product::all()
        ]);
    }
    public function editProduct($id)
    {
        return view('admin.product.edit-product',[
            'product' => Product::find($id),
            'categories' =>  Category::where('status',1)->get()
        ]);
    }
    public function updateProduct(Request $request)
    {
        Product:: updateProduct($request);
        return redirect(route('product.manage'))->with('message','info update successfully');
    }
    public function statusProduct($id)
    {
        self::$product = Product::find($id);
        if(self::$product->status == 1)
        {
            self::$product->status = 0;
        }
        else
        {
            self::$product->status = 1;
        }
        self::$product->save();
        return back()->with('message','info updated successfully');

    }
    public function deleteProduct(Request $request)
    {
        self::$product = Product::find($request->id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
        return back()->with('message','info deleted successfully');
    }
}
