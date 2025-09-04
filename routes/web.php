<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

$router->get('/login', 'AuthController@show_login');
$router->get('/', 'Controller@home');
$router->get('/logout', 'AuthController@logout');

$router->get('/profile', 'Controller@profile');
$router->post('/profile', 'Controller@profile');

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->group(['middleware' => 'auth.jwt'], function () use ($router) {
        $router->get('/', 'AdminController@home');
        $router->get('/users', 'AdminController@users');
        $router->post('/users', 'AdminController@users');
        $router->get('/users/export', 'AdminController@exportUsers');
        $router->get('/settings', 'AdminController@settings');
        $router->post('/settings', 'AdminController@settings');
        $router->get('/logs', 'AdminController@log_pengguna');
        $router->get('/modul', 'AdminController@modul');
        $router->post('/modul', 'AdminController@modul');
        $router->get('/calon-klien', 'AdminController@calon_klien');
        $router->post('/calon-klien', 'AdminController@calon_klien');
        $router->get('/calon-klien/export', 'AdminController@exportCalonKlien');
        $router->get('/klien', 'AdminController@klien');
        $router->post('/klien', 'AdminController@klien');
        $router->get('/klien/export', 'AdminController@exportKlien');
        $router->get('/aktivitas-prospek', 'AdminController@aktivitas_prospek');
        $router->post('/aktivitas-prospek', 'AdminController@aktivitas_prospek');
        $router->get('/aktivitas-prospek/export', 'AdminController@exportAktivitasProspek');
        $router->get('/penggunaan-modul', 'AdminController@penggunaan_modul');
        $router->post('/penggunaan-modul', 'AdminController@penggunaan_modul');
        $router->get('/penggunaan-modul/export', 'AdminController@exportPenggunaanModul');
        $router->get('/tagihan-klien', 'AdminController@tagihan_klien');
        $router->post('/tagihan-klien', 'AdminController@tagihan_klien');
        $router->get('/tagihan-klien/export', 'AdminController@exportTagihanKlien');
        $router->get('/notifikasi-tagihan', 'AdminController@notifikasi_tagihan');
        $router->post('/notifikasi-tagihan', 'AdminController@notifikasi_tagihan');
        $router->get('/notifikasi-tagihan/export', 'AdminController@exportNotifikasi');
        $router->get('/modul/export', 'AdminController@exportModul');
        $router->get('/logs/export', 'AdminController@exportLogPengguna');
        $router->get('/catatan', 'AdminController@catatan');
        $router->post('/catatan', 'AdminController@catatan');
    });
});

$router->group(['prefix' => 'pengguna'], function () use ($router) {
    $router->group(['middleware' => 'auth.jwt'], function () use ($router) {
        $router->get('/', 'PenggunaController@home');
        $router->get('/users', 'PenggunaController@users');
        $router->post('/users', 'PenggunaController@users');
        $router->get('/settings', 'PenggunaController@settings');
        $router->post('/settings', 'PenggunaController@settings');
        $router->get('/logs', 'PenggunaController@log_pengguna');
        $router->get('/modul', 'PenggunaController@modul');
        $router->post('/modul', 'PenggunaController@modul');
        $router->get('/calon-klien', 'PenggunaController@calon_klien');
        $router->post('/calon-klien', 'PenggunaController@calon_klien');
        $router->get('/klien', 'PenggunaController@klien');
        $router->post('/klien', 'PenggunaController@klien');
        $router->get('/aktivitas-prospek', 'PenggunaController@aktivitas_prospek');
        $router->post('/aktivitas-prospek', 'PenggunaController@aktivitas_prospek');
        $router->get('/penggunaan-modul', 'PenggunaController@penggunaan_modul');
        $router->post('/penggunaan-modul', 'PenggunaController@penggunaan_modul');
        $router->get('/tagihan-klien', 'PenggunaController@tagihan_klien');
        $router->post('/tagihan-klien', 'PenggunaController@tagihan_klien');
        $router->get('/notifikasi-tagihan', 'PenggunaController@notifikasi_tagihan');
        $router->post('/notifikasi-tagihan', 'PenggunaController@notifikasi_tagihan');
        $router->get('/calon-klien/export', 'PenggunaController@exportCalonKlien');
        $router->get('/klien/export', 'PenggunaController@exportKlien');
        $router->get('/aktivitas-prospek/export', 'PenggunaController@exportAktivitasProspek');
        $router->get('/modul/export', 'PenggunaController@exportModul');
        $router->get('/penggunaan-modul/export', 'PenggunaController@exportPenggunaanModul');
        $router->get('/tagihan-klien/export', 'PenggunaController@exportTagihanKlien');
        $router->get('/notifikasi-tagihan/export', 'PenggunaController@exportNotifikasi');
        $router->get('/catatan', 'PenggunaController@catatan');
    });
});

$router->group(['prefix' => 'api'], function () use ($router) {
    // Auth Routes
    $router->post('login', 'AuthController@login');
});
