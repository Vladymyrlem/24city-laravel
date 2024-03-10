<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\AdsCategoryController;

Route::get('/ads', [AdsController::class, 'index'])->name('admin.ads.list');
Route::get('/ads/create', [AdsController::class, 'create'])->name('admin.ads.create');
Route::post('/ads/store', [AdsController::class, 'store'])->name('admin.ads.store');
Route::get('/ads/edit/{id}', [AdsController::class, 'edit'])->name('admin.ads.edit');
Route::put('/ads/update/{id}', [AdsController::class, 'update'])->name('admin.ads.update');
Route::get('/ads/forceDelete/{id}', [AdsController::class, 'forceDelete'])->name('admin.ads.forceDelete');
Route::get('/ads/delete/{id}', [AdsController::class, 'destroy'])->name('admin.ads.delete');
Route::get('/ads/restore/{id}', [AdsController::class, 'restore'])->name('admin.ads.restore');
Route::get('/ads/trash', [AdsController::class, 'trash'])->name('adminAdsTrash');
Route::get('/ads/{adsId}', [AdsController::class, 'show'])->name('admin.ads.show');

Route::get('ads/categories', [AdsCategoryController::class, 'categoriesList'])->name('admin.ads-categories');
Route::get('ads/categories/{id}', [AdsCategoryController::class, 'show'])->name('admin.ads-category-show');
Route::get('ads/category/create', [AdsCategoryController::class, 'create'])->name('adminAdsCategoryCreate');
Route::post('ads/category/store', [AdsCategoryController::class, 'store'])->name('adminAdsCategoryStore');
Route::get('ads/category/edit/{id}', [AdsCategoryController::class, 'edit'])->name('adminAdsCategoryEdit');
Route::put('ads/category/update/{id}', [AdsCategoryController::class, 'update'])->name('adminAdsCategoryUpdate');
Route::delete('ads/category/delete/{id}', [AdsCategoryController::class, 'delete'])->name('adminAdsCategoryDelete');
Route::get('ads/category/trash/{id}', [AdsCategoryController::class, 'trash'])->name('adminAdsCategoryDelete');
Route::get('ads/category/restore/{id}', [AdsCategoryController::class, 'restore'])->name('adminAdsCategoryRestore');
Route::get('/ads/tags', [AdsController::class, 'tagsList'])->name('admin.ads-tags');
Route::get('/ads/tags/{id}', [AdsController::class, 'showTag'])->name('admin.ads-tag-show');
