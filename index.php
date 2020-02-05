<?php

	require('autoload.php');

	$router = new Router();
	var_dump($router);
	$router->request();

	ob_start();
	$content = ob_get_clean();