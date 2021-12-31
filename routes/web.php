<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

route::resource('/',Controllers\FrontController::class);

route::resource('fronts',Controllers\FrontController::class);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

route::resource('sections',Controllers\SectionController::class);
route::resource('products',Controllers\ProductController::class);



require __DIR__.'/auth.php';
