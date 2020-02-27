<?php

//namespace APE\Site\Model;
require_once('model/Database.php');

class Users extends Database
{
	private $dbh;

	public function __construct() {
		$this->dbh = $this->dbhConnect();
	}
	public function create_user($name, $email, $password)
	{ 
		$newUser = $this->dbh->prepare('INSERT INTO users (name, email, password, role_id, status) VALUES (?, ?, ?, 3, 0)');
		return $newUser->execute(array($name, $email, $password)); 
	}
	/**
	 * selects all the userss
	 * @return $users_list
	 */
	public function get_users()
	{
	    $users_list = $this->dbh->query('SELECT users.id AS userid, roles.id AS roleid, roles.type AS roletype, roles.label AS rolelabel, role_id, name, status FROM users LEFT JOIN roles ON users.role_id = roles.id ORDER BY users.id ASC');
	    return $users_list;
	} 
	public function get_roles()
	{
		$roles_list = $this->dbh->query('SELECT type FROM roles ORDER BY id ASC'); 
		return $roles_list;
	}
	 function get_user($name)
	{
		$user = $this->dbh->prepare('SELECT users.id AS id, name, password, role_id, roles.type AS roletype FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE name = :name'); 
		$user->execute(array('name' => $name));
		return $user->fetch();
	}
	/**
	 * allows admin to set the role_id of a user
	 * @param $role_id
	 */
	public function set_role($user_id, $role_id) {
		$request = $this->dbh->prepare('UPDATE users SET role_id = ? WHERE id = ?');
		$user_role = $request->execute(array($role_id, $user_id));
		return $user_role;
	}
	/**
	 * allows admin to ban a user
	 * @param $id
	 */
	public function ban_user($user_id)
	{
		$request = $this->dbh->prepare('DELETE FROM users WHERE id = ?');
		$deleted_user = $request->execute(array($user_id));
	}

}