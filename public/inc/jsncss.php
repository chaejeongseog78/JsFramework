<?php
if (isset($_config) && isset($_config['_URL_Last_FileName'])) {
	require($_config['ABSPATH'] . "/inc/css_lib.php");
	require($_config['ABSPATH'] . "/inc/jQuery_lib.php");

	echo "<style type='text/css'>";
	if (file_exists(APPPATH . "Views/css/_default.css")) {
		require(APPPATH . "Views/css/_default.css");
	}
	if (file_exists(APPPATH . "Views/css/" . $_config['_URL_Last_FileName'] . ".css")) {
		require(APPPATH . "Views/css/" . $_config['_URL_Last_FileName'] . ".css");
	}
	echo "</style>";
}
