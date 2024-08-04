<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    // ruta  obtencion id
    $routes->get('users', 'controlladorUsu::index');
    // ruta insertar
    $routes->post('users', 'controlladorUsu::create');
    // ruta editar
    $routes->put('users/(:num)', 'controlladorUsu::update/$1');
    // ruta eliminar 
    $routes->delete('users/(:num)', 'controlladorUsu::delete/$1');
});
