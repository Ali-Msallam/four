<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\StepController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserRoleController;
use App\Http\Controllers\Api\FavRecipeController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\IngredientsController;
use App\Http\Controllers\Api\AdvertisementController;
use App\Http\Controllers\Api\RolePermissionController;
use App\Http\Controllers\Api\RecipeIngredientsController;


//k
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
Route::middleware('auth:api')->group( function () {
    Route::get('logout', [AuthController::class,'logout']);
});
        Route::post('signup', [AuthController::class,'signup']);
        Route::post('login', [AuthController::class,'login']);


Route::name('api.')->group(function () {
    Route::apiResource('categories', CategoryController::class);

    Route::apiResource('advertisements', AdvertisementController::class);

    Route::apiResource('comments', CommentController::class);

    Route::apiResource('fav-recipes', FavRecipeController::class);

    Route::apiResource('all-ingredients', IngredientsController::class);

    Route::apiResource('likes', LikeController::class);

    Route::apiResource('permissions', PermissionController::class);

    Route::apiResource('photos', PhotoController::class);

    Route::apiResource('rates', RateController::class);

    Route::apiResource('recipes', RecipeController::class);

    Route::apiResource(
        'all-recipe-ingredients',
        RecipeIngredientsController::class
    );

    Route::apiResource('reports', ReportController::class);

    Route::apiResource('roles', RoleController::class);

    Route::apiResource('role-permissions', RolePermissionController::class);

    Route::apiResource('steps', StepController::class);

    Route::apiResource('user-roles', UserRoleController::class);
});
