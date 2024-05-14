<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/dosen', 'Dosen::index');
$routes->get('/dosen/(:num)', 'Dosen::detail/$1');
$routes->post('/dosen/insertData', 'Dosen::insertData');
$routes->post('/dosen/updateData/(:num)', 'Dosen::updateData/$1');
$routes->get('/dosen/deleteData/(:num)', 'Dosen::deleteData/$1');

$routes->get('/staf', 'Staf::index');
$routes->get('/staf/(:num)', 'Staf::detail/$1');
$routes->post('/staf/insertData', 'Staf::insertData');
$routes->post('/staf/updateData/(:num)', 'Staf::updateData/$1');
$routes->get('/staf/deleteData/(:num)', 'Staf::deleteData/$1');
