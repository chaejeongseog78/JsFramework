<?php

if (file_exists(APPPATH . "Views/layout/footer/" . $_config['_URL_Last_FileName'] . ".php")) {
	$this->extend("layout/footer/" . $_config['_URL_Last_FileName'] . ".php");
} else {
	$this->extend("layout/footer_default.php");
}
