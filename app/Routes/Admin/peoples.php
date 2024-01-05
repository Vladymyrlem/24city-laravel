<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PeoplesController;

Route::get('/peoples', [PeoplesController::class, 'list'])->name('admin.peoples.list');
Route::get('/peoples/create', [PeoplesController::class, 'create'])->name('admin.peoples.create');
Route::post('/peoples/store', [PeoplesController::class, 'store'])->name('admin.peoples.store');
Route::get('/peoples/edit/{id}', [PeoplesController::class, 'edit'])->name('admin.peoples.edit');
Route::get('/peoples/{slug}', [PeoplesController::class, 'show'])->name('admin.peoples.show');
Route::put('/peoples/update/{id}', [PeoplesController::class, 'update'])->name('admin.peoples.update');
Route::get('/peoples/forceDelete/{id}', [PeoplesController::class, 'forceDelete'])->name('admin.peoples.forceDelete');
Route::get('/peoples/delete/{id}', [PeoplesController::class, 'destroy'])->name('admin.peoples.delete');
Route::get('/peoples/restore/{id}', [PeoplesController::class, 'restore'])->name('admin.peoples.restore');
Route::get('/peoples/trash', [PeoplesController::class, 'trash'])->name('adminNewsTrash');

//Route::get('/peoples/categories', [NewsCategoryController::class, 'categoriesList'])->name('admin.peoples-categories');
//Route::get('/peoples/categories/{id}', [NewsCategoryController::class, 'show'])->name('admin.peoples-category-show');
//Route::get('/peoples/category/create', [NewsCategoryController::class, 'create'])->name('adminNewsCategoryCreate');
//Route::post('/peoples/category/store', [NewsCategoryController::class, 'store'])->name('adminNewsCategoryStore');
//Route::get('/peoples/category/edit/{id}', [NewsCategoryController::class, 'edit'])->name('adminNewsCategoryEdit');
//Route::put('/peoples/category/update/{id}', [NewsCategoryController::class, 'update'])->name('adminNewsCategoryUpdate');
//Route::delete('/peoples/category/delete/{id}', [NewsCategoryController::class, 'delete'])->name('adminNewsCategoryDelete');
//Route::get('/peoples/category/trash/{id}', [NewsCategoryController::class, 'trash'])->name('adminNewsCategoryDelete');
//Route::get('/peoples/category/restore/{id}', [NewsCategoryController::class, 'restore'])->name('adminNewsCategoryRestore');

Route::get('/peoples/tags', [NewsTagController::class, 'tagsList'])->name('admin.peoples-tags');
Route::get('/peoples/tags/{id}', [NewsTagController::class, 'show'])->name('admin.peoples-tag-show');
Route::get('/peoples/tag/create', [NewsTagController::class, 'create'])->name('adminNewsTagCreate');
Route::post('/peoples/tag/store', [NewsTagController::class, 'store'])->name('adminNewsTagStore');
Route::get('/peoples/tag/edit/{id}', [NewsTagController::class, 'edit'])->name('adminNewsTagEdit');
Route::put('/peoples/tag/update/{id}', [NewsTagController::class, 'update'])->name('adminNewsTagUpdate');
Route::delete('/peoples/tag/delete/{id}', [NewsTagController::class, 'delete'])->name('adminNewsTagDelete');
Route::get('/peoples/tag/trash/{id}', [NewsTagController::class, 'trash'])->name('adminNewsTagDelete');
Route::get('/peoples/tag/restore/{id}', [NewsTagController::class, 'restore'])->name('adminNewsTagRestore');
