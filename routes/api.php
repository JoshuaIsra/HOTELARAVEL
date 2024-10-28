<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\habitacionController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ReservaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('habitacion')->group(function () {

    Route::get('/all',[habitacionController::class,'gethabitacion']);
    Route::post('/new',[habitacionController::class,'createhabitacion']);
    Route::put('/update/{id}',[habitacionController::class,'updatehabitacion']);
    Route::delete('/delete/{id}',[habitacionController::class,'deletehabitacion']);
    Route::get('/{id}',[habitacionController::class,'showhabitacion']);
});

Route::prefix('cliente')->group(function () {

    Route::get('/all',[ClienteController::class,'getcliente']);
    Route::post('/new',[ClienteController::class,'store']);
    Route::put('/update/{id}',[ClienteController::class,'updatecliente']);
    Route::delete('/delete/{id}',[ClienteController::class,'deletecliente']);
    Route::get('/{id}',[ClienteController::class,'showcliente']);
});

Route::prefix('personal')->group(function () {

    Route::get('/all',[PersonalController::class,'getpersonal']);
    Route::post('/new',[PersonalController::class,'store']);
    Route::put('/update/{id}',[PersonalController::class,'updatepersonal']);
    Route::delete('/delete/{id}',[PersonalController::class,'deletepersonal']);
    Route::get('/{id}',[PersonalController::class,'showpersonal']);
});

Route::prefix('reserva')->group(function () {
    Route::get('/all',[ReservaController::class,'getReserva']);
    Route::post('/new',[ReservaController::class,'newReserva']);
    Route::put('/update/{id}',[ReservaController::class,'updateReserva']);//pendiente
    Route::delete('/delete/{id}',[ReservaController::class,'deleteReserva']);  
    Route::get('/{id}',[ReservaController::class,'showReserva']);

});

Route::prefix('factura')->group(function () {
    Route::get('/all',[FacturaController::class,'getFactura']);
    Route::post('/new',[FacturaController::class,'newFactura']);
    Route::put('/update/{id}',[FacturaController::class,'updateFactura']);
    Route::delete('/delete/{id}',[FacturaController::class,'deleteFactura']); 
    Route::get('/{id}',[FacturaController::class,'showFactura']);   

});


