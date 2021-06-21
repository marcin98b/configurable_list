<?php

namespace App\Http\Controllers\API;
use App\Models\{
                List_, Category, List_category_order,
                Product, Shop, User
            };
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Obsługa logowania/rejestrowania
Route::POST('/register', [AuthController::class, 'register']);
Route::POST('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
  
    //Obsługa list   
    Route::GET('/lists', [ListController::class, 'index']);
    Route::POST('/lists/create', [ListController::class, 'create']);
    Route::POST('/lists/{id}/duplicate', [ListController::class, 'duplicate']);
    Route::GET('/lists/{id}', [ListController::class, 'show']);
    Route::PUT('/lists/{id}', [ListController::class, 'update']);
    Route::DELETE('/lists/{id}', [ListController::class, 'delete']);
    Route::GET('/lists/shared/{share_key}', [ListController::class, 'showShared']); 
    Route::POST('/lists/shared/{share_key}', [ListController::class, 'createShared']);

    //Sklepy
    Route::GET('/shops', [ShopController::class, 'index']);
    Route::POST('/shops/create', [ShopController::class, 'create']);
    Route::GET('/shops/{id}/lists', [ShopController::class, 'showAssignedLists']);
    Route::GET('/shops/{id}', [ShopController::class, 'show']);
    Route::PUT('/shops/{id}', [ShopController::class, 'update']);
    Route::DELETE('/shops/{id}', [ShopController::class, 'delete']);


    //Wylogowanie
    Route::POST('/logout', [AuthController::class, 'logout']);

    //Kategorie - dla sklepów
    Route::GET('/shops/{shop_id}/categories', [CategoryController::class, 'shop_categoryIndex']);
    Route::POST('/shops/{shop_id}/categories/create', [CategoryController::class, 'shop_categoryCreate']);
    Route::PUT('/shops/{shop_id}/categories/{category_id}', [CategoryController::class, 'shop_categoryUpdate']);
    Route::DELETE('/shops/{shop_id}/categories/{category_id}', [CategoryController::class, 'shop_categoryDelete']);
    Route::POST('/shops/{id}/categories/updatePosition/{arr}', [CategoryController::class, 'shop_categoryUpdatePosition']);

    //Produkty
    //-----------------------------------------------------------------------------

    Route::GET('/lists/{id}/products', [ProductController::class, 'show']);   
    Route::POST('/lists/{id}/addproduct', [ProductController::class, 'create']);
    Route::PUT('/lists/{id}/products/{product_id}', [ProductController::class, 'update']);
    Route::DELETE('/lists/{id}/products/{product_id}', [ProductController::class, 'delete']);

    //Produkty niestandardowe
    Route::GET('/customProducts' , [CustomProductController::class, 'index']);
    Route::POST('/customProducts/create' , [CustomProductController::class, 'create']);
    Route::GET('/customProducts/{id}' , [CustomProductController::class, 'show']);
    Route::DELETE('/customProducts/{id}' , [CustomProductController::class, 'delete']);
    Route::PUT('/customProducts/{id}' , [CustomProductController::class, 'update']);
    Route::POST('/customProducts/{id}/upload' , [CustomProductController::class, 'store']);
    Route::GET('/customProducts/shared/{share_key}', [CustomProductController::class, 'showShared']);
    Route::POST('/customProducts/shared/{share_key}', [CustomProductController::class, 'createShared']); 




});
