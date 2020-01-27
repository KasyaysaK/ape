<?php
//passer le code en POO

//créer une fonction pour ob_start

require_once('model/UserManager.php');


	function showHome() //loads homepage
	{
		require('view/front/home.php');
	}

	function showRegistration() //loads login page
	{
		require('view/front/registration.php');
	}

	function getUser() {
		
	}

	function registerUser($firstname, $lastname, $email, $hash) // saves user to the database
	{
		if (isset($_POST['signup'])) {
			$firstname 	= htmlspecialchars($_POST['firstname']);
			$lastname 	= htmlspecialchars($_POST['lastname']);
			$email 		= htmlspecialchars($_POST['email']);
			$hash 		= password_hash($_POST['password'], PASSWORD_DEFAULT);
			}

		echo $firstname . " " . $lastname . " " . $email . " " . $hash;

		$userManager = new \APE\Site\Model\UserManager();
		$newUser = $userManager->registerUser($firstname, $lastname, $email, $hash);

		if ($newUser === false) {
			echo 'erreur :(';
		}
		else {
			require('view/front/profile.php');
		}
	}

