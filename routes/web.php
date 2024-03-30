<?php


use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\DetailBlController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ReglementController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/catalogues', CatalogueController::class);

Route::resource('/shops', ShopController::class);
// Route::get('shops/{catalog}', [ShopController::class, 'catalog'])->name('shops.catalog');


Route::resource('/menus', MenuController::class);

Route::resource('/utilisateurs', UtilisateurController::class);

Route::resource('/paniers', PanierController::class);

Route::resource('/details', DetailBlController::class);

Route::resource('/modes', ModeController::class);

Route::resource('/reglements', ReglementController::class);






