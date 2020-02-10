<?php

//namespace APE\Site\Model;
require_once('model/Database.php');

class Posts extends Database
{	
	private $dbh;

	public function __construct()
	{
		$this->dbh = $this->dbhConnect();
	}
	/**
	 * selects all the posts
	 * @return $posts_list
	 */
	public function get_posts()
	{
		$posts_list = $this->dbh->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date ASC');
		return $posts_list;
	}
	/**
	 * selects all the posts
	 * @return $posts_list
	 */
	public function get_last_posts()
	{
		$posts_list = $this->dbh->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date dESC LIMIT 0, 3');
		return $posts_list;
	}
	/**
	 * selects one post
	 * @param $id 
	 * @return $post_id
	 */
	public function get_post($post_id)
	{
	    $post = $this->dbh->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
	    $post->execute(array($post_id));
	    return $post->fetch();
	}

	/**
	 * inserts a new post in the database
	 * @param $title
	 * @param $content
	 * @return $new_post
	 */
	public function create_post($title, $content) 
	{
		$request = $this->dbh->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?, ?, NOW())');
		$new_post = $request->execute(array($title, $content));
		return $new_post;
	}

	/**
	 * inserts a new post in the database, to be added : possibility to change the status of the post 0 : draft 1 : public
	 * @param $id
	 * @param $title
	 * @param $content
	 * @param $status
	 * @return $edited_post
	 */
	public function  update_post($post_id, $title, $content)
	{
		$request = $this->dbh->prepare('UPDATE posts set title = ?, content = ? WHERE id = ?');
		$edited_post = $request->execute(array($title, $content, $post_id));
		return $edited_post;
	}
	/**
	 * inserts a new post in the database
	 * @param $id
	 */
	public function delete_post($post_id) 
	{
		$request = $this->dbh->prepare('DELETE FROM posts WHERE id = ?');
		$deleted_post = $request->execute(array($post_id));
	}
}