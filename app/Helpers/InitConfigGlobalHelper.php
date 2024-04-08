<?php

namespace App\Helpers;

use PDO;
use PDOException;

class InitConfigGlobalHelper
{
	public static function getInitConfig()
	{
		$_ArrConfig['ABSPATH'] = $_SERVER['DOCUMENT_ROOT'];

		#// URL 마지막 경로 파일이름
		$_URL_Last_FileName = explode('.', basename($_SERVER['PHP_SELF']));
		if (isset($_REQUEST['q'])) {
			$_URL_Last_FileName[0] = $_REQUEST['q'];
		}
		$_ArrConfig['_URL_Last_Nm'] = $_URL_Last_FileName[0];



		$_SERVER_NAME = str_replace("www.", "", $_SERVER["HTTP_HOST"]);
		$_SVNAME = str_replace(".", "_", $_SERVER_NAME);
		$_SVNAME = str_replace("-", "_", $_SVNAME);
		$_ArrConfig['_SVNAME'] = $_SVNAME;

		return $_ArrConfig;
	}

	public static function getConnPDO()
	{
		$servername = getenv('database.default.hostname');
		$username = getenv('database.default.username');
		$password = getenv('database.default.password');
		$dbname = getenv('database.default.database');
		try {
			$dsn = "mysql:host={$servername};dbname={$dbname}";
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
			$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			// dd("<p>DB 연결 성공</p>");
			return $conn;
		} catch (PDOException $e) {
			return $e->getMessage();
			exit;
		}
	}
}
