<?
	namespace APE\Site\Model;
	require_once('model/Manager.php');

	class UserManager extends Manager
	{
		function registerUser($child_firstname, $child_lastname, $email, $password)
		{
			$dbh = $this->dbhConnect();

			$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$newUser = $dbh->prepare('INSERT INTO users (child_firstname, $child_lastname, email, password) VALUES (?, ?, ?, ?)');

			return $newUser->execute(array($child_name, $email, $password)); 
		}

		function getUser($email, $password)
		{
			$dbh = $this->$dbh->dbhConnect();
			$user = prepare('SELECT id, email FROM users WHERE email = :email'); 
			$user->execute(array('email' => $email));

			return $user->fetch();
		}
		
	}