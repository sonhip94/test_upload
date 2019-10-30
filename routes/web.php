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

Route::get('/','FrontendController@index');

Route::get('/uploading','FrontendController@uploading');

Route::get('/uploadManage','FrontendController@fileuploads');

Route::get('/videos','FrontendController@videoviewer')->name('videos')->middleware('auth');

Route::get('/uploadingqueue','FrontendController@uploadingqueue');

Route::get('/uploadingprogress','FrontendController@uploadingprogress');

// Route to direct login
Route::get('authentication/getLogin',['as'=>'getLogin','uses'=>'Auth\LoginController@getLogin']);
Route::post('authentication/postLogin',['as'=>'postLogin','uses'=>'Auth\LoginController@postLogin']);
Route::get('logout','Auth\LoginController@logout');

Route::get('authentication/getRegister',['as'=>'getRegister','uses'=>'Auth\RegisterController@getRegister']);
Route::post('authentication/postRegister',['as'=>'postRegister','uses'=>'Auth\RegisterController@postRegister']);

//$routes->connect('/tus/*', ['controller' => 'Tus', 'action' => 'server']);
Route::get('Authentication/uploading', function(){
	return view('uploading');
});
//backup - might not need
Route::get('uploading',['as'=> 'upload1', function(){
	return view('uploading');
}])->name('upload1');

Route::any('/tus/{any?}', function () {
    $response = app('tus-server')->serve();

    return $response->send();
})->where('any', '.*');

Route::post('upload-file-from-tus', 'FileController@uploadTus')->name('upload_tus');

// end-login

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home1');

//uploadingfile dung de upload file
Route::get('file','FileController@showUploadFrom')->name('upload.file')->middleware('auth');
Route::post('file/{userId}','FileController@storeFile')->name('upload.store');

//get video to videoviewer
//Route::get('videos','FileController@getVideoList')->name('upload.video');
//Route::post('videos','FileController@runVideo');


Route::get('/uploadtest', 'FileController@showTestUploadForm');

//this route to access the fileuploads page and use the getlist in file controller
Route::get('/uploadManage','FileController@getList')->name('uploadManage')->middleware('auth');

//try with delete route
Route::get('delete/{id}',['as'=>'files.getDelete', 'uses'=>'FileController@getDelete']);
Route::get('delete-videos/{id}',['as'=>'files.getDelete_videos', 'uses'=>'FrontendController@getDelete']);

//download file
Route::get('download/{id}','FileController@download')->name('downloadfile');
Route::get('download-videos/{id}','FrontendController@download')->name('downloadfile-video');

Route::get('getdatato',['as'=>'uploadM', function()
	{
		return "testing thu in web.php";
	}]);

Route::get('fileupload/{id}',['as'=>'fileDetails','uses'=>'FileController@fileDetails']);
