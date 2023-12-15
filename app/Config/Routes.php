<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index',['filter' => 'pageFilter']);
$routes->get('/login', 'Login::index',['filter' => 'loginFilter']);
$routes->post('/login_action', 'Login::login_action',['filter' => 'loginFilter']);
$routes->get('/logout', 'Login::logout',['filter' => 'pageFilter']);