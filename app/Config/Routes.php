<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/berita', 'Home::news');
$routes->get('/berita2', 'Home::news2');
// $routes->get('/auth/login', 'Auth::index');
// $routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/add', 'Auth::add_user');
$routes->post('/auth/in', 'Auth::check_user');
$routes->get('/auth/logout', 'Auth::logout_user');
// $routes->get('/dashboard', 'Admin::index');
// $routes->get('/daftar-anggota', 'Admin::daftar_anggota');
// $routes->get('/tambah-anggota', 'Admin::tambah_anggota');
// $routes->get('/mahasiswa-aktif', 'Admin::mahasiswa_aktif');
// $routes->get('/inventaris', 'Admin::inventaris');
// $routes->get('/informasi', 'Admin::informasi');
// $routes->get('/presensi', 'Admin::presensi');
// $routes->get('/keuangan', 'Admin::keuangan');
// $routes->get('/dashboard2', 'Admin::dashboard2');
// $routes->get('/dashboard/anggota/edit/:id', 'Anggota::edit');
// filtering, just authenticated user can access the dashboard
// $routes->get('/anggota', 'Auth::index');
// $routes->get('/informasi', 'Auth::index');
$routes->group('', ['filter' => 'AuthFilter'], function ($routes) {
	$routes->get('/dashboard*', 'Admin::index');
	$routes->get('/dashboard/*', 'Admin::index');
	
	// anggota routes
	$routes->get('/anggota', 'Anggota::index');
	$routes->get('/dashboard/anggota', 'Anggota::index');
	$routes->get('/dashboard/anggota/add', 'Anggota::add');
	$routes->post('/dashboard/anggota/add/save', 'Anggota::add_save');
	$routes->get('/dashboard/anggota/edit/(:any)', 'Anggota::edit/$1');
	$routes->post('/dashboard/anggota/edit/(:any)/save', 'Anggota::edit_save/$1');
	$routes->get('/dashboard/anggota/delete/(:any)', 'Anggota::delete/$1');

	// mahasiswa routes
	$routes->get('/mahasiswa', 'Mahasiswa::index');
	$routes->get('/dashboard/mahasiswa', 'Mahasiswa::index');
	$routes->get('/dashboard/mahasiswa/add', 'Mahasiswa::add');
	$routes->post('/dashboard/mahasiswa/add/save', 'Mahasiswa::add_save');
	$routes->get('/dashboard/mahasiswa/edit/(:any)', 'Mahasiswa::edit/$1');
	$routes->post('/dashboard/mahasiswa/edit/(:any)/save', 'Mahasiswa::edit_save/$1');
	$routes->post('/dashboard/mahasiswa/delete/(:any)', 'Mahasiswa::delete/$1');

	// inventaris routes
	$routes->get('/inventaris', 'Inventaris::index');
	$routes->get('/dashboard/inventaris', 'Inventaris::index');
	$routes->get('/dashboard/inventaris/add', 'Inventaris::add');
	$routes->post('/dashboard/inventaris/add/save', 'Inventaris::add_save');
	$routes->get('/dashboard/inventaris/edit/(:any)', 'Inventaris::edit/$1');
	$routes->post('/dashboard/inventaris/edit/(:any)/save', 'Inventaris::edit_save/$1');
	$routes->get('/dashboard/inventaris/delete/(:any)', 'Inventaris::delete/$1');

	// Informasi routes
	$routes->get('/informasi', 'Informasi::index');
	$routes->get('/dashboard/informasi', 'Informasi::index');
	$routes->get('/dashboard/informasi/add', 'Informasi::add');
	$routes->post('/dashboard/informasi/add/save', 'Informasi::add_save');
	$routes->get('/dashboard/informasi/edit/(:any)', 'Informasi::edit/$1');
	$routes->post('/dashboard/informasi/edit/(:any)/save', 'Informasi::edit_save/$1');
	$routes->get('/dashboard/informasi/delete/(:any)', 'Informasi::delete/$1');

	// presensi routes
	$routes->get('/presensi', 'Presensi::index');
	$routes->get('/dashboard/presensi', 'Presensi::index');
	$routes->get('/dashboard/presensi/add', 'Presensi::add');
	$routes->post('/dashboard/presensi/add/save', 'Presensi::add_save');
	$routes->get('/dashboard/presensi/edit/(:num)', 'Presensi::edit/$1');
	$routes->post('/dashboard/presensi/edit/(:any)/add', 'Presensi::edit_add_peserta/$1');
	$routes->post('/dashboard/presensi/edit/(:any)/save', 'Presensi::edit_save/$1');
	$routes->get('/dashboard/presensi/edit/(:num)/delete/(:num)', 'Presensi::edit_delete_peserta/$1/$2');
	$routes->get('/dashboard/presensi/delete/(:any)', 'Presensi::delete/$1');

	// keuangan routes
	$routes->get('/keuangan', 'Keuangan::index');
	$routes->get('/dashboard/keuangan', 'Keuangan::index');
	$routes->get('/dashboard/keuangan/add', 'Keuangan::add');
	$routes->post('/dashboard/keuangan/add/save', 'Keuangan::add_save');
	$routes->get('/dashboard/keuangan/edit/(:any)', 'Keuangan::edit/$1');
	$routes->post('/dashboard/keuangan/edit/(:any)/save', 'Keuangan::edit_save/$1');
	$routes->get('/dashboard/keuangan/delete/(:any)', 'Keuangan::delete/$1');
});
// filtering, if user already logged in, they can't acces login and register page
$routes->group('', ['filter' => 'AlreadyLoggedInFilter'], function ($routes) {
	$routes->get('/auth/login', 'Auth::index');
	$routes->get('/auth/register', 'Auth::register');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
