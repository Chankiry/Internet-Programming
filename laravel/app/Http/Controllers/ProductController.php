<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    // --- Get /api/products
    public function getProducts()
    {
        return Product::all();
    }

    // --- Post /api/products
    public function createProduct(Request $req )
    {
        
        $category = Category::find($req->category_id);
        
        if(!$category){
            return ["message" => "Can't find this catetory!"];
        }
        
        $product = new Product;
        $product->name = $req->name;
        $product->pricing = $req->pricing;
        $product->category_id = $req->category_id;
        $product->description = $req->description;
        $product->save();
        
        return $product;
    }

    // --- Get /api/products/{productId}
    public function getProduct($productId)
    {
        $product = Product::find($productId);

        if(!$product){
            return ["message" => "Can't find this product!"];
        }
        return $product;
    }

    // --- Patch /api/products/{productId}
    public function updateProduct(Request $req, $productId)
    {
        

        $category = Category::find($req->category_id);
        
        if(!$category){
            return ["message" => "Can't find this catetory!"];
        }
        
        $product = Product::find($productId);

        if(!$product){
            return ["message" => "Update unsuccessfull!"];
        }

        $product->name = $req->name;
        $product->category_id = $req->category_id;
        $product->pricing = $req->pricing;
        $product->description = $req->description;
        $product->save();

        return $product;
    }

    // --- Delete /api/products/{productId}
    public function deleteProduct($productId)
    {
        $product = Product::find($productId);

        if(!$product){
            return ["message" => "Delete unsuccessfull!"];
        }
        
        $product->delete();

        return ["message" => "Delete successfull!"];
    }
}
