<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Files\FileUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/orders', [AdminController::class, 'index'])->name('admin.orders');
    Route::get('/admin/orders/{order}', [AdminController::class, 'detailOrder'])->name('admin.orders.detail');
    Route::put('/admin/orders/{id}', [AdminController::class, 'updateOrder'])->name('admin.orders.update');
    Route::get('/upload', [FileUploadController::class, 'showUploadForm'])->name('upload.form');
    Route::post('/upload', [FileUploadController::class, 'handleFileUpload'])->name('upload.handle');

});

require __DIR__ . '/auth.php';
