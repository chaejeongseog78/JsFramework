<?php
header("Access-Control-Allow-Origin: *");

// 인터넷옵션에서 캐시설정이 자동으로 되어잇을때, 무시하고, 캐시사용안한다고 설정하는부분
header("Pragma: no-cache");

ob_start(); //속도때문에.. html을 중간중간 전송하지 않고 모앗다가 한번에 전송함 푸터에 마지막 끝내는 함수 있음.
ini_set("memory_limit", "-1"); //메모리 초과 방지
ini_set("session.cache_expire", 240); // 세션 유효시간 : 분  2일(2880) / 4시간(240) / 10분(10)
ini_set("session.gc_maxlifetime", 14400); // 세션 가비지 컬렉션(로그인시 세션지속 시간) : 초 2일(172800) / 4시간(14400) / 10분(600)
ini_set("session.cookie_domain",  $_SERVER['SERVER_NAME']);
ini_set("session.cookie_lifetime", 0); // 초

session_cache_limiter('none');


// Check PHP version.
$minPhpVersion = '7.4'; // If you update this, don't forget to update `spark`.
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
	$message = sprintf(
		'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
		$minPhpVersion,
		PHP_VERSION
	);

	exit($message);
}

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
	chdir(FCPATH);
}

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// Load our paths config file
// This is the line that might need to be changed, depending on your folder structure.
require FCPATH . '../app/Config/Paths.php';
// ^^^ Change this line if you move your application folder

$paths = new Config\Paths();

// Location of the framework bootstrap file.
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Load environment settings from .env files into $_SERVER and $_ENV
require_once SYSTEMPATH . 'Config/DotEnv.php';
(new CodeIgniter\Config\DotEnv(ROOTPATH))->load();

// Define ENVIRONMENT
if (!defined('ENVIRONMENT')) {
	define('ENVIRONMENT', env('CI_ENVIRONMENT', 'production'));
}

// Load Config Cache
// $factoriesCache = new \CodeIgniter\Cache\FactoriesCache();
// $factoriesCache->load('config');
// ^^^ Uncomment these lines if you want to use Config Caching.

/*
 * ---------------------------------------------------------------
 * GRAB OUR CODEIGNITER INSTANCE
 * ---------------------------------------------------------------
 *
 * The CodeIgniter class contains the core functionality to make
 * the application run, and does all the dirty work to get
 * the pieces all working together.
 */

$app = Config\Services::codeigniter();
$app->initialize();
$context = is_cli() ? 'php-cli' : 'web';
$app->setContext($context);

/*
 *---------------------------------------------------------------
 * LAUNCH THE APPLICATION
 *---------------------------------------------------------------
 * Now that everything is set up, it's time to actually fire
 * up the engines and make this app do its thang.
 */

$app->run();

// Save Config Cache
// $factoriesCache->save('config');
// ^^^ Uncomment this line if you want to use Config Caching.

// Exits the application, setting the exit code for CLI-based applications
// that might be watching.
exit(EXIT_SUCCESS);
