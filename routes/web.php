<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    echo '<h1>Hola mundo!</h1>';
    return $router->app->version();
});

//METODOS PARA ESTUDIANTE
$router->get('verEstudiantes', 'EstudianteController@index');
$router->get('mostrarEstudiante/{codigo}', 'EstudianteController@show');
$router->post('crearEstudiantes', 'EstudianteController@store');
$router->put('modificarEstudiantes/{codigo}', 'EstudianteController@update');
$router->delete('eliminarEstudiantes/{codigo}', 'EstudianteController@destroy');

//METODOS PARA ACTIVIDADES
$router->get('verActividad/{codigoEstudiante}', 'ActividadController@index');
$router->get('mostrarActividad/{id}', 'ActividadController@show');
$router->post('crearActividad', 'ActividadController@store');
$router->put('modificarActividad/{id}', 'ActividadController@update');
$router->delete('eliminarActividad/{id}', 'ActividadController@destroy');