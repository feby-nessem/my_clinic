
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

route::get('/booking/create',[BookingController::class,'create'])->name('booking.create');
route::post('/booking',[BookingController::class,'store'])->name('booking.store');
route::get('/',[BookingController::class,'index'])->name('booking.index');
route::delete('/booking/{id}',[BookingController::class,'destroy'])->name('booking.destroy');
route::get('/booking/{id}/edit',[BookingController::class,'edit'])->name('booking.edit');
route::put('/booking/{id}',[BookingController::class,'update'])->name('booking.update');