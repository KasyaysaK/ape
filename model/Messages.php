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
	 * inserts a new post in the database
	 * @param $title
	 * @param $content
	 * @return $new_post
	 */
	public function send_message($name, $email, $message) 
	{
		$request = $this->dbh->prepare('INSERT INTO messages (name, email, message, message_date) VALUES (?, ?, ?, NOW())');
		$new_message = $request->execute(array($name, $email, $message));
		return $new_message;
	}
	/**
	 * selects all the comments
	 * @return $comments
	 */
	public function get_messages()
	{
		$messages_list = $this->dbh->query('SELECT name, email, message, DATE_FORMAT(message_date, \'%d/%m/%Y à %Hh%i\') AS message_date_fr FROM messages ORDER BY message_date DESC');
		return $messages_list;
	}
}