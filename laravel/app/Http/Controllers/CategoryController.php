<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    // --- Get /api/categories
    public function getCategories()
    {
        return Category::all();
    }

    // --- Post /api/categories
    public function createCategory(Request $req )
    {
        $category = new Category;
        $category->name = $req->name;
        $category->save();
        return $category;
    }

    // --- Get /api/categories/{categoryId}
    public function getCategory($categoryId)
    {
        $category = Category::find($categoryId);

        if(!$category){
            return ["message" => "Can't find this catefory!"];
        }
        return $category;
    }

    // --- Patch /api/categories/{categoryId}
    public function updateCategory(Request $req, $categoryId)
    {
        $category = Category::find($categoryId);

        if(!$category){
            return ["message" => "Update unsuccessfull!"];
        }

        $category->name = $req->name;
        $category->save();
        return $category;
    }

    // --- Delete /api/categories/{categoryId}
    public function deleteCategory($categoryId)
    {
        $category = Category::find($categoryId);

        if(!$category){
            return ["message" => "Delete unsuccessfull!"];
        }
        
        $category->delete();

        return ["message" => "Delete successfull!"];
    }
}
