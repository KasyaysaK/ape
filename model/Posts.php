<?php

	//namespace APE\Site\Model;
	require_once('model/Database.php');

	class Posts extends Database
	{
		public function getPosts()
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date ASC');

			return $request;
		}

	}