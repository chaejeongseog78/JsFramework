<?php

namespace App\Helpers;

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
		$_ArrConfig['_URL_Last_FileName'] = $_URL_Last_FileName[0];

		return $_ArrConfig;
	}
}
