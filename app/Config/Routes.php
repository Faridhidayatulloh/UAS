<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dosen::index');
$routes->get('/notifikasi/dosen-tidak-masuk/(:num)', 'Notifikasi::dosenTidakMasuk/$1');
$routes->get('/notifikasi/dosen-masuk/(:num)', 'Notifikasi::dosenMasuk/$1');
$routes->get('/dosen', 'Dosen::index');
$routes->get('/tambah-data-dosen', 'Dosen::createForm'); // Rute untuk menampilkan form tambah dosen
$routes->post('/tambah-data-dosen', 'Dosen::store'); // Rute untuk memproses form tambah dosen

