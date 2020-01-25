<?php 

	function showHome() //loads homepage
	{
		require('view/front/home.php');
	}

	function showLogin() //loads login page
	{
		var_dump('coucou depuis le controleur');
		require('view/front/login.php');
	}

	function newUser($child_firstname, $child_lastname, $email, $password) // saves user to the database
	{
		$userManager = new UserManager;
		$newUser = $userManager->registerUser($child_firstname, $child_lastname, $email, $password);

		if ($newUser) {
			require('view/front/profile.php');
		}
	}