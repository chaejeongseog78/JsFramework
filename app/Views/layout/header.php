<?php

if (file_exists(APPPATH . "Views/layout/header/" . $_config['_URL_Last_FileName'] . ".php")) {
	$this->extend("layout/header/" . $_config['_URL_Last_FileName'] . ".php");
} else {
	$this->extend("layout/header_default.php");
}
