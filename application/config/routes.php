<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* $route['default_controller'] = 'depan';
$route['lowongan'] = "frontend/lowongan";
$route['kandidat'] = "frontend/kandidat";
$route['tips'] = "frontend/tips";
$route['(:any)'] = "depan/$1/$1";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE; */

$route['default_controller'] = 'depan';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Custom routes

$route['belakang'] = "belakang";
$route['(:any)'] = "depan/$1/$1";
$route['pencarikerja/(:any)'] = "depan/pencarikerja/pencarikerja/$1";
$route['pencarikandidat/(:any)'] = "depan/pencarikandidat/pencarikandidat/$1";
$route['screening/(:any)'] = "depan/screening/screening/$1";
