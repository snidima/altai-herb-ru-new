<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Characteristic extends Model
{

    public function units()
    {
        return $this->belongsTo('App\Unit', 'id_unit');
    }

    public function products() {
        return $this->belongsToMany('App\Product', 'characteristic_product', 'id_characteristic', 'id_product');
    }


}