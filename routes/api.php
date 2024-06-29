<?php

use App\Http\Controllers\AbonnementApiController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\FinanceApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PassApiController;
use App\Http\Controllers\PlaceApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/auth/redirect/{provider}', [AuthApiController::class, 'auth_redirect'])->name('auth.social');
Route::get('/login/{provider}/callback', [AuthApiController::class, 'auth_callback']);

Route::group(['prefix' => 'auth',], function(){
    Route::post('/register', [AuthApiController::class, 'register']);
    Route::post('/login', [AuthApiController::class, 'login']);

});

Route::get('/countries', [PlaceApiController::class, 'getAllCountries']);
Route::get('/communes', [PlaceApiController::class, 'getAllCommunes']);
Route::get('/pass_types', [PassApiController::class, 'getAllPassTypes']);
Route::get('/abonnement_types', [AbonnementApiController::class, 'getAllTypeAbonnements']);
Route::get('/immo_enums', [PlaceApiController::class, 'getAllEnums']);
Route::get('/transactions/{type}/getnumber', [FinanceApiController::class, 'getTransactionNumber']);

Route::group(
    [
        'middleware' => 'auth:sanctum',
        'prefix' => 'catalogue',
    ],
    function(){
        Route::group(['prefix' => 'places',], function(){
            Route::get('/', [PlaceApiController::class, 'getMyPlaces']);
            Route::post('create', [PlaceApiController::class, 'addPlace']);
            Route::get('edit/{house_id}', [PlaceApiController::class, 'edit']);
            Route::get('show/{house_id}', [PlaceApiController::class, 'show']);
            Route::get('delete/{house_id}', [PlaceApiController::class, 'delete']);

        });
        Route::group(['prefix' => 'finances',], function(){
            Route::get('/', [FinanceApiController::class, 'index']);
            Route::get('manage', [FinanceApiController::class, 'manage']);
            Route::get('retrait', [FinanceApiController::class, 'retrait']);
            

        });
        Route::group(['prefix' => 'abonnement',], function(){
            Route::get('/', [AbonnementApiController::class, 'index']);
            Route::get('create', [AbonnementApiController::class, 'create']);
            Route::get('edit', [AbonnementApiController::class, 'edit']);
            Route::get('resume/{ab_type}', [AbonnementApiController::class, 'resume']);
            Route::post('payement', [AbonnementApiController::class, 'buyAbonnement']);
            Route::get('promos/{ab_type}', [AbonnementApiController::class, 'getAbonnementPromos']);
            

        });
    });

Route::group(
    [
        'prefix' => 'visite',
    ],
    function(){
        Route::group(['prefix' => 'places',], function(){
            Route::get('/', [PlaceApiController::class, 'index']);
            Route::get('show/{house_id}', [PlaceApiController::class, 'edit']);

        });
        Route::group(['prefix' => 'pass',], function(){
            Route::post('/', [PassApiController::class, 'verifPassVisite']);
            Route::post('buy_pass', [PassApiController::class, 'buyPass']);
            Route::post('prolonge_pass', [PassApiController::class, 'prolongePass']);
            Route::post('pass_places', [PassApiController::class, 'getPassVisitePlaces']);
            Route::post('visiting', [PassApiController::class, 'passTrigger']);
            Route::get('promos/{pass_type}', [PassApiController::class, 'getPassPromos']);
            

        });
        // search group
        Route::group(['prefix' => 'search',], function(){
            Route::get('/', [HomeController::class, 'search_index']);
            Route::post('/', [HomeController::class, 'search']);
        });
    });
    
Route::group(
    [
        'prefix' => 'showroom',
    ],
    function(){
        
        Route::get('/', [PlaceApiController::class, 'getAllplaces']);
        Route::get('category/{category}', [PlaceApiController::class, 'getCategoryPlaces']);
        
    });