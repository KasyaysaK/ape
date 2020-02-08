<?php

//namespace APE\Site\Model;
require_once('model/Database.php');

class Users extends Database
{
	private $dbh;

	public function __construct() {
		$this->dbh = $this->dbhConnect();
	}
	public function createUser($username, $email, $password)
	{ 
		$newUser = $this->dbh->prepare('INSERT INTO users (username, email, password, role_id, status) VALUES (?, ?, ?, 3, 0)');
		return $newUser->execute(array($username, $email, $password)); 
	}

	public function getUser($username, $password)
	{
		$user = $this->dbh->prepare('SELECT username FROM users WHERE username = :username'); 
		$user->execute(array('username' => $username));
		return $user->fetch();
	}
		
}