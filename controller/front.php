<?php
	
	//namespace APE\Site\Model;

	//passer les require_once dans autoload
	//passer le code en POO
	//créer une fonction pour ob_start
	class Controller 
	{
		protected $users;
		protected $posts;

		public function __construct() 
		{
			$this->users = new Users();
			$this->posts = new Posts();
		}

		public function showHome() //loads homepage
		{
			require('view/front/home.php');
		}

		public function showRegistration() //loads login page
		{
			require('view/front/registration.php');
		}

		public function registerUser($username, $email, $password) // saves user to the database
		{

			$checkForm = new FormValidator($_POST);
			$validUsername = $checkForm->isUsernameValid($username, $errors);
			$validEmail = $checkForm->isEmailValid($email, $errors);
			$validPassword = $checkForm->isPasswordValid($password, $errors);
	//		$errors = $checkForm->isThereError($errorCount);

			var_dump($errors);


			if ($errors = null) {
				$newUser = $this->users->createUser($username, $email, $password);
				require('view/front/profile.php');
				echo 'inscription réussie !';
			}
		}

		public function listPosts()
		{
		    $allPosts = $this->posts->getPosts();
	    	require('view/front/postList.php');
		}

	}

	

