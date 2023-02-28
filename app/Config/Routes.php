<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

$routes->post('/cariberita', 'Home::daftarberita');
$routes->get('/daftarberita', 'Home::daftarberita');
$routes->get('/berita/(:any)', 'Home::berita/$1');

$routes->get('/daftarpengumuman', 'Home::daftarpengumuman');
$routes->post('/caripengumuman', 'Home::daftarpengumuman');
$routes->get('/pengumuman/(:any)', 'Home::pengumuman/$1');

//proses login 
$routes->get('/proses-login', 'ProsesLogin::index', ['filter' => 'login']);

// admin web 
$routes->get('/adminWeb', 'AdminWeb::index', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/berita', 'AdminWeb::berita', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/tambahberita', 'AdminWeb::tambahberita', ['filter' => 'role:Admin WEB']);
$routes->post('/adminWeb/prosestambahberita', 'AdminWeb::prosestambahberita', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/detailberita/(:any)', 'AdminWeb::detailberita/$1', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/hapusberita/(:any)', 'AdminWeb::hapusberita/$1', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/ubahberita/(:any)', 'AdminWeb::ubahberita/$1', ['filter' => 'role:Admin WEB']);
$routes->post('/adminWeb/prosesubahberita/(:any)', 'AdminWeb::prosesubahberita/$1', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/profilsekolah', 'AdminWeb::profilsekolah', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/sambutankepsek', 'AdminWeb::sambutankepsek', ['filter' => 'role:Admin WEB']);
$routes->post('/adminWeb/prosesinputsambutan', 'AdminWeb::prosesinputsambutan', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/ubahsambutan', 'AdminWeb::ubahsambutan', ['filter' => 'role:Admin WEB']);
$routes->post('/adminWeb/prosesubahsambutan', 'AdminWeb::prosesubahsambutan', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/tendik', 'AdminWeb::tendik', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/tambahtendik', 'AdminWeb::tambahtendik', ['filter' => 'role:Admin WEB']);
$routes->post('/adminWeb/prosestambahtendik', 'AdminWeb::prosestambahtendik', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/detailtendik', 'AdminWeb::detailtendik', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/ubahtendik', 'AdminWeb::ubahtendik', ['filter' => 'role:Admin WEB']);
$routes->post('/adminWeb/prosesubahtendik', 'AdminWeb::prosesubahtendik', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/hapustendik', 'AdminWeb::hapustendik', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/sarpras', 'AdminWeb::sarpras', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/tambahsarpras', 'AdminWeb::tambahsarpras', ['filter' => 'role:Admin WEB']);
$routes->post('/adminWeb/prosestambahsarpras', 'AdminWeb::prosestambahsarpras', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/detailsarpras', 'AdminWeb::detailsarpras', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/ubahsarpras', 'AdminWeb::ubahsarpras', ['filter' => 'role:Admin WEB']);
$routes->post('/adminWeb/prosesubahsarpras', 'AdminWeb::prosesubahsarpras', ['filter' => 'role:Admin WEB']);
$routes->get('/adminWeb/hapussarpras', 'AdminWeb::hapussarpras', ['filter' => 'role:Admin WEB']);

// kesiswaan 
$routes->get('/kesiswaan', 'Kesiswaan::index', ['filter' => 'role:Kesiswaan']);
$routes->get('/kesiswaan/siswa', 'Kesiswaan::siswa', ['filter' => 'role:Kesiswaan']);
$routes->get('/kesiswaan/tambahsiswa', 'Kesiswaan::tambahsiswa', ['filter' => 'role:Kesiswaan']);
$routes->post('/kesiswaan/prosestambahsiswa', 'Kesiswaan::prosestambahsiswa', ['filter' => 'role:Kesiswaan']);
$routes->get('/kesiswaan/detailsiswa/(:any)', 'Kesiswaan::detailsiswa/$1', ['filter' => 'role:Kesiswaan']);
$routes->get('/kesiswaan/ubahsiswa/(:any)', 'Kesiswaan::ubahsiswa/$1', ['filter' => 'role:Kesiswaan']);
$routes->post('/kesiswaan/prosesubahsiswa/(:any)', 'Kesiswaan::prosesubahsiswa/$1', ['filter' => 'role:Kesiswaan']);
$routes->get('/kesiswaan/hapussiswa/(:any)', 'Kesiswaan::hapussiswa/$1', ['filter' => 'role:Kesiswaan']);
$routes->get('/kesiswaan/pengumuman', 'Kesiswaan::pengumuman', ['filter' => 'role:Kesiswaan']);
$routes->get('/kesiswaan/tambahpengumuman', 'Kesiswaan::tambahpengumuman', ['filter' => 'role:Kesiswaan']);
$routes->post('/kesiswaan/prosestambahpengumuman', 'Kesiswaan::prosestambahpengumuman', ['filter' => 'role:Kesiswaan']);
$routes->post('/kesiswaan/detailpengumuman/(:any)', 'Kesiswaan::detailpengumuman/$1', ['filter' => 'role:Kesiswaan']);
$routes->get('/kesiswaan/ubahpengumuman/(:any)', 'Kesiswaan::ubahpengumuman/$1', ['filter' => 'role:Kesiswaan']);
$routes->post('/kesiswaan/prosesubahpengumuman/(:any)', 'Kesiswaan::prosesubahpengumuman/$1', ['filter' => 'role:Kesiswaan']);
$routes->post('/kesiswaan/hapuspengumuman/(:any)', 'Kesiswaan::hapuspengumuman/$1', ['filter' => 'role:Kesiswaan']);

// kurikulum
$routes->get('/kurikulum', 'Kurikulum::index', ['filter' => 'role:Kurikulum']);
$routes->get('/kurikulum/kelas', 'Kurikulum::kelas', ['filter' => 'role:Kurikulum']);
$routes->get('/kurikulum/tambahkelas', 'Kurikulum::tambahkelas', ['filter' => 'role:Kurikulum']);
$routes->post('/kurikulum/prosestambahkelas', 'Kurikulum::prosestambahkelas', ['filter' => 'role:Kurikulum']);
$routes->post('/kurikulum/prosesubahkelas/(:any)', 'Kurikulum::prosesubahkelas/$1', ['filter' => 'role:Kurikulum']);
$routes->get('/kurikulum/hapuskelas/(:any)', 'Kurikulum::hapuskelas/$1', ['filter' => 'role:Kurikulum']);
$routes->get('/kurikulum/pengumuman', 'Kurikulum::pengumuman', ['filter' => 'role:Kurikulum']);
$routes->get('/kurikulum/tambahpengumuman', 'Kurikulum::tambahpengumuman', ['filter' => 'role:Kurikulum']);
$routes->post('/kurikulum/prosestambahpengumuman', 'Kurikulum::prosestambahpengumuman', ['filter' => 'role:Kurikulum']);
$routes->post('/kurikulum/detailpengumuman/(:any)', 'Kurikulum::detailpengumuman/$1', ['filter' => 'role:Kurikulum']);
$routes->get('/kurikulum/ubahpengumuman/(:any)', 'Kurikulum::ubahpengumuman/$1', ['filter' => 'role:Kurikulum']);
$routes->post('/kurikulum/prosesubahpengumuman/(:any)', 'Kurikulum::prosesubahpengumuman/$1', ['filter' => 'role:Kurikulum']);
$routes->post('/kurikulum/hapuspengumuman/(:any)', 'Kurikulum::hapuspengumuman/$1', ['filter' => 'role:Kurikulum']);
$routes->get('/kurikulum/mapel', 'Kurikulum::mapel', ['filter' => 'role:Kurikulum']);
$routes->get('/kurikulum/tambahmapel', 'Kurikulum::tambahmapel', ['filter' => 'role:Kurikulum']);
$routes->post('/kurikulum/prosestambahmapel', 'Kurikulum::prosestambahmapel', ['filter' => 'role:Kurikulum']);
$routes->post('/kurikulum/prosesubahmapel/(:any)', 'Kurikulum::prosesubahmapel/$1', ['filter' => 'role:Kurikulum']);
$routes->get('/kurikulum/hapusmapel/(:any)', 'Kurikulum::hapusmapel/$1', ['filter' => 'role:Kurikulum']);

// tatausaha
$routes->get('/tatausaha', 'Tatausaha::index', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/guru', 'Tatausaha::guru', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/tambahguru', 'Tatausaha::tambahguru', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/tambahtendik', 'Tatausaha::tambahtendik', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/prosestambahguru', 'Tatausaha::prosestambahguru', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/detailguru/(:any)', 'Tatausaha::detailguru/$1', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/ubahguru/(:any)', 'Tatausaha::ubahguru/$1', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/prosesubahguru/(:any)', 'Tatausaha::prosesubahguru/$1', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/detailguru/(:any)', 'Tatausaha::detailguru/$1', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/ubahguru/(:any)', 'Tatausaha::ubahguru/$1', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/prosesubahguru/(:any)', 'Tatausaha::prosesubahguru/$1', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/hapusguru/(:any)', 'Tatausaha::hapusguru/$1', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/berkas', 'Tatausaha::berkas', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/prosestambahberkas', 'Tatausaha::prosestambahberkas', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/prosesubahberkas/(:any)', 'Tatausaha::prosesubahberkas/$1', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/hapusberkas/(:any)', 'Tatausaha::hapusberkas/$1', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/prosesubahberkasguru/(:any)', 'Tatausaha::prosesubahberkasguru/$1', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/pengumuman', 'Tatausaha::pengumuman', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/tambahpengumuman', 'Tatausaha::tambahpengumuman', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/prosestambahpengumuman', 'Tatausaha::prosestambahpengumuman', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/detailpengumuman/(:any)', 'Tatausaha::detailpengumuman/$1', ['filter' => 'role:Tata Usaha']);
$routes->get('/tatausaha/ubahpengumuman/(:any)', 'Tatausaha::ubahpengumuman/$1', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/prosesubahpengumuman/(:any)', 'Tatausaha::prosesubahpengumuman/$1', ['filter' => 'role:Tata Usaha']);
$routes->post('/tatausaha/hapuspengumuman/(:any)', 'Tatausaha::hapuspengumuman/$1', ['filter' => 'role:Tata Usaha']);



// keuangan 
$routes->get('/keuangan', 'Keuangan::index', ['filter' => 'role:Keuangan']);
$routes->get('/keuangan/periodespp', 'Keuangan::periodespp', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/prosestambahperiodespp', 'Keuangan::prosestambahperiodespp', ['filter' => 'role:Keuangan']);
$routes->get('/keuangan/hapusperiodespp/(:any)', 'Keuangan::hapusperiodespp/$1', ['filter' => 'role:Keuangan']);
$routes->put('/keuangan/prosesubahperiodespp/(:any)', 'Keuangan::prosesubahperiodespp/$1', ['filter' => 'role:Keuangan']);
$routes->get('/keuangan/bayarspp', 'Keuangan::bayarspp', ['filter' => 'role:Keuangan']);
$routes->get('/keuangan/detailtagihan/(:any)', 'Keuangan::detailtagihan/$1', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/bayartagihan/(:any)/(:any)', 'Keuangan::bayartagihan/$1/$1', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/generatetagiahan', 'Keuangan::generatetagiahan', ['filter' => 'role:Keuangan']);
$routes->get('/keuangan/transaksi', 'Keuangan::transaksi', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/tambahtransaksi/(:any)', 'Keuangan::tambahtransaksi/$1', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/prosestambahtransaksi', 'Keuangan::prosestambahtransaksi', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/tambahjenistransaksi', 'Keuangan::tambahjenistransaksi', ['filter' => 'role:Keuangan']);
$routes->get('/keuangan/pengumuman', 'Keuangan::pengumuman', ['filter' => 'role:Keuangan']);
$routes->get('/keuangan/tambahpengumuman', 'Keuangan::tambahpengumuman', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/prosestambahpengumuman', 'Keuangan::prosestambahpengumuman', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/detailpengumuman/(:any)', 'Keuangan::detailpengumuman/$1', ['filter' => 'role:Keuangan']);
$routes->get('/keuangan/ubahpengumuman/(:any)', 'Keuangan::ubahpengumuman/$1', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/prosesubahpengumuman/(:any)', 'Keuangan::prosesubahpengumuman/$1', ['filter' => 'role:Keuangan']);
$routes->post('/keuangan/hapuspengumuman/(:any)', 'Keuangan::hapuspengumuman/$1', ['filter' => 'role:Keuangan']);


// calon siswa
$routes->get('/calonsiswa', 'Calonsiswa::index', ['filter' => 'role:Casis']);
$routes->get('/calonsiswa/ubahData/(:num)', 'Calonsiswa::ubahData/$1', ['filter' => 'role:Casis']);
$routes->get('/calonsiswa/cetak-formulir/(:num)', 'Calonsiswa::cetak/$1', ['filter' => 'role:Casis']);
$routes->post('/calonsiswa/prosesubah/(:num)', 'Calonsiswa::prosesubah/$1', ['filter' => 'role:Casis']);

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
