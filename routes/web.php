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


use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::prefix('vocabulary')->group(function () {
        /**
         *  Thêm - sửa - xóa chủ đề của từ vững
         */
        Route::get('/','vocabulary\TopicController@index');
        Route::post('/','vocabulary\TopicController@search');
        Route::get('create','vocabulary\TopicController@getCreate');
        Route::post('create','vocabulary\TopicController@postCreate');
        Route::get('update/{id}','vocabulary\TopicController@getUpdate');
        Route::post('update/{id}','vocabulary\TopicController@postUpdate');
        Route::get('delete/{id}','vocabulary\TopicController@delete');
    });
    Route::prefix('post-vocabulary')->group(function () {
        /**
         *  Thêm - sửa - xóa bài viết của mỗi chủ đề từ vững
         */
        Route::get('/{id}','vocabulary\PostController@index');
        Route::post('/','vocabulary\PostController@search');
        Route::get('create','vocabulary\PostController@getCreate');
        Route::post('create','vocabulary\PostController@postCreate');
        Route::get('update/{id}','vocabulary\PostController@getUpdate');
        Route::post('update/{id}','vocabulary\PostController@postUpdate');
        Route::get('delete/{id}','vocabulary\PostController@delete');
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


//Lấy danh sách chủ đề từ vững
Route::prefix('tu-vung')->group(function (){
    Route::get('/','Vocabulary\VocabularyController@index');
    Route::get('/{id}','Vocabulary\VocabularyController@detail');
    Route::get('item/{id}','Vocabulary\VocabularyController@item');
});