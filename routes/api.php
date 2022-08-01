<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get contacts
Route::get('getContacts', 'App\Http\Controllers\ContactController@getContacts');

// save contacts
Route::post('saveContacts', 'App\Http\Controllers\ContactController@saveContacts');

// delete contact
Route::delete('deleteContact/{id}', 'App\Http\Controllers\ContactController@deleteContact');

// get detail contact
Route::get('contactDetail/{id}', 'App\Http\Controllers\ContactController@contactDetail');

// update Contact
Route::post('updateContact/{id}', 'App\Http\Controllers\ContactController@updateContact');

// login, register, logout
Route::post('login', 'App\Http\Controllers\UserController@login');
Route::post('register', 'App\Http\Controllers\UserController@register')->name('user.register');
Route::post('logout', 'App\Http\Controllers\UserController@logout')->middleware('auth:sanctum');

// drawOnePersonForTheRaise
Route::get('getPerson', 'App\Http\Controllers\DrawController@getOneUserFromTableUser');
Route::post('getPersonWhoWorkFromOffice', 'App\Http\Controllers\DrawController@getOneUserFromTableUserInCompany');

// add user who works from office today
Route::post('coffe', 'App\Http\Controllers\Users_in_companyController@createUser');

// get users for the draw
Route::get('getUsersWhoWorkFromOffice', 'App\Http\Controllers\Users_in_companyController@showUser');   // TO MUSI BYC POPRAWIONE NA POST
// delete users who work from office today
Route::delete('deleteUsersWhoWorkFromOffice', 'App\Http\Controllers\Users_in_companyController@deleteUsers');

// update User
Route::post('updateUser', 'App\Http\Controllers\UserController@updateUser');

// get user for code review
Route::post('getOneUserFromTableToCodeReview', 'App\Http\Controllers\DrawController@getOneUserFromTableToCodeReview');
