<!doctype html>
<html>
<head>
	<title><?= $site->title() ?></title>
</head>
<body>
	<header>
		<a href="<?= $site->url() ?>">
			<?= $site->title() ?>
		</a>
		<nav>
		<?php require_once('navigation.php'); ?>
		</nav>
	</header>
	<div id="main">