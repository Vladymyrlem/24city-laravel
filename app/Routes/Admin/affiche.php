<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AfficheController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\AfficheCategoryController;

Route::get('/affiche', [AfficheController::class, 'list'])->name('admin.affiche.list');
Route::get('/affiche/create', [AfficheController::class, 'create'])->name('admin.affiche.create');
Route::post('/affiche/store', [AfficheController::class, 'store'])->name('admin.affiche.store');
Route::get('/affiche/edit/{id}', [AfficheController::class, 'edit'])->name('admin.affiche.edit');
Route::put('/affiche/update/{id}', [AfficheController::class, 'update'])->name('admin.affiche.update');
Route::get('/affiche/forceDelete/{id}', [AfficheController::class, 'forceDelete'])->name('admin.affiche.forceDelete');
Route::get('/affiche/delete/{id}', [AfficheController::class, 'destroy'])->name('admin.affiche.delete');
Route::get('/affiche/restore/{id}', [AfficheController::class, 'restore'])->name('admin.affiche.restore');
Route::get('/affiche/trash', [AfficheController::class, 'trash'])->name('adminAfficheTrash');
Route::get('/affiche/{id}', [AfficheController::class, 'show'])->name('adminAfficheShow');

Route::get('/affiche/categories', [AfficheCategoryController::class, 'categoriesList'])->name('admin.affiche-categories');
Route::get('/affiche/categories/{id}', [AfficheCategoryController::class, 'show'])->name('admin.affiche-category-show');
Route::get('/affiche/category/create', [AfficheCategoryController::class, 'create'])->name('adminAfficheCategoryCreate');
Route::post('/affiche/category/store', [AfficheCategoryController::class, 'store'])->name('adminAfficheCategoryStore');
Route::get('/affiche/category/edit/{id}', [AfficheCategoryController::class, 'edit'])->name('adminAfficheCategoryEdit');
Route::put('/affiche/category/update/{id}', [AfficheCategoryController::class, 'update'])->name('adminAfficheCategoryUpdate');
Route::delete('/affiche/category/delete/{id}', [AfficheCategoryController::class, 'delete'])->name('adminAfficheCategoryDelete');
Route::get('/affiche/category/trash/{id}', [AfficheCategoryController::class, 'trash'])->name('adminAfficheCategoryDelete');
Route::get('/affiche/category/restore/{id}', [AfficheCategoryController::class, 'restore'])->name('adminAfficheCategoryRestore');

Route::get('/affiche/tags', [TagController::class, 'tagsList'])->name('admin.affiche-tags');
Route::get('/affiche/tags/{id}', [TagController::class, 'show'])->name('admin.affiche-tag-show');
Route::get('/affiche/tag/create', [TagController::class, 'create'])->name('adminAfficheTagCreate');
Route::post('/affiche/tag/store', [TagController::class, 'store'])->name('adminAfficheTagStore');
Route::get('/affiche/tag/edit/{id}', [TagController::class, 'edit'])->name('adminAfficheTagEdit');
Route::put('/affiche/tag/update/{id}', [TagController::class, 'update'])->name('adminAfficheTagUpdate');
Route::delete('/affiche/tag/delete/{id}', [TagController::class, 'delete'])->name('adminAfficheTagDelete');
Route::get('/affiche/tag/trash/{id}', [TagController::class, 'trash'])->name('adminAfficheTagDelete');
Route::get('/affiche/tag/restore/{id}', [TagController::class, 'restore'])->name('adminAfficheTagRestore');
