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
$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
|                                 Dashboard
| -------------------------------------------------------------------------
*/
$route['dashboard'] = 'DashboardController/index';
/*
| -------------------------------------------------------------------------
|                                 Menu Produk
| -------------------------------------------------------------------------
*/
$route['products'] = 'ProdukController/index';
$route['products/formcreate'] = 'ProdukController/formCreate';
$route['products/readbyid/(:any)'] = 'ProdukController/readbyid/$1';
$route['products/formupdate/(:any)'] = 'ProdukController/formUpdate/$1';
/*
| -------------------------------------------------------------------------
|                                 Menu Kategori
| -------------------------------------------------------------------------
*/
$route['category'] = 'KategoriController/index';
$route['category/formcreate'] = 'KategoriController/formCreate';
$route['category/readbyid/(:any)'] = 'KategoriController/readbyid/$1';
$route['category/formupdate/(:any)'] = 'KategoriController/formUpdate/$1';
/*
| -------------------------------------------------------------------------
|                                 Menu Pemasukan
| -------------------------------------------------------------------------
*/
$route['income'] = 'PemasukanController/index';
$route['income/formcreate'] = 'PemasukanController/formCreate';
$route['income/readbyid/(:any)'] = 'PemasukanController/readbyid/$1';
$route['income/formupdate/(:any)'] = 'PemasukanController/formUpdate/$1';
/*
| -------------------------------------------------------------------------
|                                 Menu Pengeluaran
| -------------------------------------------------------------------------
*/
$route['expenditure'] = 'PengeluaranController/index';
$route['expenditure/formcreate'] = 'PengeluaranController/formCreate';
$route['expenditure/readbyid/(:any)'] = 'PengeluaranController/readbyid/$1';
$route['expenditure/formupdate/(:any)'] = 'PengeluaranController/formUpdate/$1';
/*
| -------------------------------------------------------------------------
|                                 Menu Pegawai
| -------------------------------------------------------------------------
*/
$route['employees'] = 'PegawaiController/index';
$route['employees/formcreate'] = 'PegawaiController/formCreate';
$route['employees/readbyid/(:any)'] = 'PegawaiController/readbyid/$1';
$route['employees/formupdate/(:any)'] = 'PegawaiController/formUpdate/$1';
/*
| -------------------------------------------------------------------------
|                                 Menu Users
| -------------------------------------------------------------------------
*/
$route['users'] = 'UsersController/index';
$route['users/formcreate'] = 'UsersController/formCreate';
$route['users/readbyid/(:any)'] = 'UsersController/readbyid/$1';
$route['users/formupdate/(:any)'] = 'UsersController/formUpdate/$1';
$route['users/formupdate/email/(:num)'] = 'UsersController/formUpdate_Email/$1';
$route['users/formupdate/pass/(:num)'] = 'UsersController/formUpdate_Pass/$1';
/*
| -------------------------------------------------------------------------
|                                 Menu Laporan
| -------------------------------------------------------------------------
*/
$route['admin/report'] = 'LaporanController/index';
$route['admin/report/month'] = 'LaporanController/reportMonth';
$route['admin/report/year'] = 'LaporanController/reportYear';

$route['director/report'] = 'LaporanController/index';