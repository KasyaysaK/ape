<?php 

	require('controller/front.php');

try {
	if (isset($_GET['action'])) {

		switch ($_GET['action']) {

			case 'showHome':
				showHome();
				break;

			case 'showRegistration':

				showRegistration();
				break;

			case 'registerUser':
				if (!empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['email']) || !empty($_POST['password'])) 
				{
					registerUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
				}
				else {
					echo 'Veuillez remplir tous les champs.';
				}
				break;

		}
	}
	else {
		showHome();
	}
			
}
catch(Exception $e) 
{
    $errorMessage = $e->getMessage();	
}
