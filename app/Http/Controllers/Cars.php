<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\SpareParts;
use Illuminate\Support\Facades\Route;
class Cars extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('layouts.AddNewCar.newcarform');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $myroute = Route::currentRouteName();


        $myCar = Car::all()->where('sold','0');
        if($myroute == 'home')
            return view('layouts.View.dash',compact('myCar'));
        return view('layouts.View.viewunsold',compact('myCar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $myCar = new Car();
        $myCar->chasis =   $request->chasis;
        $myCar->name = $request->name;
        $myCar->model = $request->model;
        $myCar->grade = $request->grade;
        $myCar->auctionhouse  = $request->auctionhouse;
        if( $myCar->auctionhouse)
            $myCar->aunctionHouseName = $request->aunctionHouseName;
        $myCar->manuFactureyear = $request->manuFactureyear;
        $myCar->purchasingprice = $request->purchasingprice;
        $myCar->to = $request->to;
        $myCar->from = $request->from;
        $myCar->expense = $request->expense;
        $myCar->save();
        return redirect()->route(Route::currentRouteName());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $myCar = Car::find($id);
         return view('layouts.View.updateCar',compact('myCar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $myCar = Car::find($id);
        $myCar->chasis =   $request->chasis;
        $myCar->name = $request->name;
        $myCar->model = $request->model;
        $myCar->grade = $request->grade;
        $myCar->auctionhouse  = $request->auctionhouse;
        if( $myCar->auctionhouse)
            $myCar->aunctionHouseName = $request->aunctionHouseName;
        $myCar->manuFactureyear = $request->manuFactureyear;
        $myCar->purchasingprice = $request->purchasingprice;
        $myCar->to = $request->to;
        $myCar->from = $request->from;
        $myCar->expense = $request->expense;
        $myCar->save();
         return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          $cars = Car::destroy($id);
          $parts = SpareParts::all()->where('car',$id);
          foreach($parts as $part)
               SpareParts::destroy($part->id);
          $cars->save();
          return $parts;
    }

    //function below will throw
    //Where You will be able to
    //view the current information
    public function  viewstatus($id){
        $myCar = Car::find($id);
        if(isset($myCar))
            return view('layouts/View/updatestatus',compact('myCar'));
        else
            return redirect()->back();
    }
    public function updatestatus(Request $request){
            $myCar = Car::find($request->carid);
            $myCar->sold = true;
            $myCar->sellingprice = $request->sellingprice;
            $sum =  0 ;

            $myCar->save();
            return redirect()->route('home');
    }


    public function viewWorkshop($id){
        $myCar = Car::find($id);
//        dd($myCar);
        if(isset($myCar))
            return view('layouts/View/workshopform',compact('myCar'));
        else
            return redirect()->back();
    }

    public function  updateworkshop(Request $request){
        $myCar = Car::find($request->car);
        $myCar->workshopname = $request->workshopname;
        $myCar->workshopexpense = $request->workshopexpense;
        $myCar->save();

        $myCar = Car::all()->where('sold','0');
        return view('layouts.View.viewunsold',compact('myCar'));
    }
    public function showform($id)
    {

    }
}
