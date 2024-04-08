<?php

use App\Controllers\Index;
// use App\Controllers\Pages;
use App\Controllers\Sample;
// use App\Controllers\News;

use App\Controllers\Upload;

// use App\Helpers\InitConfigGlobalHelper;

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

$routes->group("ajax", function ($routes) {
	// $_config = InitConfigGlobalHelper::getInitConfig();
	// dd($_config);
	// $buf = "Ajax\\" . $_config['_URL_Last_FileName'] . "::index";
	// dd($buf);

	$url = new \CodeIgniter\HTTP\URI(current_url());
	$arrUrl = $url->getsegments();
	// print_r($arrUrl);
	$groupNm =    isset($arrUrl[1]) ? $arrUrl[1] : "";
	$controller = isset($arrUrl[2]) ? $arrUrl[2] : "";
	$method =     isset($arrUrl[3]) ? $arrUrl[3] : "";

	// $arrGo = explode('/', $_SERVER['REQUEST_URI']);
	// dd($arrGo);
	if (isset($groupNm) && !empty($groupNm)) {
		if (isset($controller) && !empty($controller)) {
			if (isset($method) && !empty($method)) {

				$goBuf = $groupNm . "\\" . $controller . "::" . $method;

				$routes->get('(:any)',  $goBuf);
				$routes->post('(:any)',  $goBuf);
			}
		}
	}
});

$routes->get('/', 'Index::index');
$routes->get('(:segment)',  [Index::class, 'index']);
