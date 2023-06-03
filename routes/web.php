<?php

use App\Http\Controllers\aziendaController;
use App\Http\Controllers\aziendaControllerDiego;
use App\Http\Controllers\couponController;
use App\Http\Controllers\faqController;
use App\Http\Controllers\filterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\promozioniController;
use App\Http\Controllers\promozioniNuovoController;
use App\Http\Controllers\publicController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\statisticheController;
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


Route::get('/filtri', [filterController::class, 'filtri'])->name('filtriPost');
Route::get('/filter', [filterController::class, 'filter'])->name('filtri');
Route::get('/filter2', [filterController::class, 'filter2'])->name('filtri2');
Route::get('/filter3', [filterController::class, 'filter3'])->name('filtri3');


Route::get('/profile', [publicController::class, 'profile'])->name('Profile');

Route::get('/modificaProfilo', [profileController::class, 'modificaProfilo'])->name('modificaProfilo');

Route::get('/Logout', [publicController::class, 'logout'])->name('Logout');

Route::post('/modificaProfilo', [profileController::class, 'modificaProfiloPost'])->name('modificaProfiloPost');

Route::get('/promozioni', [publicController::class, 'Promozioni'])->name('Promozioni');

Route::get('/visualizzaPromozione', [publicController::class, 'visualizzaPromozione'])->name('visualizzaPromozione');

Route::post('/visualizzaPromozionePost', [promozioniController::class, 'visualizzaPromozionePost'])->name('visualizzaPromozionePost');

Route::post('/creaPromozionePost', [promozioniController::class, 'creaPromozionePost'])->name('creaPromozionePost');

Route::post('/modificaPromozionePost', [promozioniController::class, 'modificaPromozionePost'])->name('modificaPromozionePost');

Route::post('/eliminaPromozione', [promozioniController::class, 'eliminaPromozione'])->name('eliminaPromozione');

Route::post('/modificaPromozioneFinale', [promozioniController::class, 'modificaPromozioneFinale'])->name('modificaPromozioneFinale');

Route::get('/listaAziende', [aziendaController::class, 'listaAziende'])->name('listaAziende');

Route::get('/listaAziendePost', [aziendaController::class, 'listaAziendePost'])->name('listaAziendePost');

Route::post('/modificaAziendaPost', [aziendaController::class, 'modificaAziendaPost'])->name('modificaAziendaPost');

Route::get('/modificaAzienda', [aziendaController::class, 'modificaAzienda'])->name('modificaAzienda');

Route::post('/modificaAziendaFinale', [aziendaController::class, 'modificaAziendaFinale'])->name('modificaAziendaFinale');

Route::post('/creaAzienda', [aziendaController::class, 'creaAzienda'])->name('creaAzienda');

Route::post('/creaAziendaPost', [aziendaController::class, 'creaAziendaPost'])->name('creaAziendaPost');

Route::get('/visualizzaAzienda', [aziendaController::class, 'visualizzaAzienda'])->name('visualizzaAzienda');

Route::post('/visualizzaAziendaPost', [aziendaController::class, 'visualizzaAziendaPost'])->name('visualizzaAziendaPost');

Route::post('/eliminaAzienda', [aziendaController::class, 'eliminaAzienda'])->name('eliminaAzienda');

Route::get('/couponSingolo', [publicController::class, 'couponSingolo'])->name('couponSingolo');
Route::get('/listaStaff', [publicController::class, 'listaStaff'])->name('listaStaff');

Route::get('/listaPromozioni', [promozioniNuovoController::class, 'listaPromozioni'])->name('listaPromozioni');
Route::get('/visualPromozione', [promozioniNuovoController::class, 'visualPromozione'])->name('visualPromozione');
Route::post('/eliminaPromozione', [promozioniNuovoController::class, 'eliminaPromozione'])->name('eliminaPromozione');
Route::post('/editPromozione', [promozioniNuovoController::class, 'editPromozione'])->name('editPromozione');
Route::post('/creaPromozione', [promozioniNuovoController::class, 'creaPromozione'])->name('creaPromozione');
Route::get('/promozioneCreator', [promozioniNuovoController::class, 'promozioneCreator'])->name('promozioneCreator');
Route::get('/modificaPromozione', [promozioniNuovoController::class, 'modificaPromozione'])->name('modificaPromozione');


Route::get('/listaStaff', [staffController::class, 'listaStaff'])->name('listaStaff');
Route::get('/eliminaStaff', [staffController::class, 'eliminaStaff'])->name('eliminaStaff');
Route::post('/editStaff', [staffController::class, 'editStaff'])->name('editStaff');
Route::post('/creaStaff', [staffController::class, 'creaStaff'])->name('creaStaff');
Route::get('/staffCreator', [staffController::class, 'staffCreator'])->name('staffCreator');
Route::get('/modificaStaff', [staffController::class, 'modificaStaff'])->name('modificaStaff');

Route::get('/salvaCoupon', [couponController::class, 'salvaCoupon'])->name('salvaCoupon');

Route::get('/statistiche', [statisticheController::class, 'statistiche'])->name('statistiche');

Route::get('/couponSingolo2', [publicController::class, 'couponSingolo2'])->name('couponSingolo2');












