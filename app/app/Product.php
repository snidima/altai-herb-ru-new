<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';


    public function getAllProducts()
    {
        $res = $this->get();
        return  $res;
    }




    public function getInCategory( $id )
    {
        $cat = Category::find( $id );
        $products = $cat->products()->get();
        return $products;

    }

}

