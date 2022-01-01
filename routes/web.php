<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

Route::resource('/',Controllers\FrontController::class);


Route::resource('fronts',Controllers\FrontController::class);
Route::resource('mycart',Controllers\CartController::class);
Route::post('/addtocart', [Controllers\CartController::class,'addtocart'])->name('addtocart');         // send request from product-details page by ajax
Route::middleware(['auth'])->group(function(){
    Route::post('/delete_item', [Controllers\CartController::class,'delete_item'])->name('delete_item');   // send request from mycart page by ajax to delete item
    Route::post('/update_qty',[Controllers\CartController::class,'update_qty'])->name('update_qty');     // send request from mycart to update item quantity
});
Route::resource('checkout',Controllers\CheakoutController::class); // go to checkout page to make order


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('sections',Controllers\SectionController::class);
Route::resource('products',Controllers\ProductController::class);



require __DIR__.'/auth.php';
