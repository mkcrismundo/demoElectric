<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index');
$routes->match(['get', 'post'], '/contact', 'Contact::index');
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::create');

$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::index');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/create', 'Dashboard::create');
$routes->post('/dashboard/create', 'Dashboard::create');

// View Customer
$routes->get('/dashboard/view/(:num)', 'Dashboard::view/$1');

$routes->get('/dashboard/edit/(:num)', 'Dashboard::edit/$1');
$routes->post('/dashboard/edit/(:num)', 'Dashboard::edit/$1');
$routes->post('/dashboard/delete/(:num)', 'Dashboard::delete/$1');

$routes->post('/logout', 'Auth::logout');