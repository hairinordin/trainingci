<?php

use App\Controllers\Admin\Aduan;
use App\Controllers\Admin\States;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Calls $Users->list(1, 23)
$routes->get('users/1/23', 'Home::list/1/23');


/* $routes->get('product/(:segment)/(:segment)', 'Home::list/$1/$2');

$routes->post('products', 'Product::feature');
$routes->put('products/1', 'Product::feature');
$routes->delete('products/1', 'Product::feature');


$routes->match(['GET', 'PUT'], 'products', 'Product::feature');

$routes->get('users/1/23', 'Home::list/1/23'); */


$routes->group ('admin', static function ($routes) {

    $routes->get('state', [States::class, 'index']);
    $routes->get('state/show/(:num)', [States::class, 'show/$1'], ['as' => 'admin.states.show']);
    $routes->get('aduan', [Aduan::class, 'index'], ['as' => 'admin.aduan.index']);
    $routes->get('aduan2', [Aduan::class, 'index2'], ['as' => 'admin.aduan.index2']);
    $routes->get('aduan/ajaxdata', [Aduan::class, 'ajaxData'], ['as' => 'admin.aduan.ajaxdata']);

});