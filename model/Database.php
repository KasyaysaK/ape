<?php 
class Database
{
//		private $host = host;
//		private $dbname = dbname;
//		private $username = username;
//		private $password = password;

	protected function dbhConnect()
	{	
		 $configs = require_once('config.php');
                    $host		= host;
                    $dbname		= dbname;
                    $username	=  username;
                    $password 	= password;

            $dbh = new \PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',''.$username.'',''.$password.'');
        
    	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbh;	 
	}
}