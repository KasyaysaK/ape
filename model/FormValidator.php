<?php
	
	require_once('model/Database.php');

	class FormValidator extends Database 
	{
		protected $errors = [];

		public function __construct($errors)
		{
			$this->$errors = $errors;
		}
		public function isUsernameValid($username, $errors)
		{
			if(!empty($username) {
				$username = htmlspecialchars($_POST['username']);
			}
			else {
				$this->errors = 'Le pseudo n\'est pas valide';
			}
		}

		public function isEmailValid($email, $errors) 
		{
			if(!empty($email) || filter_var($email], FILTER_VALIDATE_EMAIL)) {
				$email = htmlspecialchars($email);
				
			}
			else {
				$this->$errors = 'L\'adresse email n\'est pas valide';
			}
		}

		public function isPasswordValid($password, $errors)
		{
			if(!empty($_POST['password']) || $_POST['password'] != $_POST['password-confirm']) {
				$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			}
			else {
				$this->$errors = 'Le mot de passe n\'est pas valide';
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