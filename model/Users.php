<?php

//namespace APE\Site\Model;
require_once('model/Database.php');

class Users extends Database
{
private $dbh;

public function __construct() {
	$this->dbh = $this->dbhConnect();
}
public function create_user($username, $email, $password)
{ 
	$newUser = $this->dbh->prepare('INSERT INTO users (username, email, password, role_id, status) VALUES (?, ?, ?, 3, 0)');
	return $newUser->execute(array($username, $email, $password)); 
}

public function get_user($username, $password)
{
	$user = $this->dbh->prepare('SELECT username FROM users WHERE username = :username'); 
	$user->execute(array('username' => $username));
	return $user->fetch();
}
/**
 * allows admin to set the role_id of a user
 * @param $role_id
 */
//public function set_role($role_id)
/**
 * allows admin to ban a user
 * @param $id
 */
//public function ban_user($id)
/**
 * allows admin to validate a comment
 * @param $comment_id
 */
//public function validate($comment_id)	
/**
 * allows admin to reject a comment
 * @param $comment_id
 */
//public function validate($comment_id)	
}