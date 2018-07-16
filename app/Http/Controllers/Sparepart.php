<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpareParts;
use App\Car;
class Sparepart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i = 0 ; $i < count($request->spareparts); $i++){
            $store = new SpareParts();
            $store->spareparts = $request->spareparts[$i];
            $store->price = $request->price[$i];
            $store->company = $request->company[$i];
            $store->car = $request->car;
            $store->save();
         }
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myCar = SpareParts::all()->where('car',$id);
        $car = Car::find($id);
        return view('layouts/AddNewCar/sparepartsform/sparepartform',compact('myCar','car'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        SpareParts::destroy($id);
    }
}
