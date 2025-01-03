<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\MenuItemController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_companies', [CompanyController::class, 'getPosts']);
Route::get('/companies_1', [CompanyController::class, 'getFirstThousand']);
Route::get('/company_categories', [CompanyController::class, 'categoriesList']);
Route::get('/news', [CompanyController::class, 'getNews']);
Route::get('/payments', [CompanyController::class, 'getPayments']);
Route::get('/tags', [CompanyController::class, 'getTags']);
Route::get('/menu-items', [CompanyController::class, 'getItems']);
Route::post('/tags', [CompanyController::class, 'storeTags']);
Route::get('/companies_2', [CompanyController::class, 'getSecondThousand']);
Route::get('/companies_3', [CompanyController::class, 'getThirdThousand']);
Route::get('/companies_4', [CompanyController::class, 'getFourthThousand']);
Route::get('/companies_5', [CompanyController::class, 'getFifthThousand']);
Route::get('/upload-image', [CompanyController::class, 'uploadImage']);

// Отримати пости
Route::get('/api/posts', [NewsController::class, 'index']);
Route::post('/api/menu-items', [MenuItemController::class, 'store']);
Route::get('/api/menu-items', [MenuItemController::class, 'index']);
Route::get('/api/menu-items/{menuId}/items', [MenuItemController::class, 'getMenuItemsForMenu']);
