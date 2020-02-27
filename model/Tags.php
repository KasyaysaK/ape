<?php

//labelspace APE\Site\Model;
require_once('model/Database.php');

class Tags extends Database
{
private $dbh;

public function __construct() {
	$this->dbh = $this->dbhConnect();
}
public function create_tag($label)
{ 
	$request = $this->dbh->prepare('INSERT INTO tags (label) VALUES (?)');
	$new_tag = $request->execute(array($label)); 
	return $new_tag;
}
public function get_tags()
	{
	    $tags_list = $this->dbh->query('SELECT id, label FROM tags ORDER BY id ASC');
	    return $tags_list;
	}
}