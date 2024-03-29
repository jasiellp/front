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

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
);



















Route::resource('usuarios', 'UsuarioController');



Route::resource('buffets', 'BuffetController');

Route::resource('pratos', 'PratoController');

Route::resource('formasPagamentos', 'FormasPagamentoController');

Route::resource('estabelecimentos', 'EstabelecimentoController');

Route::resource('embalagems', 'EmbalagemController');

Route::resource('items', 'ItemController');

Route::resource('usuarios', 'UsuarioController');

Route::resource('enderecos', 'EnderecoController');

Route::resource('comandas', 'ComandaController');

Route::resource('pedidos', 'PedidoController');