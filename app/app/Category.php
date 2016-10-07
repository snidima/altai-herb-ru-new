<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';

    public function getAllCategorys(){

//        $root = $this->where('parent_id', '=', null)->select('id')->first();

        $res = $this->where('parent_id', '=', 1)->select('title','id')->get();

        return  $res;
    }

    public function products() {
        return $this->belongsToMany('App\Product', 'products_categorys', 'category_id', 'product_id');
    }




}
