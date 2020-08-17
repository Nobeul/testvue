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
    return view('welcome');
});

// Route::any('{slug}', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');
Route::get('/contactlist', 'ContactController@contactList')->name('contact.list');
Route::get('/getContacts', 'ContactController@getContacts');
Route::get('/updatecontact', 'ContactController@updateContactPage');
Route::get('/getcontact/{id}', 'ContactController@getContactAccordingToId');
Route::post('/updatecontact/{id}', 'ContactController@updateContact');
Route::post('/deletecontact/{id}', 'ContactController@deleteContact');

Route::get('{path}', 'HomeController@index')->where('path', '[\/\w\.-]*');
