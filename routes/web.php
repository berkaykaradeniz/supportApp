<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;


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

Route::group(['middleware' => ['auth:sanctum']], function () {
    //Token ile giriş yapılacak yer
});

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});


//PAGE
Route::get('/login', [PagesController::class, 'login'])->name('login');
Route::get('/register', [PagesController::class, 'register'])->name('register');

Route::get('/panel', [PagesController::class, 'panelIndex'])->name('panel.index');
Route::get('/panel/tickets', [PagesController::class, 'tickets'])->name('panel.tickets');
Route::get('/panel/tickets/create', [PagesController::class, 'ticketCreate'])->name('panel.tickets.create');

Route::get('/panel/ticket/{id}', [PagesController::class, 'ticketDetail'])->name('panel.ticket.detail');

/*

TODO
YETKI TABLOSU YAP (GROUPS,USER_GROUPS) GURUPLAR VE KULLANICI GRUPLARI -- PERSONEL , MUSTERI , YETKILI 
YETKI ILE KULLANICIYI BAGLA
MENU OLUSTUR 
-ANASAYFA (TOPLAM TALEP SAYISI ACIK TALEP SAYISI KAPALI TALEP SAYISI, ATAMA BEKLEYENLER)
-TALEPLER (TALEP EKLE(HERKES TALEP ACABILIR) , TALEP GÖRÜNTÜLE (HERKES ATANAN TALEPLERINI GORUR), TALEP ATAMA (YETKILI))
-- TALEP DETAY (DURUM DEĞİŞTİR) - HERKES DEGISEBILIR -- KAPALI TALEBI MUSTERI ACIK YAPAMAZ 
-DEPARTMANLAR (EKLE, SİL) - YETKILI
-KULLANICILAR (SİL) - YETKILI

VERITABANI
TICKETS
--TITLE
--DESC
--DEPARTMENTS - YAZILIM , AG , DESTEK , ETC
--STATUS 0 BEKLEME 1 AÇIK 2 KAPALI
--USER_ID BAGLI KULLANICI

USERS

DEPARTMENTS
--NAME
--IS_ACTIVE

GROUPS
--NAME

USER_GROUPS
--USER_ID
--GROUP_ID
*/