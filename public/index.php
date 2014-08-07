<?php

// Composer's autoload
define('COMPOSER_AUTOLOAD_FILE', __DIR__ . '/../vendor/autoload.php');
require_once(COMPOSER_AUTOLOAD_FILE);

// Create a site
$site = new Wrek\Site();

// Load the header
require_once('partials/header.php');

// Handle requests and routing
$routes = array(
	// Query string => file
	'front' => 'pages/front',
	'about' => 'pages/about',
	'404' => 'pages/404',
);

// If the route doesn't exist, we default to '404'
// If no route is given, we default to 'front'
require_once($site->getRouteFile($routes));

// Load the footer
require_once('partials/footer.php');

// We're done
