<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/post', 'Post::index');
$routes->get('/post/(:segment)', 'Post::viewPost/$1');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

$routes->group('admin',['filter' => 'login'], function($routes){ #update
    $routes->get('/', 'PostAdmin::index');
    $routes->get('post', 'PostAdmin::index');
    $routes->get('post/(:num)/preview', 'PostAdmin::preview/$1');
    $routes->get('post/new', 'PostAdmin::create');
    $routes->post('post/new', 'PostAdmin::create');
    $routes->get('post/(:num)/edit', 'PostAdmin::edit/$1');
    $routes->post('post/(:num)/edit', 'PostAdmin::edit/$1');
    $routes->get('post/(:num)/delete', 'PostAdmin::delete/$1');
});
