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

/**
 * Trang chủ
 */

Route::get('/','HomeController@index')->name('home');

/**
 * Trang giới thiệu
 */

Route::get('/gioi-thieu', function () {
    return view('about');
})->name('about');

/**
 * Trang Liên hệ
 */

Route::prefix('lien-he')->group(function (){
    Route::get('/','Contact\ContactController@create')->name('contact');

});


 
// Route::get('/user/profile', function () {
//     return view('student-profile');
// })->name('student-profile')->middleware('student');

/**
 * Student method
 */
Route::prefix('user')->group(function () {
    Route::post('/login', 'Student\StudentController@login')->name('student-login');
    Route::get('/logout', 'Student\StudentController@logout')->name('student-logout');
    Route::get('/profile', 'Student\StudentController@profile')->name('student-profile');
    Route::get('/error-logged', 'Student\StudentController@notLogged')->name('student-logged');
    Route::post('/contact','Contact\ContactController@addContact')->name('student-contact')->middleware('student');
    
});


Auth::routes();


Route::prefix('admin')->middleware('auth')->group(function () {
    /**
     *  Dashboard
     */

    Route::get('/dashboard', 'DashboardController@index');

    /**
     * Admin Profile
     */
    Route::get('/profile', 'AdminController@profile');
    Route::post('/profile/{id}', 'AdminController@update')->name('profile.update');




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
        Route::post('search/{id}','vocabulary\PostController@search')->name('post.vocabulary.search');
        Route::get('create/{id}','vocabulary\PostController@getCreate');
        Route::post('create','vocabulary\PostController@postCreate')->name('post.vocabulary.create');
        Route::get('update/{id}','vocabulary\PostController@getUpdate');
        Route::post('update/{id}','vocabulary\PostController@postUpdate');
        Route::get('delete/{id}','vocabulary\PostController@delete');
    });
    Route::prefix('listening')->group(function () {
        /**
         *  Nghe - Chủ đề
         */
        Route::get('/', 'listening\ListeningController@index');
        Route::post('/', 'listening\ListeningController@searchTopic')->name('listening.topic.search');
        Route::get('/add-topic', 'listening\ListeningController@addTopic');
        Route::post('/add-topic', 'listening\ListeningController@createTopic')->name('listening.topic.add');
        Route::get('/delete-topic/{id}', 'listening\ListeningController@deleteTopic')->name('listening.topic.delete');
        Route::get('/update-topic/{id}', 'listening\ListeningController@showTopic')->name('listening.topic.show');
        Route::post('/update-topic/{id}', 'listening\ListeningController@updateTopic')->name('listening.topic.update');

        /**
         *  Nghe - Bài viết
         */
        Route::get('/topic/{id}', 'listening\PostListeningController@index');
        Route::get('/topic/add-post/{id}', 'listening\PostListeningController@create');
        Route::post('/topic/add-post/{id}', 'listening\PostListeningController@store');
        Route::get('/topic/delete-post/{id}', 'listening\PostListeningController@delete');
        Route::get('/topic/update-post/{id}', 'listening\PostListeningController@edit');
        Route::post('/topic/update-post/{id}', 'listening\PostListeningController@update');
    });
    Route::prefix('gramar')->group(function () {
        /**
         *  Ngữ pháp
         */
        Route::get('/show', 'Gramar\GramarController@show')->name('showGramar');
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
        Route::get('/show', 'Gramar\PostGramarController@show');
        Route::get('/create', 'Gramar\PostGramarController@create');
        Route::post('/create', 'Gramar\PostGramarController@saveCreate')->name('savePostGramar');
        Route::get('update/{id}', 'Gramar\PostGramarController@update');
        Route::post('update/{id}', 'Gramar\PostGramarController@saveUpdate');
        Route::get('delete/{id}', 'Gramar\PostGramarController@delete');
        Route::get('/searchgramar', 'Gramar\PostGramarController@searchPostGramar')->name('searchPostGramar');
    });

    Route::prefix('toeic-exam')->group(function () {
        /**
         *  Đề thi toeic
         */
        Route::get('/show', 'Toiec\ToeicExamController@show')->name('showExam');
        Route::get('/create', 'Toiec\ToeicExamController@create');
        Route::post('/create', 'Toiec\ToeicExamController@saveCreate')->name('saveExam');
        Route::get('update/{id}', 'Toiec\ToeicExamController@update');
        Route::post('update/{id}', 'Toiec\ToeicExamController@saveUpdate');
        Route::get('delete/{id}', 'Toiec\ToeicExamController@delete');
        Route::get('/search', 'Toiec\ToeicExamController@searchExam')->name('searchExam');
    });
    Route::prefix('toeic-part')->group(function () {
        Route::get('/{id_exam}', 'Toiec\ToeicPartController@show')->name('showPart');
        Route::get('update/{id}', 'Toiec\ToeicPartController@update');
        Route::post('update/{id}', 'Toiec\ToeicPartController@saveUpdate');
        Route::get('delete/{id}', 'Toiec\ToeicPartController@delete');
    });
    
    Route::prefix('toeic-question')->group(function () {
        /**
         *  Câu hỏi đề thi
         */
        Route::get('/{id}/{type}', 'Toiec\ToeicQuestionController@show')->name('showQuestion');
        Route::get('/create/{id}/{type}', 'Toiec\ToeicQuestionController@create');
        Route::post('/create/{id}/{type}', 'Toiec\ToeicQuestionController@saveCreate')->name('saveQuestion');
        Route::get('/update/{id}/{type}/{time}', 'Toiec\ToeicQuestionController@update');
        Route::post('/update/{id}/{type}/{time}', 'Toiec\ToeicQuestionController@saveUpdate')->name('saveUpdateQuestion');
        Route::get('delete/{id}/{type}/{time}', 'Toiec\ToeicQuestionController@delete');
        Route::get('/search', 'Toiec\ToeicQuestionController@searchQuestion')->name('searchQuestion');
    });

    Route::prefix('toeic-answer')->group(function () {
        /**
         *  Đáp án toeic
         */
        Route::get('/{id}', 'Toiec\ToeicAnswerController@show')->name('showAnswer');
        Route::get('/create/{id}', 'Toiec\ToeicAnswerController@create');
        Route::post('/create/{id}', 'Toiec\ToeicAnswerController@saveCreate')->name('saveAnswer');
        Route::get('update/{id}', 'Toiec\ToeicAnswerController@update');
        Route::post('update/{id}', 'Toiec\ToeicAnswerController@saveUpdate');
        Route::get('delete/{id}', 'Toiec\ToeicAnswerController@delete');
        Route::get('/search', 'Toiec\ToeicAnswerController@searchAnswer')->name('searchAnswer');
    });
    
    Route::prefix('user')->group(function () {
        /**
         *  Tài khoản
         */
        Route::get('/show', 'UserController@show')->name('showUser');
        Route::get('/create', 'UserController@create');
        Route::post('/create', 'UserController@saveCreate')->name('saveUser');
        Route::get('update/{id}', 'UserController@update');
        Route::post('update/{id}', 'UserController@saveUpdate');
        Route::get('delete/{id}', 'UserController@delete');
        Route::get('/search', 'UserController@searchAnswer')->name('searchUser');
    });
    Route::prefix('post-article')->group(function () {
        /**
         *  Tin tức
         */
        Route::get('/show', 'ArticleController@show')->name('showArticle');
        Route::get('/create', 'ArticleController@create');
        Route::post('/create', 'ArticleController@saveCreate')->name('saveArticle');
        Route::get('update/{id}', 'ArticleController@update');
        Route::post('update/{id}', 'ArticleController@saveUpdate');
        Route::get('delete/{id}', 'ArticleController@delete');
        Route::get('/search', 'ArticleController@searchArticle')->name('searchArticle');
    });
    Route::prefix('contact')->group(function () {
        /**
         * Liên hệ
         */
        Route::get('/{id}','Contact\ContactController@detail');
        Route::post('/reply/{id}','Contact\ContactController@reply');
        Route::get('/delete/{id}','Contact\ContactController@delete');

    });
});



Route::prefix('ngu-phap-tieng-anh')->group(function () {
    Route::get('/', 'Vocabulary\VocabularyController@index');
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

//Lấy danh sách chủ đề nghe
Route::prefix('nghe')->group(function (){
    Route::get('/{id}','Listening\PageListeningController@topicDetail')->name('listening');
    Route::get('/get-answer/{id}','Listening\PageListeningController@getAnswer')->name('listening.get.answer');
});
//Toeic page member
Route::prefix('toeic')->group(function (){
    Route::get('/danh-sach-de-thi','ExamToeic\ExamController@examlist')->name('toeic-exam');
    Route::get('/thi-thu-toeic/{id}','ExamToeic\ExamController@examDetail')->name('toeic-exam-detail');
    Route::post('/thi-thu-toeic/{idExam}','ExamToeic\ExamController@getResult')->name('toeic-get-result')->middleware('student');
});

//Blog 
Route::prefix('blog')->group(function (){
    Route::get('/{id}','BlogController@detail')->name('blog-detail');
    Route::get('/','BlogController@all')->name('blog');

});
