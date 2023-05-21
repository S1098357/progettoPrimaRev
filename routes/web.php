<?php

use App\Http\Controllers\aziendaController;
use App\Http\Controllers\filterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\promozioniController;
use App\Http\Controllers\publicController;
use App\Models\Coupon;
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

Route::get('/', [publicController::class, 'home'])->name('home');


Route::get('/home', [publicController::class, 'home'])->name('home');

Route::get('/test', [publicController::class, 'test'])->name('test');

Route::get('/catalogo', [publicController::class, 'catalogo'])->name('catalogo');

Route::get('/info', [publicController::class, 'info'])->name('info');
Route::get('/faq', [publicController::class, 'faq'])->name('faq');

Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'loginPost'])->name('loginPost');

Route::get('/signup', [loginController::class, 'signup'])->name('signup');
Route::post('/signup', [loginController::class, 'signupPost'])->name('signupPost');

Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::post('/filtri', [filterController::class, 'filtriPost'])->name('filtri');

Route::get('/filtri', [filterController::class, 'filtri'])->name('filtriPost');

Route::get('/profile', [publicController::class, 'profile'])->name('Profile');

Route::get('/modificaProfilo', [profileController::class, 'modificaProfilo'])->name('modificaProfilo');

Route::get('/Logout', [publicController::class, 'logout'])->name('Logout');

Route::post('/modificaProfilo', [profileController::class, 'modificaProfiloPost'])->name('modificaProfiloPost');

Route::get('/promozioni', [publicController::class, 'Promozioni'])->name('Promozioni');

Route::get('/visualizzaPromozione', [publicController::class, 'visualizzaPromozione'])->name('visualizzaPromozione');

Route::post('/visualizzaPromozionePost', [promozioniController::class, 'visualizzaPromozionePost'])->name('visualizzaPromozionePost');

Route::post('/creaPromozione', [promozioniController::class, 'creaPromozione'])->name('creaPromozione');

Route::post('/creaPromozionePost', [promozioniController::class, 'creaPromozionePost'])->name('creaPromozionePost');

Route::get('/modificaPromozione', [promozioniController::class, 'modificaPromozione'])->name('modificaPromozione');

Route::post('/modificaPromozionePost', [promozioniController::class, 'modificaPromozionePost'])->name('modificaPromozionePost');

Route::post('/eliminaPromozione', [promozioniController::class, 'eliminaPromozione'])->name('eliminaPromozione');

Route::post('/modificaPromozioneFinale', [promozioniController::class, 'modificaPromozioneFinale'])->name('modificaPromozioneFinale');

Route::get('/listaAziende', [aziendaController::class, 'listaAziende'])->name('listaAziende');

