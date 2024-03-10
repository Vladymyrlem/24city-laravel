<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MainNewsController;
use App\Http\Controllers\Admin\MainNewsCategoryController;
use App\Http\Controllers\Admin\MainNewsTagController;

Route::get('/main-news', [MainNewsController::class, 'index'])->name('admin.main-news.list');
Route::get('/main-news/{slug}', [MainNewsController::class, 'showNews'])->name('admin.mainNewsShow');
Route::get('/main-news/create', [MainNewsController::class, 'create'])->name('admin.main-news.create');
Route::post('/main-news/store', [MainNewsController::class, 'store'])->name('admin.main-news.store');
Route::get('/main-news/edit/{id}', [MainNewsController::class, 'edit'])->name('admin.main-news.edit');
Route::put('/main-news/update/{id}', [MainNewsController::class, 'update'])->name('admin.main-news.update');
Route::get('/main-news/forceDelete/{id}', [MainNewsController::class, 'forceDelete'])->name('admin.main-news.forceDelete');
Route::get('/main-news/delete/{id}', [MainNewsController::class, 'destroy'])->name('admin.main-news.delete');
Route::get('/main-news/restore/{id}', [MainNewsController::class, 'restore'])->name('admin.main-news.restore');
Route::get('/main-news/trash', [MainNewsController::class, 'trash'])->name('adminMainNewsTrash');

Route::get('/main-news/categories', [MainNewsCategoryController::class, 'categoriesList'])->name('admin.main-news-categories');
Route::get('/main-news/categories/{id}', [MainNewsCategoryController::class, 'show'])->name('admin.main-news-category-show');
Route::get('/main-news/category/create', [MainNewsCategoryController::class, 'create'])->name('adminMainNewsCategoryCreate');
Route::post('/main-news/category/store', [MainNewsCategoryController::class, 'store'])->name('adminMainNewsCategoryStore');
Route::get('/main-news/category/edit/{id}', [MainNewsCategoryController::class, 'edit'])->name('adminMainNewsCategoryEdit');
Route::put('/main-news/category/update/{id}', [MainNewsCategoryController::class, 'update'])->name('adminMainNewsCategoryUpdate');
Route::delete('/main-news/category/delete/{id}', [MainNewsCategoryController::class, 'delete'])->name('adminMainNewsCategoryDelete');
Route::get('/main-news/category/trash/{id}', [MainNewsCategoryController::class, 'trash'])->name('adminMainNewsCategoryDelete');
Route::get('/main-news/category/restore/{id}', [MainNewsCategoryController::class, 'restore'])->name('adminMainNewsCategoryRestore');

Route::get('/main-news/tags', [MainNewsTagController::class, 'tagsList'])->name('admin.main-news-tags');
Route::get('/main-news/tags/{id}', [MainNewsTagController::class, 'showTag'])->name('admin.main-news-tag-show');
Route::get('/main-news/tag/create', [MainNewsTagController::class, 'create'])->name('adminMainNewsTagCreate');
Route::post('/main-news/tag/store', [MainNewsTagController::class, 'store'])->name('adminMainNewsTagStore');
Route::get('/main-news/tag/edit/{id}', [MainNewsTagController::class, 'edit'])->name('adminMainNewsTagEdit');
Route::put('/main-news/tag/update/{id}', [MainNewsTagController::class, 'update'])->name('adminMainNewsTagUpdate');
Route::delete('/main-news/tag/delete/{id}', [MainNewsTagController::class, 'delete'])->name('adminMainNewsTagDelete');
Route::get('/main-news/tag/trash/{id}', [MainNewsTagController::class, 'trash'])->name('adminMainNewsTagDelete');
Route::get('/main-news/tag/restore/{id}', [MainNewsTagController::class, 'restore'])->name('adminMainNewsTagRestore');
