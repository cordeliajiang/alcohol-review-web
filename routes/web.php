<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ImageController;

// need to have item and review resources in place, as they creates controllers that automatically generates routes for use
Route::resource('item', ItemController::class);
Route::resource('review', ReviewController::class);
Route::resource('image', ImageController::class);

// return a index view in th eItemController class
Route::get('/', [ItemController::class, 'index']);

// return a documentation view
Route::get('/documentation', function(){
    return view('documentation');
});

// return a dashboard view
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
