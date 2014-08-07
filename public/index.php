<?php

// Composer's autoload
define('COMPOSER_AUTOLOAD_FILE', __DIR__ . '/../vendor/autoload.php');
require_once(COMPOSER_AUTOLOAD_FILE);

// Create a site
$site = new Wrek\Site();

// The routes
$site->setRoutes(array(
	// Query string => file
	'front' => 'pages/front',
	'about' => 'pages/about',
	'404' => 'pages/404',
));

// Load the header
require_once('partials/header.php');

// If the route doesn't exist, we default to '404'
// If no route is given, we default to 'front'
require_once($site->getRouteFile());

// Load the footer
require_once('partials/footer.php');

// We're done
