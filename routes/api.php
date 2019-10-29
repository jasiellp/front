<?php

use Illuminate\Http\Request;
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

// $api = app(Router::class);
// $api->version('v1', function (Router $api) {
// $api->group(['prefix' => 'auth', 'middleware' => 'api'], function(Router $api) {
//     $api->post('login', 'App\\Http\\Controllers\\API\\ResponsaveisAPIController@login');
//     $api->post('recovery', 'App\\Http\\Controllers\\API\\ForgotPasswordController@sendResetEmail');
//     $api->post('reset', 'App\\Http\\Controllers\\API\\ResetPasswordController@resetPassword');
// });
// });




















Route::resource('usuarios', 'UsuarioAPIController');

Route::post('login', 'ResponsaveisAPIController@login');






Route::resource('pratos', 'PratoAPIController');

Route::resource('buffets', 'BuffetAPIController');