<?php

    use App\Http\Controllers\Auth\SocialiteController;
    use App\Http\Controllers\DashboardController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
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

    Route::get('/admin', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/companies', [CompaniesController::class, 'index'])->name('companies');
    Route::get('/company/{id}', [CompaniesController::class, 'show'])->name('company.show')->whereNumber('id');
    Route::get('/company/categories', [CompanyCategoryController::class, 'index'])->name('company.company-category');
//    Route::get('/company/categories/{category}', [CompanyCategoryController::class, 'showCompanies'])->name('category.showCompanies');

// Route for viewing a specific category by ID
    Route::get('/company/categories/{id}', [CompanyCategoryController::class, 'show'])->name('company.company-category-show');

    Route::get('/ads', [AdsController::class, 'index'])->name('ads');
    Route::get('/ads/{id}', [AdsController::class, 'show'])->name('ads.show')->whereNumber('id');
    Route::get('/ads/categories', [AdsCategoryController::class, 'index'])->name('ads.ads-category');
    Route::get('/ads/categories/{id}', [AdsCategoryController::class, 'show'])->name('ads.ads-category-show');

    Route::get('/peoples', [PeoplesController::class, 'index'])->name('peoples');
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/{id}', [AdsController::class, 'show'])->name('news.show')->whereNumber('id');

    Route::get('/main-news', [MainNewsController::class, 'index'])->name('main-news');
    Route::get('/main-news/{id}', [MainNewsController::class, 'show'])->name('main-news.show')->whereNumber('id');
    Route::get('/main-news/tags/{id}', [MainNewsController::class, 'showTag'])->name('main-news.show.tag');
    Route::get('/main-news/categories', [MainNewsCategoryController::class, 'index'])->name('main-news.category');
    Route::get('/main-news/categories/{id}', [MainNewsCategoryController::class, 'show'])->name('main-news.category.show');

    Route::get('/error', function () {
        abort(500);
    });
    Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle']);
    Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);
    Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

    require __DIR__ . '/auth.php';
