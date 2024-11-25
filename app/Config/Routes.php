<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'C_Dashboard::index');
$routes->get('/dashboard', 'C_Dashboard::index');
$routes->post('/tambahData', 'C_Dashboard::tambahData');
$routes->get('detailData/(:num)', 'C_Dashboard::detailData/$1');
