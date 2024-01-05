<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PressController;

Route::get('/press', [PressController::class, 'index'])->name('admin.press.list');
Route::get('/press/create', [PressController::class, 'create'])->name('admin.press.create');
Route::post('/press/store', [PressController::class, 'store'])->name('admin.press.store');
Route::get('/press/edit/{id}', [PressController::class, 'edit'])->name('admin.press.edit');
Route::put('/press/update/{id}', [PressController::class, 'update'])->name('admin.press.update');
Route::get('/press/forceDelete/{id}', [PressController::class, 'forceDelete'])->name('admin.press.forceDelete');
Route::get('/press/delete/{id}', [PressController::class, 'destroy'])->name('admin.press.delete');
Route::get('/press/restore/{id}', [PressController::class, 'restore'])->name('admin.press.restore');
Route::get('/press/trash', [PressController::class, 'trash'])->name('adminPressTrash');
Route::get('/press/{slug}', [PressController::class, 'show'])->name('admin.press.show');
