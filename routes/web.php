<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

route::resource('sections',Controllers\SectionController::class);
route::resource('products',Controllers\ProductController::class);


route::resource('fronts',Controllers\FrontController::class);

require __DIR__.'/auth.php';
