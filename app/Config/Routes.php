<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ===============================
// DEFAULT ROUTES
// ===============================

$routes->get('/', 'Home::index');

// ===============================
// AUTH
// ===============================

$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// ===============================
// ADMIN
// ===============================

$routes->get('admin', 'Admin::index');

// ===============================
// PRODUCT
// ===============================

// ===============================
// ADMIN
// ===============================

$routes->get('admin', 'Admin::index');

// CRUD PRODUCT (ADMIN)
$routes->get('admin/products', 'Product::index');
$routes->get('admin/products/create', 'Product::create');
$routes->post('admin/products/store', 'Product::store');
$routes->get('admin/products/edit/(:num)', 'Product::edit/$1');
$routes->post('admin/products/update/(:num)', 'Product::update/$1');
$routes->get('admin/products/delete/(:num)', 'Product::delete/$1');

// ===============================
// PRODUCT
// ===============================

$routes->get('product/(:num)', 'Product::detail/$1');

// ===============================
// CART
// ===============================

$routes->get('cart', 'Cart::index');
$routes->post('cart/add/(:num)', 'Cart::add/$1');
$routes->get('cart/delete/(:num)', 'Cart::delete/$1');
$routes->post('cart/update', 'Cart::update');
$routes->get('cart/plus/(:num)', 'Cart::plus/$1');
$routes->get('cart/minus/(:num)', 'Cart::minus/$1');

// ===============================
// CHECKOUT
// ===============================

$routes->get('checkout', 'Checkout::index');
$routes->post('checkout/process', 'Checkout::process');
