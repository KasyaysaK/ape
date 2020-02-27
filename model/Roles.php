<?php

//namespace APE\Site\Model;
require_once('model/Database.php');

class Roles extends Database
{
	private $dbh;

	public function __construct() {
		$this->dbh = $this->dbhConnect();
	}
	//public function create_role()
	public function get_roles()
	{
		$roles_list = $this->dbh->query('SELECT id, type, label FROM roles ORDER BY id ASC'); 
		return $roles_list;
	}
	/**
	 * allows admin to ban a user
	 * @param $id
	 */
	//public function delete_role()
}