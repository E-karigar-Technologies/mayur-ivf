<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->post('appointment', 'Home::appointment');
$routes->get('blog', 'Home::blog');
$routes->get('blog/(:segment)', 'Home::blogDetail/$1');
