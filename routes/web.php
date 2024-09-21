<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [HomeController::class, 'index_adminHome'])->middleware(['auth', 'admin']);
Route::get('/view_catergory', [AdminController::class, 'view_catergory'])->middleware(['auth', 'admin'])->name('view_catergory');
Route::post('/add_catergory', [AdminController::class, 'CatergoryAdd'])->middleware(['auth', 'admin'])->name('Add_catergory');
Route::get('/update/catergory/{slug}', [AdminController::class, 'CatergoryUpdate'])->middleware(['auth', 'admin'])->name('updatecatergory');
Route::put('/edith/catergory/{id}', [AdminController::class, 'update'])->middleware(['auth', 'admin'])->name('catergoryEdith');
Route::get('/delete/catergory/{id}', [AdminController::class, 'delete'])->middleware(['auth', 'admin'])->name('catergoryDelete');

Route::get('/add_product', [AdminController::class, 'Formproduct'])->middleware(['auth', 'admin'])->name('productAdd');
Route::post('/add_product/product', [AdminController::class, 'productadd'])->middleware(['auth', 'admin'])->name('AddProduct');