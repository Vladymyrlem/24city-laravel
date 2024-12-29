<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MenuItemController;


Route::get('/menus', [MenuController::class, 'index'])->name('admin.menus.list');
Route::get('/menus/create', [MenuItemController::class, 'create'])->name('admin.menus.create');
Route::post('/menus/store', [MenuItemController::class, 'store'])->name('admin.menus.store');
Route::get('/menus/edit/{id}', [MenuItemController::class, 'edit'])->name('admin.menus.edit');
Route::put('/menus/update/{id}', [MenuItemController::class, 'update'])->name('admin.menus.update');
Route::get('/menus/forceDelete/{id}', [MenuItemController::class, 'forceDelete'])->name('admin.menus.forceDelete');
Route::get('/menus/delete/{id}', [MenuItemController::class, 'destroy'])->name('admin.menus.delete');
Route::get('/menus/restore/{id}', [MenuItemController::class, 'restore'])->name('admin.menus.restore');
Route::get('/menus/trash', [MenuItemController::class, 'trash'])->name('adminNewsTrash');
Route::get('/menus/{id}', [MenuItemController::class, 'show'])->name('admin-menus-show');

