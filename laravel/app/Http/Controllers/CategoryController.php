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
        return ["message" => "Getting 1 category based on given categoryId"];
    }

    // --- Patch /api/categories/{categoryId}
    public function updateCategory($categoryId)
    {
        return ["message" => "Updating 1 category based on given categoryId"];
    }

    // --- Delete /api/categories/{categoryId}
    public function deleteCategory($categoryId)
    {
        return ["message" => "Deleting 1 category based on given categoryId"];
    }
}
