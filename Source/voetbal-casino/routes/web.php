<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PouleController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\SpelerController;
use App\Http\Controllers\StandenController;


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

Auth::routes();

Route::resource('standen', StandenController::class);
Route::resource('speler', SpelerController::class);
Route::get('/teams', [StandenController::class, 'show'])->name('teams.index');

Route::middleware(["auth", "App\Http\Middleware\checkRole:admin"])->group(function(){
    Route::resource('user', UserController::class);
});

Route::middleware(["auth", "App\Http\Middleware\checkRole:admin,user"])->group(function(){
    Route::resource('user', UserController::class, ['except' => ['index']]);
    Route::resource('poule', PouleController::class);
    Route::get('/poule/{poule}', [PouleController::class, 'show'])->name('poule.show');
    Route::post('/poule/{poule}/joinorleave', [PouleController::class, 'joinOrLeave'])->name('poule.joinorleave');
    Route::get('/poule/{poule}/voorspel', [PredictionController::class, 'upcomingGames'])->name('poule.voorspel');
    Route::get('/poule/{poule}/voorspelform', [PredictionController::class, 'voorspelform'])->name('poule.voorspelform');
    Route::post('/submit-prediction/{pouleId}', [PredictionController::class, 'submit'])->name('prediction.submit');
    Route::get('/poule/{poule}/result', [PredictionController::class, 'result'])->name('poule.result');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
