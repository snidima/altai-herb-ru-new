<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Unit extends Model
{

    public function characteristic()
    {
        return $this->belongsTo('App\Characteristic', 'id_unit');
    }

}