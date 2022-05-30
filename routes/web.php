<?php

use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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


// Route::prefix('api')->group(
//     function () {
//         // Get Contacts
//         Route::get('getContacts', 'App\Http\Controllers\ContactController@getContacts');

//         // Save Contacts
//         Route::post('save_contact', 'App\Http\Controllers\ContactController@saveContacts');
//     }

// );
