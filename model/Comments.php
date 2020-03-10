<?php
require_once('model/Database.php');

class Comments extends Database
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
	public function get_comments()
	{
		$comments_list = $this->dbh->query('SELECT id, name, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, flagged FROM comments ORDER BY comment_date DESC');
		return $comments_list;
	}
	public function get_last_comments()
	{
		$last_comments_list = $this->dbh->query('SELECT comments.id AS commentid, posts.id as postid, title, post_id, name, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%im%ss\') AS comment_date_fr FROM comments LEFT JOIN posts ON comments.post_id = posts.id ORDER BY comment_date DESC LIMIT 0, 5');
		return $last_comments_list;
	}
	/**
	 * selects comments related to one post
	 * @param $post_id 
	 * @return $comments
	 */
	public function get_comment($comment_id) 
	{
	    $comment = $this->dbh->prepare('SELECT id, name, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE id = ?');
	    $comment->execute(array($comment_id));
	    return $comment;
	}
	/**
	 * inserts a new comment into the database
	 * @param $post_id
	 * @param $name
	 * @param $comment
	 * @return $new_comment
	 */
	public function post_comment($post_id, $name, $comment)
	{
	    $new_comment = $this->dbh->prepare('INSERT INTO comments (post_id, name, comment, comment_date, flagged) VALUES (?, ?, ?, NOW(), 0)');
	    $new_comment->execute(array($post_id, $name, $comment));
	    return $new_comment;
	}
	/**
	 * allows user to flag a comment
	 * @param $comment_id
	 */
	public function flag_comment($comment_id) 
	{
		$flag_comment = $this->dbh->prepare('UPDATE comments SET flagged = 1 WHERE id = ?');
		$flag_comment->execute(array($comment_id));
	}
	/**
	 * selects all flagged comments
	 * @return $flagged
	 */
	public function get_flagged_comments()
	{
		$flagged = $this->dbh->query('SELECT id, name, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE flagged = 1 ORDER BY comment_date DESC');
		return $flagged;
	}
	/**
	 * allows admin to validate a comment
	 * @param $comment_id
	 */
	public function validate_comment($comment_id) {
		$validate_comment = $this->dbh->prepare('UPDATE comments SET flagged = 0 WHERE id = ?');
		$validate_comment->execute(array($comment_id));
	}
	/**
	 * allows admin to delete a comment
	 * @param $comment_id
	 */
	public function reject_comment($comment_id) {
		$reject_comment = $this->dbh->prepare('DELETE FROM comments WHERE id = ?');
		$reject_comment->execute(array($comment_id));
	}
}