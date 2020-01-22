<?php 

	namespace APE\Site\Model;

	class Database
	{
		protected function dbhConnect()
		{
	        $dbh = new \PDO('mysql:host=localhost;dbname=ape;charset=utf8', 'root', '');
	        
	        return $dbh;	 
		}
	}