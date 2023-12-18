<?php
namespace App\Controllers;
// Import class controller yang diperlukan
use App\Controllers\Home;
use App\Controllers\Dashboard;
use App\Controllers\PelangganAuth;
use App\Controllers\StaffAuth;
use App\Controllers\StaffController;
use App\Controllers\PelangganController;
use App\Controllers\ProdukController;
use App\Controllers\GaleriFoto;
use App\Controllers\Testimoni;
use App\Controllers\Omset;
use App\Controllers\KeranjangController;
use App\Controllers\TransaksiController;
// Load helper untuk function `route`
helper('route');
// Pelanggan Routes
$routes->get('/', [Home::class, 'index'], ['as' => 'index']);
$routes->get('/register', [PelangganAuth::class, 'pelangganregister'], ['as' => 'pelangganregister']);
$routes->post('/simpanregister', [PelangganAuth::class, 'pelanggansimpanregister'], ['as' => 'pelanggansimpanregister']);
$routes->get('/login', [PelangganAuth::class, 'pelangganlogin'], ['as' => 'pelangganlogin']);
$routes->post('/postlogin', [PelangganAuth::class, 'pelangganpostlogin'], ['as' => 'pelangganpostlogin']);
$routes->get('/logout', [PelangganAuth::class, 'pelangganlogout'], ['as' => 'pelangganlogout']);
    $routes->post('/testimonitambahstore', [Testimoni::class, 'testimonitambahstore'], ['as' => 'testimonitambahstore']);
    $routes->get('/pelangganeditprofile/(:num)', [PelangganController::class, 'pelangganeditprofile/$1'], ['as' => 'pelangganeditprofile']);
    $routes->post('/pelangganeditprofilestore', [PelangganController::class, 'pelangganeditprofilestore'], ['as' => 'pelangganeditprofilestore']);
    $routes->get('/checkout', [TransaksiController::class, 'checkout'], ['as' => 'checkout']);
    $routes->post('/keranjangtambahstore', [KeranjangController::class, 'keranjangtambahstore'], ['as' => 'keranjangtambahstore']);
// Staff Auth
$routes->get('/admin/login', [StaffAuth::class, 'adminlogin'], ['as' => 'adminlogin']);
$routes->post('/admin/postlogin', [StaffAuth::class, 'adminpostlogin'], ['as' => 'adminpostlogin']);
$routes->get('/admin/logout', [StaffAuth::class, 'adminlogout'], ['as' => 'adminlogout']);
    //Dashboard Staff Routes
    $routes->get('/admin/dashboard', [Dashboard::class, 'dashboard'], ['as' => 'dashboard']);
    $routes->get('/admin/staff', [StaffController::class, 'staff'], ['as' => 'staff']);
    $routes->get('/admin/stafftambah', [StaffController::class, 'stafftambah'], ['as' => 'stafftambah']);
    $routes->post('/admin/stafftambahstore', [StaffController::class, 'stafftambahstore'], ['as' => 'stafftambahstore']);
    $routes->get('/admin/staffedit/(:num)', [StaffController::class, 'staffedit/$1'], ['as' => 'staffedit']);
    $routes->post('/admin/staffeditstore', [StaffController::class, 'staffeditstore'], ['as' => 'staffeditstore']);
    $routes->get('/admin/staffdestroy/(:num)', [StaffController::class, 'staffdestroy/$1'], ['as' => 'staffdestroy']);
    //Dashboard Pelanggan Routes
    $routes->get('/admin/pelanggan', [PelangganController::class, 'pelanggan'], ['as' => 'pelanggan']);
    $routes->get('/admin/pelanggantambah', [PelangganController::class, 'pelanggantambah'], ['as' => 'pelanggantambah']);
    $routes->post('/admin/pelanggantambahstore', [PelangganController::class, 'pelanggantambahstore'], ['as' => 'pelanggantambahstore']);
    $routes->get('/admin/pelangganedit/(:num)', [PelangganController::class, 'pelangganedit/$1'], ['as' => 'pelangganedit']);
    $routes->post('/admin/pelangganeditstore', [PelangganController::class, 'pelangganeditstore'], ['as' => 'pelangganeditstore']);
    $routes->get('/admin/pelanggandestroy/(:num)', [PelangganController::class, 'pelanggandestroy/$1'], ['as' => 'pelanggandestroy']);
    //Produk Admin Controller
    $routes->get('/admin/produk', [ProdukController::class, 'produk'], ['as' => 'produk']);
    $routes->get('/admin/produktambah', [ProdukController::class, 'produktambah'], ['as' => 'produktambah']);
    $routes->post('/admin/produktambahstore', [ProdukController::class, 'produktambahstore'], ['as' => 'produktambahstore']);
    $routes->get('/admin/produkedit/(:num)', [ProdukController::class, 'produkedit/$1'], ['as' => 'produkedit']);
    $routes->post('/admin/produkeditstore', [ProdukController::class, 'produkeditstore'], ['as' => 'produkeditstore']);
    $routes->get('/admin/produkdestroy/(:num)', [ProdukController::class, 'produkdestroy/$1'], ['as' => 'produkdestroy']);
    //Galeri Foto Admin Controller
    $routes->get('/admin/galerifoto', [GaleriFoto::class, 'galerifoto'], ['as' => 'galerifoto']);
    $routes->get('/admin/galerifototambah', [GaleriFoto::class, 'galerifototambah'], ['as' => 'galerifototambah']);
    $routes->post('/admin/galerifototambahstore', [GaleriFoto::class, 'galerifototambahstore'], ['as' => 'galerifototambahstore']);
    $routes->get('/admin/galerifotoedit/(:num)', [GaleriFoto::class, 'galerifotoedit/$1'], ['as' => 'galerifotoedit']);
    $routes->post('/admin/galerifotoeditstore', [GaleriFoto::class, 'galerifotoeditstore'], ['as' => 'galerifotoeditstore']);
    $routes->get('/admin/galerifotodestroy/(:num)', [GaleriFoto::class, 'galerifotodestroy/$1'], ['as' => 'galerifotodestroy']);
    //Testimoni Admin Controller
    $routes->get('/admin/testimoni', [Testimoni::class, 'testimoni'], ['as' => 'testimoni']);
    $routes->get('/admin/testimonidestroy/(:num)', [Testimoni::class, 'testimonidestroy/$1'], ['as' => 'testimonidestroy']);
    //Omset Admin Controller
    $routes->get('/admin/omset', [Omset::class, 'omset'], ['as' => 'omset']);
    $routes->get('/admin/omsettambah', [Omset::class, 'omsettambah'], ['as' => 'omsettambah']);
    $routes->post('/admin/omsettambahstore', [Omset::class, 'omsettambahstore'], ['as' => 'omsettambahstore']);
    $routes->get('/admin/omsetedit/(:num)', [Omset::class, 'Omsetedit/$1'], ['as' => 'omsetedit']);
    $routes->post('/admin/omseteditstore', [Omset::class, 'Omseteditstore'], ['as' => 'omseteditstore']);
    $routes->get('/admin/omsetdestroy/(:num)', [Omset::class, 'omsetdestroy/$1'], ['as' => 'omsetdestroy']);
