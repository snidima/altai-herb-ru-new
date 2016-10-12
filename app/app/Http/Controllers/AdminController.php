<?php

namespace App\Http\Controllers;



use App\Product;




class AdminController extends Controller
{


    public function dashboard()
    {
        $prods = Product::first()
            ->with('categories')
            ->with('characteristics')
            ->with('characteristics.units')
            ->get();

//        dd($prods);

        return view('admin.products', [
            'products' => $prods
        ]);
    }

}
