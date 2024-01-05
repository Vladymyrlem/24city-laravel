<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AdsCategoryController;
use App\Http\Controllers\PeoplesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MainNewsController;
use App\Http\Controllers\MainNewsCategoryController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\AfficheController;
use App\Http\Controllers\AfficheCategoryController;
use App\Http\Controllers\RealEstateController;
use App\Http\Controllers\RealEstateCategoryController;
use App\Http\Controllers\ProxyController;
use UniSharp\LaravelFilemanager\Lfm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/spravochnik', [CompanyCategoryController::class, 'index'])->name('company.company-category');
Route::get('/companies', [CompaniesController::class, 'list'])->name('companies.list');
Route::get('/proxy', [ProxyController::class, 'proxy']);

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::prefix('/laravel-filemanager')->group(function () {
        Lfm::routes();
    });
    /*Company routes*/
    require_once app_path('Routes/Admin/companies.php');
    /*Ads Routes*/
    require_once app_path('Routes/Admin/ads.php');
    /*News Routes*/
    require_once app_path('Routes/Admin/news.php');
    /*Main News Routes*/
    require_once app_path('Routes/Admin/main-news.php');
    /*Real Estate Routes*/
    require_once app_path('Routes/Admin/real-estate.php');
    /*Peoples Routes*/
    require_once app_path('Routes/Admin/peoples.php');
    /*Outlines Routes*/
    require_once app_path('Routes/Admin/outlines.php');
    /*Press Routes*/
    require_once app_path('Routes/Admin/press.php');
    /*Affiche Routes*/
    require_once app_path('Routes/Admin/affiche.php');
    /*Shares Routes*/
    require_once app_path('Routes/Admin/shares.php');
});
// Route for viewing a specific category by ID
Route::prefix('company')->group(function () {
    Route::get('/{id}', [CompaniesController::class, 'show'])->name('company.show')->whereNumber('id');
    Route::get('/categories/{id}', [CompanyCategoryController::class, 'show'])->name('company.company-category-show');
    Route::get('/parent-category/{category}', [CompanyCategoryController::class, 'showParentCategory'])->name('company.parent-category.show');
    Route::get('/subcategory/{subcategory}', [CompanyCategoryController::class, 'showSubcategory'])->name('company.subcategory.show');
    Route::get('/subchild-category/{subchildCategory}', [CompanyCategoryController::class, 'showSubchildCategory'])->name('company.subchild-category.show');
});

Route::prefix('ads')->group(function () {
    Route::get('/', [AdsController::class, 'list'])->name('ads');
    Route::get('/{id}', [AdsController::class, 'show'])->name('ads.show')->whereNumber('id');
    Route::get('/categories', [AdsCategoryController::class, 'index'])->name('ads.ads-category');
    Route::get('/categories/{id}', [AdsCategoryController::class, 'show'])->name('ads.ads-category-show');
});

Route::prefix('affiche')->group(function () {
    Route::get('/', [AfficheController::class, 'index'])->name('affiche');
    Route::get('/{id}', [AfficheController::class, 'show'])->name('affiche.show')->whereNumber('id');
    Route::get('/categories', [AfficheCategoryController::class, 'index'])->name('affiche.affiche-category');
    Route::get('/categories/{id}', [AfficheCategoryController::class, 'show'])->name('affiche.affiche-category-show');
});

Route::prefix('peoples')->group(function () {
    Route::get('/', [PeoplesController::class, 'index'])->name('peoples');
});

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{id}', [NewsController::class, 'show'])->name('news.show')->whereNumber('id');
    Route::get('/categories', [NewsCategoryController::class, 'index'])->name('news.category');
    Route::get('/categories/{id}', [NewsCategoryController::class, 'show'])->name('news.category.show');
});

Route::prefix('main-news')->group(function () {
    Route::get('/', [MainNewsController::class, 'index'])->name('main-news');
    Route::get('/{id}', [MainNewsController::class, 'show'])->name('main-news.show')->whereNumber('id');
    Route::get('/tags/{id}', [MainNewsController::class, 'showTag'])->name('main-news.show.tag');
    Route::get('/categories', [MainNewsCategoryController::class, 'index'])->name('main-news.category');
    Route::get('/categories/{id}', [MainNewsCategoryController::class, 'show'])->name('main-news.category.show');
});

Route::prefix('real-estate')->group(function () {
    Route::get('', [RealEstateController::class, 'index'])->name('real-estate');
    Route::get('/{id}', [RealEstateController::class, 'show'])->name('real-estate.show')->whereNumber('id');
    Route::get('/categories', [RealEstateCategoryController::class, 'index'])->name('real-estate.category');
    Route::get('/categories/{id}', [RealEstateCategoryController::class, 'show'])->name('real-estate.category.show');
});

Route::post('/upload/images', [AdminController::class, 'uploadImage'])->name('upload.post.image');
Route::post('/save-selected-posts', [HomeController::class, 'saveSelectedPosts'])->name('save-selected-posts');

Route::get('/error', function () {
    abort(500);
});
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);
Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

