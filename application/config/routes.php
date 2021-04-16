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
$route['register'] = 'register';
$route['register/store'] = 'register/store';

$route['login'] = 'login';
$route['login/validate'] = 'login/validate';

$route['logout'] = 'login/logout';

$route['users'] = 'users';
$route['users/store'] = 'users/store';
$route['users/update'] = 'users/update';

$route['chart'] = 'chart';
$route['chart/store'] = 'chart/store';

$route['checkout'] = 'checkout';

$route['profile'] = 'users/profile';
$route['profile/edit'] = 'users/edit';

$route['departments'] = 'departments';
$route['departments/store'] = 'departments/store';
$route['departments/update'] = 'departments/update';

$route['products'] = 'products';
$route['products/create'] = 'products/create';
$route['products/store'] = 'products/store';
$route['(:any)'] = 'products/show/$1';  




