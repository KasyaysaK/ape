<?php

//namespace APE\Site\Model;
require_once('model/Database.php');

class Messages extends Database
{
	private $dbh;

	public function __construct()
	{
		$this->dbh = $this->dbhConnect();
	}
	/**
	 * selects all the comments
	 * @return $comments
	 */
	public function get_messages()
	{
		$messages_list = $this->dbh->query('SELECT id, name, email, message, DATE_FORMAT(message_date, \'%d/%m/%Y à %Hh%i\') AS message_date_fr FROM messagess ORDER BY message_date DESC');
		return $$messages_list;
	}
}