<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private static $category;
    public function addCategory()
    {
        return view('admin.category.add-category');
    }
    public function saveCategory(Request $request)
    {
       Category::saveCategory($request);
       return back()->with('message', 'info save successfully');
    }
    public function manageCategory()
    {
        return view('admin.category.manage-category',[
            'categories' => Category::all()
            ]);
    }
    public function statusCategory($id)
    {
        self::$category = Category::find($id);
        if(self::$category->status == 1 )
        {
            self::$category->status = 0;
        }
        else{
            self::$category->status = 1;
        }
        self::$category->save();
        return back()->with('message','info update successfully');
    }
    public function editCategory($id)
    {
        return view('admin.category.edit-category',[
            'category' => Category::find($id)
        ]);
    }
    public function updateCategory(Request $request)
    {
        Category:: updateCategory($request);
        return redirect(route('category.manage'))->with('message','info update successfully');
    }

    public function deleteCategory(Request $request)
    {
       self::$category = Category::find($request->id);
       if(file_exists(self::$category->image))
       {
            unlink(self::$category->image);
       }
       self::$category->delete();
       return back()->with('message', 'info delete successfully');
    }
}
