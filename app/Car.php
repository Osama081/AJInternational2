<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //

    public  $table = 'cars';
    protected $fillable  = [
        'name','chasis','grade','manuFactureyear','aunctionaousename','sellingprice','auctionhouse','profit','purchasingprice','sold','aunctionHouseName'
    ];


    public function sparePart(){
        return $this->hasMany('App\SpareParts','car');
    }
}
