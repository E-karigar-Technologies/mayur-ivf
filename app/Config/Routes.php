<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->post('appointment', 'Home::appointment');
$routes->get('blog', 'Home::blog');
$routes->get('blog/(:segment)', 'Home::blogDetail/$1');

// Admin Auth (Public)
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/authenticate', 'Admin\Auth::authenticate');
$routes->get('admin/logout', 'Admin\Auth::logout');

// Admin Panel (Protected by adminauth filter)
$routes->group('admin', ['filter' => 'adminauth'], static function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Inquiries
    $routes->get('inquiries', 'Admin\Inquiries::index');
    $routes->post('inquiries/update-status/(:num)', 'Admin\Inquiries::updateStatus/$1');
    $routes->post('inquiries/delete/(:num)', 'Admin\Inquiries::delete/$1');

    // Categories
    $routes->get('categories', 'Admin\Categories::index');
    $routes->post('categories/store', 'Admin\Categories::store');
    $routes->post('categories/update/(:num)', 'Admin\Categories::update/$1');
    $routes->post('categories/delete/(:num)', 'Admin\Categories::delete/$1');

    // Blog Articles
    $routes->get('blogs', 'Admin\Blogs::index');
    $routes->get('blogs/create', 'Admin\Blogs::create');
    $routes->post('blogs/store', 'Admin\Blogs::store');
    $routes->get('blogs/edit/(:num)', 'Admin\Blogs::edit/$1');
    $routes->post('blogs/update/(:num)', 'Admin\Blogs::update/$1');
    $routes->get('blogs/toggle-status/(:num)', 'Admin\Blogs::toggleStatus/$1');
    $routes->post('blogs/delete/(:num)', 'Admin\Blogs::delete/$1');
});
