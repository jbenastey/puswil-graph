<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['upload'] = 'ProsesController/upload';
$route['mentah'] = 'ProsesController/excel';
$route['dimensi'] = 'ProsesController/dimensi';
$route['refresh'] = 'ProsesController/refresh';
$route['fakta'] = 'ProsesController/fakta';
$route['refresh_fakta'] = 'ProsesController/refreshFakta';
$route['banyak'] = 'ProsesController/terbanyak';

$route['grafik_anggota'] = 'ProsesController/grafik_anggota';
$route['grafik_pengunjung'] = 'ProsesController/grafik_pengunjung';
$route['grafik_waktu/(:any)'] = 'ProsesController/grafik_waktu/$1';

$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

$route['data-fakta'] = 'DataController/fakta';

$route['data-excel-anggota'] = 'DataController/excelAnggota';
$route['data-excel-buku'] = 'DataController/excelBuku';
$route['data-excel-peminjam'] = 'DataController/excelPeminjam';
$route['data-excel-pengunjung'] = 'DataController/excelPengunjung';

$route['data-dimensi-anggota'] = 'DataController/dimensiAnggota';
$route['data-dimensi-buku'] = 'DataController/dimensiBuku';
$route['data-dimensi-peminjam'] = 'DataController/dimensiPeminjam';
$route['data-dimensi-pengunjung'] = 'DataController/dimensiPengunjung';
$route['data-dimensi-waktu'] = 'DataController/dimensiWaktu';

$route['pilih-bulan'] = 'DataController/excelBulan';
$route['excel-bulan/(:any)'] = 'DataController/lihatExcelPerbulan/$1';

$route['data-excel-bulan-anggota/(:any)'] = 'DataController/excelBulanAnggota/$1';
$route['data-excel-bulan-buku/(:any)'] = 'DataController/excelBulanBuku/$1';
$route['data-excel-bulan-peminjam/(:any)'] = 'DataController/excelBulanPeminjam/$1';
$route['data-excel-bulan-pengunjung/(:any)'] = 'DataController/excelBulanPengunjung/$1';

$route['hapus/(:any)/(:any)'] = 'ProsesController/hapus/$1/$2';
$route['hapus-semua'] = 'ProsesController/hapusSemua';
