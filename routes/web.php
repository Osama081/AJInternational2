<?php






Route::get('login',function (){
    return view('auth.login');
});


Route::group(['middleware' => ['auth']], function () {
    //Cars Resources
    Route::resource('cars','Cars');
    //route below for generating the reports
    Route::get('/rep',function (){
        return view('layouts.View.generatereport');
    });
    Route::put('cars/cars/{id}','Cars@update')->name('c');
//    Auth::routes();
    Route::get('cars/update_status/{id}','Cars@viewstatus');
    Route::post('cars/set_sold','Cars@updatestatus')->name('set.sold');
    Route::resource('spare_part','Sparepart');
    Route::get('cars/update_workshop/{id}','Cars@viewWorkshop')->name('form.update.workshop');
    Route::post('/updateworkshop','Cars@updateworkshop')->name('update.workshop');
    Route::get('/','Cars@create')->name('home');
    Route::get('generate','Report@report')->name('rep');

});




Auth::routes();







