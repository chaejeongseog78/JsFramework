<?php

if (file_exists(APPPATH . "Views/layout/header/" . $_config['_URL_Last_Nm'] . ".php")) {
	$this->extend("layout/header/" . $_config['_URL_Last_Nm'] . ".php");
} else {
	$this->extend("layout/header_default.php");
}
