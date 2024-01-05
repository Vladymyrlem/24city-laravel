<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\SharesController;

Route::get('/shares', [SharesController::class, 'list'])->name('admin.shares.list');
Route::get('/shares/create', [SharesController::class, 'create'])->name('admin.shares.create');
Route::post('/shares/store', [SharesController::class, 'store'])->name('admin.shares.store');
Route::get('/shares/edit/{id}', [SharesController::class, 'edit'])->name('admin.shares.edit');
Route::put('/shares/update/{id}', [SharesController::class, 'update'])->name('admin.shares.update');
Route::get('/shares/forceDelete/{id}', [SharesController::class, 'forceDelete'])->name('admin.shares.forceDelete');
Route::get('/shares/delete/{id}', [SharesController::class, 'destroy'])->name('admin.shares.delete');
Route::get('/shares/restore/{id}', [SharesController::class, 'restore'])->name('admin.shares.restore');
Route::get('/shares/trash', [SharesController::class, 'trash'])->name('adminPressTrash');
Route::get('/shares/{slug}', [SharesController::class, 'show'])->name('admin.shares.show');
