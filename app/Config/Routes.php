<?php

use App\Controllers\Index;
// use App\Controllers\Pages;
use App\Controllers\Sample;
// use App\Controllers\News;

use App\Controllers\Upload;

// $routes->setAutoRoute(true);
// $routes->setDefaultController('Index');

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Home::index', ['filter' => 'authFilter']);

$routes->get('sample', [Sample::class, 'index']);
$routes->get('sample/(:segment)', [Sample::class, 'param']);

// $routes->get('pages', [Pages::class, 'index']);
// $routes->get('(:segment)',  [Pages::class, 'view/$1']);

// $routes->group('api', static function ($routes) {
// $routes->get('news', [News::class, 'index']);
// });


$routes->group("upload", function ($routes) {
	$routes->post("file", [Upload::class, 'index']);
	$routes->get("showimg", [Upload::class, 'showimg']);
	$routes->get('showimg/(:any)', [Upload::class, 'param']);
});

$routes->group("api", function ($routes) {
	$routes->post("register", "Api\Register::index");
	$routes->post("login", "Api\Login::index");
	$routes->get("users", "Api\User::index", ['filter' => 'authFilter']);
	$routes->get("me", "Api\Me::index", ['filter' => 'authFilter']);
});


$routes->get('/', 'Index::index');
$routes->get('(:segment)',  [Index::class, 'index']);
