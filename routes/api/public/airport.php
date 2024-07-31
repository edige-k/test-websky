<?php


use App\Http\Controllers\Public\AirportController;
use Illuminate\Support\Facades\Route;


Route::prefix('airports')->name('airports.')->group(function (){
   Route::get('search',[AirportController::class,'search'])->name('search');
});