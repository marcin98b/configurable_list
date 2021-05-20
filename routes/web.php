<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return redirect('/login');
});

//Listy
//-----------------------------------------------------------------------------

Route::GET('/dashboard', [ListController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::POST('/lists/create', [ListController::class, 'create'])->name('listCreate');
Route::POST('/lists/{id}/duplicate', [ListController::class, 'duplicate'])->name('listDuplicate');
Route::POST('/lists/{id}', [ListController::class, 'edit'])->name('listEdit');
Route::GET('/lists/{id}/edit', [ListController::class, 'editView'])->name('listEditView');
Route::GET('/lists/{id}', [ListController::class, 'show'])->name('listShow');
Route::DELETE('/lists/{id}', [ListController::class, 'delete'])->name('listDelete');

//-----------------------------------------------------------------------------



//Sklepy
//-----------------------------------------------------------------------------

Route::GET('/shops', [ShopController::class, 'index'])->name('shopsIndex');
Route::POST('/shops/create', [ShopController::class, 'create'])->name('shopCreate');
Route::POST('/shops/{id}', [ShopController::class, 'edit'])->name('shopEdit');
Route::GET('/shops/{id}', [ShopController::class, 'show'])->name('shopShow');
Route::DELETE('/shops/{id}', [ShopController::class, 'delete'])->name('shopDelete');

//-----------------------------------------------------------------------------




//Kategorie
//-----------------------------------------------------------------------------

    //Definicja kategorii oraz kolejności dla sklepów
Route::GET('/shops/{id}/categories', [CategoryController::class, 'shop_categoryIndex'])->name('shop_categoryIndex');
Route::POST('/shops/{id}/categories/create', [CategoryController::class, 'shop_categoryCreate'])->name('shop_categoryCreate');
Route::DELETE('/shops/{id}/categories/{category_id}', [CategoryController::class, 'shop_categoryDelete'])->name('shop_categoryDelete');
Route::POST('/shops/{id}/categories/updatePosition/{arr}', [CategoryController::class, 'shop_categoryUpdatePosition'])->name('shop_categoryUpdatePosition');



    //Definicja kategorii  oraz kolejności dla list
Route::GET('/lists/{id}/categories', [CategoryController::class, 'list_categoryIndex'])->name('list_categoryIndex');
Route::POST('/lists/{id}/categories/create', [CategoryController::class, 'list_categoryCreate'])->name('list_categoryCreate');
Route::DELETE('/lists/{id}/categories/{category_id}', [CategoryController::class, 'list_categoryDelete'])->name('list_categoryDelete');
Route::POST('/lists/{id}/categories/updatePosition/{arr}', [CategoryController::class, 'list_categoryUpdatePosition'])->name('list_categoryUpdatePosition');



//Produkty
//-----------------------------------------------------------------------------

Route::POST('/lists/{id}/addproduct', [ProductController::class, 'create'])->name('productCreate');
Route::POST('/lists/{id}/products/update', [ProductController::class, 'update'])->name('productUpdate');
Route::DELETE('/lists/{id}/products/{product_id}', [ProductController::class, 'delete'])->name('productDelete');


// TO_DO
// LISTA
// - główna funkcja - dodawanie produktów wg. kategorii
// - mozliwosc udostepniania list (ustalanie praw)
//
//
// PRODUKT
// - niestandardowe produkty
// - dodawanie zdjecia (pozniej)
//
// SORTOWANIE
// - sortowanie produktow/list/sklepow

require __DIR__.'/auth.php';
