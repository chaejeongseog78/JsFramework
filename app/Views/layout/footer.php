<?php

if (file_exists(APPPATH . "Views/layout/footer/" . $_config['_URL_Last_Nm'] . ".php")) {
	$this->extend("layout/footer/" . $_config['_URL_Last_Nm'] . ".php");
} else {
	$this->extend("layout/footer_default.php");
}
