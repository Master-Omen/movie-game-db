<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->get('/logout', 'Home::logout');
$routes->post('/', 'Home::index');
$routes->post('/register', 'Home::register');

$routes->get('/home', 'Home::home');
$routes->get('/about', 'Home::about');

$routes->get('/profile', 'Home::profile');
$routes->get('/updateprofile', 'Home::updateProfile');
$routes->post('/updateprofile', 'Home::updateProfile');

$routes->get('/search', 'Search::index');
$routes->get('/search/(:any)', 'Search::more/$1');

$routes->post('/search/save', 'Search::save');
$routes->post('/search/delete', 'Search::delete');

$routes->get('/favorite', 'listController::favorite');
$routes->get('/watchlist', 'listController::watchlist');
$routes->get('/watchlist/(:any)', 'listController::watchlist/$1');
$routes->get('/favorite/(:any)', 'listController::favorite/$1');
