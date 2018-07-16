<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class Report extends Controller
{
    public function report(Request $dates){
            $myCar = Car::all()->where('updated_at','>=',$dates->startDate)
               ->where('sold','1');

//            dd($myCar." ".$dates->startDate." ".$dates->endDate);
            return view('layouts.View.generatereport',compact('myCar'));
    }
}
