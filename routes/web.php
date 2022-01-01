<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

Route::resource('/',Controllers\FrontController::class);


Route::resource('fronts',Controllers\FrontController::class);
Route::middleware(['auth'])->group(function(){
    Route::resource('mycart',Controllers\CartController::class);
    Route::post('/addtocart', [Controllers\CartController::class,'addtocart'])->name('addtocart');         // send request from product-details page by ajax
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('sections',Controllers\SectionController::class);
Route::resource('products',Controllers\ProductController::class);



require __DIR__.'/auth.php';
