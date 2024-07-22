<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'role:user, administrator']);
$routes->get('/formdata', 'Home::formData', ['filter' => 'role:user, administrator']);
$routes->post('/formdata', 'Home::formData', ['filter' => 'role:user']);
$routes->post('/uploadcicil', 'Home::uploadCicil', ['filter' => 'role:user']);
$routes->post('/cicilbyid', 'Home::cicilId', ['filter' => 'role:user']);
$routes->get('admin', 'Admin\HomeAdmin::index', ['filter' => 'role:administrator', 'operator', 'bendahara']);
$routes->get('admin/peserta', 'Admin\HomeAdmin::daftarPeserta', ['filter' => 'role:administrator', 'operator', 'bendahara']);
$routes->get('admin/peserta/(:num)', 'Admin\HomeAdmin::pesertabyID/$1', ['filter' => 'role:administrator', 'operator']);
