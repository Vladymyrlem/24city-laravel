<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsTagController;

Route::get('/news', [NewsController::class, 'list'])->name('admin.news.list');
Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
Route::post('/news/store', [NewsController::class, 'store'])->name('admin.news.store');
Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
Route::put('/news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');
Route::get('/news/forceDelete/{id}', [NewsController::class, 'forceDelete'])->name('admin.news.forceDelete');
Route::get('/news/delete/{id}', [NewsController::class, 'destroy'])->name('admin.news.delete');
Route::get('/news/restore/{id}', [NewsController::class, 'restore'])->name('admin.news.restore');
Route::get('/news/trash', [NewsController::class, 'trash'])->name('adminNewsTrash');

Route::get('/news/categories', [NewsCategoryController::class, 'categoriesList'])->name('admin.news-categories');
Route::get('/news/categories/{id}', [NewsCategoryController::class, 'show'])->name('admin.news-category-show');
Route::get('/news/category/create', [NewsCategoryController::class, 'create'])->name('adminNewsCategoryCreate');
Route::post('/news/category/store', [NewsCategoryController::class, 'store'])->name('adminNewsCategoryStore');
Route::get('/news/category/edit/{id}', [NewsCategoryController::class, 'edit'])->name('adminNewsCategoryEdit');
Route::put('/news/category/update/{id}', [NewsCategoryController::class, 'update'])->name('adminNewsCategoryUpdate');
Route::delete('/news/category/delete/{id}', [NewsCategoryController::class, 'delete'])->name('adminNewsCategoryDelete');
Route::get('/news/category/trash/{id}', [NewsCategoryController::class, 'trash'])->name('adminNewsCategoryDelete');
Route::get('/news/category/restore/{id}', [NewsCategoryController::class, 'restore'])->name('adminNewsCategoryRestore');

Route::get('/news/tags', [NewsTagController::class, 'tagsList'])->name('admin.news-tags');
Route::get('/news/tags/{id}', [NewsTagController::class, 'show'])->name('admin.news-tag-show');
Route::get('/news/tag/create', [NewsTagController::class, 'create'])->name('adminNewsTagCreate');
Route::post('/news/tag/store', [NewsTagController::class, 'store'])->name('adminNewsTagStore');
Route::get('/news/tag/edit/{id}', [NewsTagController::class, 'edit'])->name('adminNewsTagEdit');
Route::put('/news/tag/update/{id}', [NewsTagController::class, 'update'])->name('adminNewsTagUpdate');
Route::delete('/news/tag/delete/{id}', [NewsTagController::class, 'delete'])->name('adminNewsTagDelete');
Route::get('/news/tag/trash/{id}', [NewsTagController::class, 'trash'])->name('adminNewsTagDelete');
Route::get('/news/tag/restore/{id}', [NewsTagController::class, 'restore'])->name('adminNewsTagRestore');
