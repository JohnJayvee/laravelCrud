<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('companies', CompanyController::class);

Route::group([
    'as' => "companies.",
    // 'middleware' => "auth"
], function () {

    Route::get('/companies', ['uses' => 'CompanyController@index', 'as' => 'index']);

    Route::get('/companies/create', ['uses' => 'CompanyController@create', 'as' => 'create']);

    Route::get('/companies/edit/{id}', ['uses' => 'CompanyController@edit', 'as' => 'edit']);

    Route::post('/companies/store', ['uses' => 'CompanyController@store', 'as' => 'store']);

    Route::put('/companies/update/{id}', ['uses' => 'CompanyController@update', 'as' => 'update']);

    Route::delete('/companies/delete/{id}', ['uses' => 'CompanyController@destroy', 'as' => 'destroy']);





});