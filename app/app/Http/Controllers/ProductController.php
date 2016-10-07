<?php

namespace App\Http\Controllers;


use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function main( Product $products, Category $category  )
    {

        return view('shop', [
            'products' => $products->getAllProducts(),
            'categories' => $category->getAllCategorys()
        ]);
    }

    public function applyCategory( $id , Product $product, Category $category ){

        return view('shop', [
            'products' => $product->getInCategory( $id ),
            'categories' => $category->getAllCategorys()
        ]);
    }


}
