<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| USER MADE ROUTES
| -------------------------------------------------------------------------
*/
$route['register'] = 'users/create';
$route['register/store'] = 'users/store';

$route['login'] = 'users/login';
$route['login/validate'] = 'users/validate';





$route['profile'] = 'users/profile';
$route['profile/edit'] = 'users/edit';

$route['logout'] = 'users/logout';

$route['products'] = 'products';
$route['products/create'] = 'products/create';
$route['products/store'] = 'products/store';
$route['(:any)'] = 'products/show/$1';  




