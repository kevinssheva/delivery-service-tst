<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'pageFilter']);
$routes->get('/login', 'Login::index', ['filter' => 'loginFilter']);
$routes->post('/login_action', 'Login::login_action', ['filter' => 'loginFilter']);
$routes->get('/logout', 'Login::logout', ['filter' => 'pageFilter']);
$routes->get('/pengiriman', 'Pengiriman::deliveryList', ['filter' => 'pageFilter']);
$routes->get('/pengiriman/(:num)', 'Pengiriman::index/$1', ['filter' => 'pageFilter']);
$routes->post('/pengiriman/create', 'Pengiriman::create', ['filter' => 'pageFilter']);
$routes->get('/pengiriman/detail/(:num)', 'Pengiriman::detail/$1', ['filter' => 'pageFilter']);
$routes->post('/pengiriman/update', 'Pengiriman::changeStatus', ['filter' => 'pageFilter']);
$routes->get('/api/status/(:num)', 'Pengiriman::getStatus/$1');
$routes->get('/api/pengiriman', 'PengirimanAPI::getAllPengirimanStatus');
