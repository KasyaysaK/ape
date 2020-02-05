<?php
	
	require_once('model/Database.php');

	class FormValidator extends Database 
	{
		private $errors = [];
//		public function __construct($errors)
//		{
//			$this->$errors = $errors;
//		}
		public function isUsernameValid($username, $errors)
		{
			if(!empty($_POST['username'])) {
				$username = htmlspecialchars($_POST['username']);
			}
			else {
				$errors = 'Le pseudo n\'est pas valide';
			}
		}

		public function isEmailValid($email, $errors) 
		{
			if(!empty($_POST['email']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$email = htmlspecialchars($_POST['email']);
				
			}
			else {
				$errors = 'L\'adresse email n\'est pas valide';
			}
		}

		public function isPasswordValid($password, $errors)
		{
			if(!empty($_POST['password']) || $_POST['password'] != $_POST['password-confirm']) {
				$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			}
			else {
				$errors = 'Le mot de passe n\'est pas valide';
			}
		}

//		public function isThereError($errorCount)
//		{
//			$errorCount = count($this->errors);
//			var_dump($errorCount);
//			if($errorCount > 0) {
//				return $this->errors;
//			}
//		}

//		public function isUnique($field, $table)
//		{
//			$dbh = $this->dbhConnect();		
//			$checkDbh = $dbh->query('SELECT id FROM $table where $field = ?');
//			$checkDbh->fetch
//		}


	}