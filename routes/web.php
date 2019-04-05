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


Route::get('user/login','ClassroomController@showLogin')->name('showLogin');
Route::post('user/login','ClassroomController@handleLogin')->name('handleLogin');

Route::middleware(['access'])->group(function () {
	Route::get('/', function () {
    return view('welcome');
});
Route::post('/add','ClassroomController@handleAddClassroom')->name('handleAddClassroom');
Route::get('/delet/{id}','ClassroomController@handleDeleteClassroom')->name('handleDeleteClassroom');
Route::get('/list','ClassroomController@showClassroom')->name('showClassroom');
Route::get('/show/{id}','ClassroomController@showClass')->name('showClass');
//Route::get('/showForm','ClassroomController@showForm')->name('showForm');
Route::post('/update/{id}','ClassroomController@handleUpdateClassroom')->name('handleUpdateClassroom');
Route::get('user','ClassroomController@showUser')->name('showUser');
Route::post('user','ClassroomController@handleRegister')->name('handleRegister');
Route::get('user/logout','ClassroomController@logout');
Route::get('studentDetails/{id}','ClassroomController@showStudents')->name('showStudents');
Route::get('deleteStudent/{id}','ClassroomController@handleDeletStudent')->name('deletStudent');

});