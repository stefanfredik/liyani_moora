<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');


$routes->get('/', 'Dashboard');
$routes->get("login", "Auth::login");
$routes->get("dashboard", "Dashboard");

$routes->get("user", "User::index");

$routes->group('profile', static function ($router) {
    $router->get('/', 'Profile::index');
    $router->get('gantipassword', 'Profile::gantipassword');

    $router->post('gantipassword', 'Profile::doGantiPassword');
});


$routes->group('kriteria', static function ($router) {
    $router->get('/', 'Kriteria::index');
    $router->get('table', 'Kriteria::table');
    $router->get('tambah', 'Kriteria::tambah');
    $router->get('(:num)', 'Kriteria::edit/$1');
    $router->get('delete/(:num)', 'Kriteria::delete/$1');

    $router->post('/', 'Kriteria::store');
    $router->post("(:num)", "Kriteria::update/$1");

    $router->delete("(:num)", "Kriteria::delete/$1");
});


$routes->group('subkriteria', static function ($router) {
    $router->get('/', 'Subkriteria::index');
    $router->get('table', 'Subkriteria::table');
    $router->get('tambah', 'Subkriteria::tambah');
    $router->get('(:num)', 'Subkriteria::edit/$1');
    $router->get('delete/(:num)', 'Subkriteria::delete/$1');

    $router->post('/', 'Subkriteria::store');
    $router->post("(:num)", "Subkriteria::update/$1");

    $router->delete("(:num)", "Subkriteria::delete/$1");
});



$routes->group('datapenduduk', static function ($router) {
    $router->get('/', 'Datapenduduk::index');
    $router->get('table', 'Datapenduduk::table');
    $router->get('tambah', 'Datapenduduk::tambah');
    $router->get('(:num)', 'Datapenduduk::edit/$1');
    $router->get('upload', 'Datapenduduk::upload');
    $router->get('detail/(:num)', 'Datapenduduk::detail/$1');
    $router->get('delete/(:num)', 'Datapenduduk::delete/$1');

    $router->post('/', 'Datapenduduk::store');
    $router->post("(:num)", "Datapenduduk::update/$1");
    $router->post('upload', 'Datapenduduk::doupload');

    $router->delete("(:num)", "Datapenduduk::delete/$1");
});


$routes->group('datapeserta', static function ($router) {
    $router->get('/', 'Peserta::index');
    $router->get('table', 'Peserta::table');
    $router->get('tambah', 'Peserta::tambah');
    $router->get('(:num)', 'Peserta::edit/$1');
    $router->get('detail/(:num)', 'Peserta::detail/$1');
    $router->get('delete/(:num)', 'Peserta::delete/$1');

    $router->post('/', 'Peserta::store');
    $router->post("(:num)", "Peserta::update/$1");

    $router->delete("(:num)", "Peserta::delete/$1");
});


// $routes->group("user", ['filter' => 'role:Admin'], function ($r) {
//     $r->get("/", "User::getIndex");
//     $r->get("tambah", "User::getTambah");
//     $r->get("edit/(:num)", "User::getEdit/$1");
//     $r->get("table", "User::getTable");

//     $r->post("/", "User::postIndex");
//     $r->post("saveedit/(:num)", "User::postSaveedit/$1");

//     $r->put("edit/(:num)", "User::putEdit/$1");

//     $r->delete("delete/(:num)", "User::deleteDelete/$1");
// });


$routes->group('user', static function ($router) {
    $router->get('/', 'User::index');
    $router->get('table', 'User::table');
    $router->get('tambah', 'User::tambah');
    $router->get('(:num)', 'User::edit/$1');
    // $router->get('delete/(:num)', 'User::delete/$1');

    $router->post('/', 'User::store');
    $router->post("(:num)", "User::update/$1");

    $router->delete("(:num)", "User::delete/$1");
});


$routes->group('kuota', static function ($router) {
    $router->get("/", 'Kuota::index');
    $router->get('table', 'Kuota::table');
    $router->get('tambah', 'Kuota::tambah');
    $router->get('(:num)', 'Kuota::edit/$1');

    $router->post('/', 'Kuota::store');
    $router->post("(:num)", "Kuota::update/$1");

    $router->delete("(:num)", "Kuota::delete/$1");
});

$routes->group("laporan", static function ($router) {
    // $router->get("/", "Laporan::index");
    $router->get("bantuan", "Laporan::bantuan");
    $router->get("penduduk", "Laporan::penduduk");

    $router->get("cetakpenduduk", "Laporan::cetakPenduduk");
    $router->get("cetakbantuan", "Laporan::cetakBantuan");
});


$routes->get("perhitungan", 'Perhitungan::index');
$routes->get("keputusan", 'Keputusan::index');
