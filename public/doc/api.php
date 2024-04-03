<?php
require("../../vendor/autoload.php");
$openapi = \OpenApi\Generator::scan(['../../App/Controllers/Api']);
header('Content-Type: application/json');
echo $openapi->toJson();
