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
    Route::prefix('gramar')->group(function () {
        /**
         *  Ngữ pháp
         */     
        Route::get('/show','Gramar\GramarController@show')->name('showGramar');
        Route::get('/create', 'Gramar\GramarController@create');
        Route::post('/create', 'Gramar\GramarController@saveCreate')->name('saveGramar');
        Route::get('update/{id}', 'Gramar\GramarController@update');
		Route::post('update/{id}', 'Gramar\GramarController@saveUpdate');
        Route::get('delete/{id}', 'Gramar\GramarController@delete');
        Route::get('/search', 'Gramar\GramarController@searchGramar')->name('searchGramar');
    });
    Route::prefix('postgramar')->group(function () {
        /**
         *  Ngữ pháp
         */     
        Route::get('/show','Gramar\PostGramarController@show');
        Route::get('/create', 'Gramar\PostGramarController@create');
        Route::post('/create', 'Gramar\PostGramarController@saveCreate')->name('savePostGramar');
        Route::get('update/{id}', 'Gramar\PostGramarController@update');
		Route::post('update/{id}', 'Gramar\PostGramarController@saveUpdate');
        Route::get('delete/{id}', 'Gramar\PostGramarController@delete');
        Route::get('/searchgramar', 'Gramar\PostGramarController@searchPostGramar')->name('searchPostGramar');
    });
});


Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('ngu-phap-tieng-anh')->group(function () {
    Route::get('/','Vocabulary\VocabularyController@index');
    /* lấy danh sách chủ đề vào trang ngữ pháp tiếng anh */
    Route::get('/dashboard', 'Gramar\pagesGramarController@showGramar')->name('showGramar');
});
/* chi tiết bài viết chủ để ngữ pháp */
Route::get('/ngu-phap-tieng-anh/{id}/{title}.html', 'Gramar\pagesGramarController@detailGramar');
