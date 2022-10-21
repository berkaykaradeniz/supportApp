<?php

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
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard/index');
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});



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