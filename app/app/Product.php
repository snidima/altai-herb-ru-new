<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\ProductOption;

class Product extends Model
{
    protected $table = 'products';
//    protected $with = array('options');


    public function options()
    {
        return $this->hasMany('App\ProductOption');
    }


//    public function getOptions()
//    {
//        $prod = Product::find(1);
//        $res = $prod->options()->get();
//        return $res;
//    }



    public function getAllProducts()
    {
        return $this->getWidthOptions();
    }

    public function getWidthOptions()
    {
        $res = $this->with(['options' => function($q){
            $q->where('slug','=','weight')->orderBy('value', 'desc');
        }])->get();
        return  $res;
    }


    public function getInCategory( $id )
    {
        $cat = Category::find( $id );
        $products = $cat->products()->get();
        return $products;
    }

}

