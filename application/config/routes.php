<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Users
$route['users/update'] = 'users/update';
$route['users'] = 'users/index'; // List users
$route['users/login'] = 'users/login';
$route['users/register'] = 'users/register';

// Posts
$route['posts/index'] = 'posts/index'; // Pagination
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

// Project
$route['project/index'] = 'project/index'; // Pagination
$route['project/create'] = 'project/create';
$route['project/update'] = 'project/update';
$route['project/(:any)'] = 'project/view/$1';
$route['project'] = 'project/index';

// Inventory
$route['inventory/index'] = 'inventory/index'; // Pagination
$route['inventory/create'] = 'inventory/create';
$route['inventory/update'] = 'inventory/update';
$route['inventory/(:any)'] = 'inventory/view/$1';
$route['inventory'] = 'inventory/index';

// Income
$route['income/index'] = 'income/index'; // Pagination
$route['income/create'] = 'income/create';
$route['income/update'] = 'income/update';
$route['income/(:any)'] = 'income/view/$1';
$route['income'] = 'income/index';

// Outcome
$route['outcome/index'] = 'outcome/index'; // Pagination
$route['outcome/create'] = 'outcome/create';
$route['outcome/update'] = 'outcome/update';
$route['outcome/(:any)'] = 'outcome/view/$1';
$route['outcome'] = 'outcome/index';

// Home
$route['default_controller'] = 'users/login';

// Categories
$route['categories/create'] = 'categories/create';
// $route['categories/update'] = 'categories/update';
$route['categories/posts/(:any)'] = 'categories/posts/$1';
$route['categories'] = 'categories/index';

// any
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
