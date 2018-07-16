<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpareParts extends Model
{
    //
    protected $table = 'spare_parts';



    public function cars(){
        return $this->belongsTo('App\Car');
    }
}
