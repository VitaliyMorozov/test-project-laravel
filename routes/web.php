<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkupController;
use Saritasa\Laravel\Controllers\Web\WebResourceRegistrar;
use App\Http\Controllers\AdminController;
use Saritasa\Roles\Enums\Roles;

$router = app('router');
$web = new WebResourceRegistrar($router);

$web->get('/', HomeController::class, 'index');
$web->resource('markup', MarkupController::class, [
    'only' => 'index',
    'get' => MarkupController::getMarkupMethods()
]);

Route::any('/', 'HomeController@index')->where('all', '.+');


// Admin Panel
/*
$router->group(['prefix' => 'admin', 'middleware' => ['auth', 'role:' . Roles::ADMIN]], function (Router $router) {
    $router->get('/', 'AdminController@main')->name('admin.main');
});*/
Route::group(['prefix' => 'admin'], function () {
	Route::get('/', 'AdminController@index');
});
