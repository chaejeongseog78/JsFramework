<?php

use App\Controllers\Index;
// use App\Controllers\Pages;
// // use App\Controllers\Sample;
// use App\Controllers\News;

// $routes->setAutoRoute(true);
// $routes->setDefaultController('Index');

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Home::index', ['filter' => 'authFilter']);

// $routes->get('sample', [Sample::class, 'index]);

// $routes->get('pages', [Pages::class, 'index']);
// $routes->get('(:segment)',  [Pages::class, 'view/$1']);

// $routes->group('api', static function ($routes) {
// $routes->get('news', [News::class, 'index']);
// });

$routes->group("api", function ($routes) {
	$routes->post("register", "Api\Register::index");
	$routes->post("login", "Api\Login::index");
	$routes->get("users", "Api\User::index", ['filter' => 'authFilter']);
	$routes->get("me", "Api\Me::index", ['filter' => 'authFilter']);
});


$routes->get('/', 'Index::index');
$routes->get('(:segment)',  [Index::class, 'index']);
