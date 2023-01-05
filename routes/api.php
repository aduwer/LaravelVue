<?php

use App\Mail\CoffeDrawEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

// ----------------------------------------------LOGIN REGISTER LOGOUT----------------------------------------------------------

Route::post('login', 'App\Http\Controllers\UserController@login');
Route::post('register', 'App\Http\Controllers\UserController@register')->name('user.register');
Route::post('logout', 'App\Http\Controllers\UserController@logout')->middleware('auth:sanctum');

// -------------------------------------------------DRAW------------------------------------------------------------------------

// ---------------INCREASE----------------
Route::get('getPerson', 'App\Http\Controllers\DrawController@getOneUserFromTableUser'); // winner of the draw (increase)

// ----------------COFFE------------------
Route::post('coffe', 'App\Http\Controllers\Users_in_companyController@createUser'); // add user who works from office today
Route::get('getUsersWhoWorkFromOffice', 'App\Http\Controllers\Users_in_companyController@showUser'); // show users for the draw (coffe)
Route::post('getPersonWhoWorkFromOffice', 'App\Http\Controllers\DrawController@getOneUserFromTableUserInCompany');  // winner of the draw (coffe) // POST, ponieważ przekazywany jest request w postaci kawy 
Route::delete('deleteUsersWhoWorkFromOffice', 'App\Http\Controllers\Users_in_companyController@deleteUsers'); // delete users who work from office today

// -------------CODE REVIEW------------
Route::post('updateUser', 'App\Http\Controllers\UserController@updateUser'); // update User (profile)
Route::post('getOneUserFromTableToCodeReview', 'App\Http\Controllers\DrawController@getOneUserFromTableToCodeReview'); // winner of the draw (code review) // POST, ponieważ przekazywany jest request 