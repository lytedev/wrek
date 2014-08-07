<?php

$nav_items = array(
	'front' => "Home",
	'about' => "About " . $site->title(),
);

$routes = $site->routes();
foreach ($nav_items as $route => $name) {
	if (!isset($routes[$route])) continue;
	echo '<a href="' . $route . '">' . $name . '</a> ';
}
