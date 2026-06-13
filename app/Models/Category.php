<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $image, $imageNewName, $directory, $imgUrl;

    public static function saveCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->image = self::getImageUrl($request);
        self::$category->save();
    }

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = rand().'.'.self::$image->extension();
        self::$directory = 'admin-assets/category-image/';
        self::$imgUrl = self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    public static function updateCategory($request)
    {
        self::$category = Category::find($request->id);
        self::$category->name = $request->name;
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$category->image = self::getImageUrl($request);
        }
        self::$category->save();
    }
}
