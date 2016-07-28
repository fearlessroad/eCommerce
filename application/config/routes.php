<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Products';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['adminLogin'] = 'dashboards/login';
$route['productView/(:any)']='products/productView/$1';
