<?php

//namespace APE\Site\Model;
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
		$comments_list = $this->dbh->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, flagged FROM comments ORDER BY comment_date DESC');
		return $comments_list;
	}
	public function get_last_comments()
	{
		$last_comments_list = $this->dbh->query('SELECT comments.id, posts.id as postid, title, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments LEFT JOIN posts ON comments.post_id = posts.id ORDER BY comment_date DESC LIMIT 0, 5');
		return $last_comments_list;
	}
	/**
	 * selects comments related to one post
	 * @param $post_id 
	 * @return $comments
	 */
	public function get_comment($post_id) 
	{
	    $comments = $this->dbh->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
	    $comments->execute(array($post_id));
	    return $comments;
	}
	/**
	 * inserts a new comment into the database
	 * @param $post_id
	 * @param $author
	 * @param $comment
	 * @return $new_comment
	 */
	public function postComment($post_id, $author, $comment)
	{
	    $new_comment = $this->dbh->prepare('INSERT INTO comments (post_id, author, comment, comment_date, flagged) VALUES (?, ?, ?, NOW(), 0)');
	    $new_comment->execute(array($post_id, $author, $comment));
	    return $new_comment;
	}
	/**
	 * allows user to flag a comment
	 * @param $comment_id
	 */
	public function flag_comment($comment_id) {
		$flag_comment = $this->dbh->prepare('UPDATE comments SET flagged = 1 WHERE id = ?');
		$flag_comment->execute(array($comment_id));
	}
	/**
	 * selects all flagged comments
	 * @return $flagged
	 */
	public function get_flagged_comments()
	{
		$flagged = $this->dbh->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE flagged = 1 ORDER BY comment_date DESC');
		return $flagged;
	}
	/**
	 * allows admin to validate a comment
	 * @param $comment_id
	 */
	public function validate_comment($comment_id) {
		$validateComment = $this->dbh->prepare('UPDATE comments SET flagged = 0 WHERE id = ?');
		$validateComment->execute(array($commentId));
	}
	/**
	 * allows admin to delete a comment
	 * @param $comment_id
	 */
	public function reject_comment($comment_id) {
		$rejectComment = $this->dbh->prepare('DELETE FROM comments WHERE id = ?');

		$rejectComment->execute(array($comment_id));
	}
}