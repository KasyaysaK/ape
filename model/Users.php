<?php

	//namespace APE\Site\Model;
	require_once('model/Database.php');

	class UserManager extends Database
	{
		public function createUser($username, $email, $password)
		{
			$dbh = $this->dbhConnect();
			$newUser = $dbh->prepare('INSERT INTO users (username, email, password, role_id, status) VALUES (?, ?, ?, 3, 0)');
			return $newUser->execute(array($username, $email, $validPassword)); 
		}

 		public function getUser($username, $password)
 		{
 			$dbh = $this->$dbh->dbhConnect();
 			$user = prepare('SELECT id, email FROM users WHERE email = :email'); 
 			$user->execute(array('email' => $email));
 			return $user->fetch();
 		}
 		
	}