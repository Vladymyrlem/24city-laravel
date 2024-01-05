<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RealEstateController;
use App\Http\Controllers\Admin\RealEstateCategoryController;
use App\Http\Controllers\Admin\RealEstateTagController;

Route::get('/real-estate', [RealEstateController::class, 'list'])->name('admin.real-estate.list');
Route::get('/real-estate/{slug}', [RealEstateController::class, 'show'])->name('admin.real-estate.show');
Route::get('/real-estate/create', [RealEstateController::class, 'create'])->name('admin.real-estate.create');
Route::post('/real-estate/store', [RealEstateController::class, 'store'])->name('admin.real-estate.store');
Route::get('/real-estate/edit/{id}', [RealEstateController::class, 'edit'])->name('admin.real-estate.edit');
Route::put('/real-estate/update/{id}', [RealEstateController::class, 'update'])->name('admin.real-estate.update');
Route::get('/real-estate/forceDelete/{id}', [RealEstateController::class, 'forceDelete'])->name('admin.real-estate.forceDelete');
Route::get('/real-estate/delete/{id}', [RealEstateController::class, 'destroy'])->name('admin.real-estate.delete');
Route::get('/real-estate/restore/{id}', [RealEstateController::class, 'restore'])->name('admin.real-estate.restore');
Route::get('/real-estate/trash', [RealEstateController::class, 'trash'])->name('adminRealEstateTrash');

Route::get('/real-estate/categories', [RealEstateCategoryController::class, 'categoriesList'])->name('admin.real-estate-categories');
Route::get('/real-estate/categories/{id}', [RealEstateCategoryController::class, 'show'])->name('admin.real-estate-category-show');
Route::get('/real-estate/category/create', [RealEstateCategoryController::class, 'create'])->name('adminRealEstateCategoryCreate');
Route::post('/real-estate/category/store', [RealEstateCategoryController::class, 'store'])->name('adminRealEstateCategoryStore');
Route::get('/real-estate/category/edit/{id}', [RealEstateCategoryController::class, 'edit'])->name('adminRealEstateCategoryEdit');
Route::put('/real-estate/category/update/{id}', [RealEstateCategoryController::class, 'update'])->name('adminRealEstateCategoryUpdate');
Route::delete('/real-estate/category/delete/{id}', [RealEstateCategoryController::class, 'delete'])->name('adminRealEstateCategoryDelete');
Route::get('/real-estate/category/trash/{id}', [RealEstateCategoryController::class, 'trash'])->name('adminRealEstateCategoryDelete');
Route::get('/real-estate/category/restore/{id}', [RealEstateCategoryController::class, 'restore'])->name('adminRealEstateCategoryRestore');

Route::get('/real-estate/tags', [RealEstateTagController::class, 'tagsList'])->name('admin.real-estate-tags');
Route::get('/real-estate/tags/{id}', [RealEstateTagController::class, 'show'])->name('admin.real-estate-tag-show');
Route::get('/real-estate/tag/create', [RealEstateTagController::class, 'create'])->name('adminRealEstateTagCreate');
Route::post('/real-estate/tag/store', [RealEstateTagController::class, 'store'])->name('adminRealEstateTagStore');
Route::get('/real-estate/tag/edit/{id}', [RealEstateTagController::class, 'edit'])->name('adminRealEstateTagEdit');
Route::put('/real-estate/tag/update/{id}', [RealEstateTagController::class, 'update'])->name('adminRealEstateTagUpdate');
Route::delete('/real-estate/tag/delete/{id}', [RealEstateTagController::class, 'delete'])->name('adminRealEstateTagDelete');
Route::get('/real-estate/tag/trash/{id}', [RealEstateTagController::class, 'trash'])->name('adminRealEstateTagDelete');
Route::get('/real-estate/tag/restore/{id}', [RealEstateTagController::class, 'restore'])->name('adminRealEstateTagRestore');
