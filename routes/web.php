<?php

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
Auth::routes();
Route::get('set_locale/{locale}', 'LanguageController@switchLang')->name('set_locale');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('urls', 'UrlsController');
    Route::resource('contents', 'ContentsController');
    Route::post('/urlpessquisa','UrlsController@pesquisaConteudo')->name('url.pesquisa');
});