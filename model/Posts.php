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
		public function create_post($title, $content) 
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?, ?, NOW())');
			$newPost = $request->execute(array($title, $content));

			return $newPost;
		}

	}