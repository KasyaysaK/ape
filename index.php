<?php 

	require('controller/front.php');

try {
	var_dump('on est ici');
	if (isset($_GET['action'])) {

		switch ($_GET['action']) {

			case 'showHome':
				var_dump('coucou');
				showHome();
				break;

			case 'showLogin':
			var_dump('coucou depuis le routeur');
				showLogin();
				break;

			case 'register':
				break;

		}
	}
	else {
		var_dump('coucoucoucou');
		showHome();
	}
			
}
catch(Exception $e) 
{
    $errorMessage = $e->getMessage();	
}
