<?php
require_once('model/Database.php');

class Roles extends Database
{
	private $dbh;

	public function __construct() {
		$this->dbh = $this->dbhConnect();
	}
	
	public function get_roles()
	{
		$roles_list = $this->dbh->query('SELECT id, type, label FROM roles ORDER BY id ASC'); 
		return $roles_list;
	}
}