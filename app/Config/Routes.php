<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'role:user, administrator']);

$routes->get('/formdata', 'Home::formData', ['filter' => 'role:user']);
$routes->post('/formdata', 'Home::formData', ['filter' => 'role:user']);

$routes->get('/profile', 'Home::viewProfile', ['filter' => 'role:user']);
$routes->post('/profile/editprofil', 'Home::editProfil', ['filter' => 'role:user']);

$routes->get('/editformdata', 'Home::evFormData', ['filter' => 'role:user']);
$routes->post('/editformdata', 'Home::evFormData', ['filter' => 'role:user']);

$routes->get('/tiket', 'Home::tiketDownload', ['filter' => 'role:user']);

// $routes->post('/editformdata', 'Home::editformData', ['filter' => 'role:user']);
$routes->post('/uploadcicil', 'Home::uploadCicil', ['filter' => 'role:user']);
$routes->post('/cicilbyid', 'Home::cicilId', ['filter' => 'role:user']);

$routes->get('admin', 'Admin\HomeAdmin::index', ['filter' => 'role:administrator, operator, bendahara']);
$routes->get('admin/peserta', 'Admin\HomeAdmin::daftarPeserta', ['filter' => 'role:administrator, operator, bendahara']);
$routes->get('admin/peserta/(:num)', 'Admin\HomeAdmin::pesertabyID/$1', ['filter' => 'role:administrator, operator, bendahara']);
$routes->get('admin/validasi', 'Admin\HomeAdmin::validations', ['filter' => 'role:administrator, operator, bendahara']);
$routes->get('admin/validasi/(:num)', 'Admin\HomeAdmin::validationbyId/$1', ['filter' => 'role:administrator, operator, bendahara']);
$routes->post('admin/validated', 'Admin\HomeAdmin::validated', ['filter' => 'role:administrator, operator, bendahara']);
$routes->post('admin/addDiscount', 'Admin\HomeAdmin::addDiscount', ['filter' => 'role:administrator']);

$routes->get('admin/bendahara', 'Admin\HomeAdmin::bendahara', ['filter' => 'role:administrator, operator, bendahara']);
$routes->post('admin/adddebit', 'Admin\HomeAdmin::addDebit', ['filter' => 'role:administrator, operator, bendahara']);
$routes->post('admin/addkredit', 'Admin\HomeAdmin::addKredit', ['filter' => 'role:administrator, operator, bendahara']);
