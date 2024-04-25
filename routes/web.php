<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\FascadeImmoController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\PlaceController;
use Doctrine\DBAL\Schema\Index;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::group(
    [
        'middleware' => 'auth',
        'prefix' => 'catalogue',
    ],
    function(){
        Route::get('dashboard', [FascadeImmoController::class, 'dashboard'])->name('catalogue.dashboard');
        Route::group(['prefix' => 'places',], function(){
            Route::get('/', [PlaceController::class, 'index'])->name('catalogue.places.index');
            Route::get('create', [PlaceController::class, 'create'])->name('catalogue.places.create');
            Route::get('edit', [PlaceController::class, 'edit'])->name('catalogue.places.edit');

        });
        Route::group(['prefix' => 'finances',], function(){
            Route::get('/', [FinanceController::class, 'index'])->name('catalogue.finances.index');
            Route::get('manage', [FinanceController::class, 'manage'])->name('catalogue.finances.manage');
            Route::get('retrait', [FinanceController::class, 'retrait'])->name('catalogue.finances.retrait');
            

        });
        Route::group(['prefix' => 'abonnement',], function(){
            Route::get('/', [AbonnementController::class, 'index'])->name('catalogue.abonnement.index');
            Route::get('create', [AbonnementController::class, 'create'])->name('catalogue.abonnement.create');
            Route::get('edit', [AbonnementController::class, 'edit'])->name('catalogue.abonnement.edit');
            Route::get('resume/{ab_type}', [AbonnementController::class, 'resume'])->name('catalogue.abonnement.resume');
            Route::post('payement/{ab_type}', [AbonnementController::class, 'buyAbonnement'])->name('catalogue.abonnement.payement');
            

        });
    });

Route::group(
    [
        'prefix' => 'visite',
    ],
    function(){
        Route::get('dashboard', [FascadeImmoController::class, 'dashboard'])->name('catalogue.dashboard');
        Route::group(['prefix' => 'places',], function(){
            Route::get('/', [PlaceController::class, 'index'])->name('catalogue.places.index');
            Route::get('create', [PlaceController::class, 'create'])->name('catalogue.places.create');
            Route::get('edit', [PlaceController::class, 'edit'])->name('catalogue.places.edit');

        });
        Route::group(['prefix' => 'pass',], function(){
            Route::get('/', [PassController::class, 'index'])->name('home.pass.index');
            Route::get('payer/{pass_type}', [PassController::class, 'payer'])->name('home.pass.payer');
            Route::get('payement/{pass_type}', [PassController::class, 'payement'])->name('home.pass.payement');

            Route::get('edit', [AbonnementController::class, 'edit'])->name('catalogue.abonnement.edit');
            Route::get('resume/{ab_type}', [AbonnementController::class, 'resume'])->name('catalogue.abonnement.resume');
            Route::post('payement/{ab_type}', [AbonnementController::class, 'buyAbonnement'])->name('catalogue.abonnement.payement');
            

        });
    });