<?php

namespace App\Http\Controllers;


use App\Characteristic;
use App\Product;
use App\Category;

use Illuminate\Http\Request;






class ProductController extends Controller
{
    public function main( Product $products, Category $category  )
    {

//        dd($products->getAllProducts());

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



    public function loloo()
    {
        $prods = Product::has('characteristics')
//            ->has('categories')
            ->with('characteristics')
            ->with('characteristics.units')
            ->get();

//        dd($prods->toArray());

        return view('shop', [
            'products' => $prods,
            'categories' => []
        ]);
    }


}
