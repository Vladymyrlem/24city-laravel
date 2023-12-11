<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainNewsController;
use App\Http\Controllers\MainNewsCategoryController;
use App\Http\Controllers\MainNewsTagController;

Route::get('/ads', [NewsController::class, 'index'])->name('admin.main-news.list');
Route::get('/main-news/create', [NewsController::class, 'create'])->name('admin.main-news.create');
Route::post('/main-news/store', [NewsController::class, 'store'])->name('admin.main-news.store');
Route::get('/main-news/edit/{id}', [NewsController::class, 'edit'])->name('admin.main-news.edit');
Route::put('/main-news/update/{id}', [NewsController::class, 'update'])->name('admin.main-news.update');
Route::get('/main-news/forceDelete/{id}', [NewsController::class, 'forceDelete'])->name('admin.main-news.forceDelete');
Route::get('/main-news/delete/{id}', [NewsController::class, 'destroy'])->name('admin.main-news.delete');
Route::get('/main-news/restore/{id}', [NewsController::class, 'restore'])->name('admin.main-news.restore');
Route::get('/main-news/trash', [NewsController::class, 'trash'])->name('adminMainNewsTrash');

Route::get('/main-news/categories', [NewsCategoryController::class, 'categoriesList'])->name('admin.main-news-categories');
Route::get('/main-news/categories/{id}', [NewsCategoryController::class, 'show'])->name('admin.main-news-category-show');
Route::get('/main-news/category/create', [NewsCategoryController::class, 'create'])->name('adminMainNewsCategoryCreate');
Route::post('/main-news/category/store', [NewsCategoryController::class, 'store'])->name('adminMainNewsCategoryStore');
Route::get('/main-news/category/edit/{id}', [NewsCategoryController::class, 'edit'])->name('adminMainNewsCategoryEdit');
Route::put('/main-news/category/update/{id}', [NewsCategoryController::class, 'update'])->name('adminMainNewsCategoryUpdate');
Route::delete('/main-news/category/delete/{id}', [NewsCategoryController::class, 'delete'])->name('adminMainNewsCategoryDelete');
Route::get('/main-news/category/trash/{id}', [NewsCategoryController::class, 'trash'])->name('adminMainNewsCategoryDelete');
Route::get('/main-news/category/restore/{id}', [NewsCategoryController::class, 'restore'])->name('adminMainNewsCategoryRestore');

Route::get('/main-news/tags', [MainNewsTagController::class, 'tagsList'])->name('admin.main-news-tags');
Route::get('/main-news/tags/{id}', [MainNewsTagController::class, 'show'])->name('admin.main-news-tag-show');
Route::get('/main-news/tag/create', [MainNewsTagController::class, 'create'])->name('adminMainNewsTagCreate');
Route::post('/main-news/tag/store', [MainNewsTagController::class, 'store'])->name('adminMainNewsTagStore');
Route::get('/main-news/tag/edit/{id}', [MainNewsTagController::class, 'edit'])->name('adminMainNewsTagEdit');
Route::put('/main-news/tag/update/{id}', [MainNewsTagController::class, 'update'])->name('adminMainNewsTagUpdate');
Route::delete('/main-news/tag/delete/{id}', [MainNewsTagController::class, 'delete'])->name('adminMainNewsTagDelete');
Route::get('/main-news/tag/trash/{id}', [MainNewsTagController::class, 'trash'])->name('adminMainNewsTagDelete');
Route::get('/main-news/tag/restore/{id}', [MainNewsTagController::class, 'restore'])->name('adminMainNewsTagRestore');
