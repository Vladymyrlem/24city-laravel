<?php

use App\Http\Controllers\Admin\OutlinesCategoryController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OutlinesController;

Route::get('/outlines', [OutlinesController::class, 'list'])->name('admin.outlines.list');
Route::get('/outlines/create', [OutlinesController::class, 'create'])->name('admin.outlines.create');
Route::post('/outlines/store', [OutlinesController::class, 'store'])->name('admin.outlines.store');
Route::get('/outlines/edit/{id}', [OutlinesController::class, 'edit'])->name('admin.outlines.edit');
Route::put('/outlines/update/{id}', [OutlinesController::class, 'update'])->name('admin.outlines.update');
Route::get('/outlines/forceDelete/{id}', [OutlinesController::class, 'forceDelete'])->name('admin.outlines.forceDelete');
Route::get('/outlines/delete/{id}', [OutlinesController::class, 'destroy'])->name('admin.outlines.delete');
Route::get('/outlines/restore/{id}', [OutlinesController::class, 'restore'])->name('admin.outlines.restore');
Route::get('/outlines/trash', [OutlinesController::class, 'trash'])->name('adminOutlinesTrash');

//Route::get('/outlines/categories', [OutlinesCategoryController::class, 'categoriesList'])->name('admin.outlines-categories');
//Route::get('/outlines/categories/{id}', [OutlinesCategoryController::class, 'show'])->name('admin.outlines-category-show');
//Route::get('/outlines/category/create', [OutlinesCategoryController::class, 'create'])->name('adminOutlinesCategoryCreate');
//Route::post('/outlines/category/store', [OutlinesCategoryController::class, 'store'])->name('adminOutlinesCategoryStore');
//Route::get('/outlines/category/edit/{id}', [OutlinesCategoryController::class, 'edit'])->name('adminOutlinesCategoryEdit');
//Route::put('/outlines/category/update/{id}', [OutlinesCategoryController::class, 'update'])->name('adminOutlinesCategoryUpdate');
//Route::delete('/outlines/category/delete/{id}', [OutlinesCategoryController::class, 'delete'])->name('adminOutlinesCategoryDelete');
//Route::get('/outlines/category/trash/{id}', [OutlinesCategoryController::class, 'trash'])->name('adminOutlinesCategoryDelete');
//Route::get('/outlines/category/restore/{id}', [OutlinesCategoryController::class, 'restore'])->name('adminOutlinesCategoryRestore');

Route::get('/outlines/tags', [TagController::class, 'outlinesTags'])->name('admin.outlines-tags');
Route::get('/outlines/tags/{id}', [TagController::class, 'show'])->name('admin.outlines-tag-show');
Route::get('/outlines/tag/create', [TagController::class, 'create'])->name('adminOutlinesTagCreate');
Route::post('/outlines/tag/store', [TagController::class, 'store'])->name('adminOutlinesTagStore');
Route::get('/outlines/tag/edit/{id}', [TagController::class, 'edit'])->name('adminOutlinesTagEdit');
Route::put('/outlines/tag/update/{id}', [TagController::class, 'update'])->name('adminOutlinesTagUpdate');
Route::delete('/outlines/tag/delete/{id}', [TagController::class, 'delete'])->name('adminOutlinesTagDelete');
Route::get('/outlines/tag/trash/{id}', [TagController::class, 'trash'])->name('adminOutlinesTagDelete');
Route::get('/outlines/tag/restore/{id}', [TagController::class, 'restore'])->name('adminOutlinesTagRestore');
