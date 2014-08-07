<?php 

// Composer autoload
require_once(__DIR__ . '/../vendor/autoload.php');

use Wrek\Site;

$site = new Site("Test");
$site->render();