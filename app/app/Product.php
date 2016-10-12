<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    protected $table = 'products';



    public function categories() {
        return $this->belongsToMany('App\Category', 'products_categorys', 'product_id', 'category_id');
    }


    public function characteristics() {
        return $this->belongsToMany('App\Characteristic', 'characteristic_product', 'id_product', 'id_characteristic')->withTimestamps();
    }


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

