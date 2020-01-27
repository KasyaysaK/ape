<?php

	namespace APE\Site\Model;
	require_once('model/Database.php');

	class UserManager extends Database
	{
		function registerUser($firstname, $lastname, $email, $hash)
		{
			$dbh = $this->dbhConnect();
			$newUser = $dbh->prepare('INSERT INTO users (firstname, lastname, email, password, role_id, status) VALUES (?, ?, ?, ?, 3, 0)');

			return $newUser->execute(array($firstname, $lastname, $email, $hash)); 
		}

		function getUser($email, $password)
		{
			$dbh = $this->$dbh->dbhConnect();
			$user = prepare('SELECT id, email FROM users WHERE email = :email'); 
			$user->execute(array('email' => $email));

			return $user->fetch();
		}
		
	}