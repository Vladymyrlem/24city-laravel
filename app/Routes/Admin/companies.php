<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CompaniesController;
use App\Http\Controllers\Admin\CompanyCategoryController;

Route::get('/companies', [CompaniesController::class, 'index'])->name('companies');

/*Company Category Routes*/
Route::get('company/categories', [CompanyCategoryController::class, 'categoriesList'])->name('admin.company-categories');
Route::get('company/categories/{id}', [CompanyCategoryController::class, 'show'])->name('admin.company-category-show');
Route::get('company/category/create', [CompanyCategoryController::class, 'create'])->name('adminCompanyCategoryCreate');
Route::post('company/category/store', [CompanyCategoryController::class, 'store'])->name('adminCompanyCategoryStore');
Route::get('company/category/edit/{id}', [CompanyCategoryController::class, 'edit'])->name('adminCompanyCategoryEdit');
Route::put('company/category/update/{id}', [CompanyCategoryController::class, 'update'])->name('adminCompanyCategoryUpdate');
Route::delete('company/category/delete/{id}', [CompanyCategoryController::class, 'delete'])->name('adminCompanyCategoryDelete');
Route::get('company/category/trash/{id}', [CompanyCategoryController::class, 'trash'])->name('adminCompanyCategoryDelete');
Route::get('company/category/restore/{id}', [CompanyCategoryController::class, 'restore'])->name('adminCompanyCategoryRestore');
Route::post('/company_categories/update', [CompanyCategoryController::class, 'updateCategories']);
Route::get('/company/create', [CompaniesController::class, 'create'])->name('admin.company.create');
Route::post('/company/store', [CompaniesController::class, 'store'])->name('admin.company.store');
Route::get('/company/edit/{id}', [CompaniesController::class, 'edit'])->name('admin.company.edit');
Route::put('/company/update/{id}', [CompaniesController::class, 'update'])->name('admin.company.update');
Route::get('/company/forceDelete/{id}', [CompaniesController::class, 'forceDelete'])->name('admin.company.forceDelete');
Route::get('/company/delete/{id}', [CompaniesController::class, 'destroy'])->name('admin.company.delete');
Route::get('/company/restore/{id}', [CompaniesController::class, 'restore'])->name('admin.company.restore');
Route::get('/company/trash', [CompaniesController::class, 'trash'])->name('adminCompaniesTrash');
