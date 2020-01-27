<?php 

	namespace APE\Site\Model;
	$configs = include('config.php');


	class Database
	{
		protected function dbhConnect()
		{	
			$host	= $configs['host'];
			$dbname	= $configs['dbname'];

	        $dbh = new \PDO('mysql:host={$host};dbname={$dbname};charset=utf8',$configs['username'],$configs['password']);
	        
	        return $dbh;	 
		}
	}