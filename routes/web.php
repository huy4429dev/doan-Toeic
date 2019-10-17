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

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::prefix('vocabulary')->group(function () {
        /**
         *  Tu vung
         */
        Route::get('/','vocabulary\VocabularyController@index');
    });
    Route::prefix('listening')->group(function () {
        /**
         *  Nghe
         */
        
        Route::get('/','listening\ListeningController@index')->name('listening-index');
        Route::get('/topic/{id}','listening\ListeningController@getAllPost');
        Route::get('/add-topic','listening\ListeningController@addTopic');
    });
});


Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('ngu-phap-tieng-anh')->group(function () {
    Route::get('/','Vocabulary\VocabularyController@index');
});
