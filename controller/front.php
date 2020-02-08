<?php
	
	//namespace APE\Site\Model;

	//passer les require_once dans autoload
	//passer le code en POO
	//créer une fonction pour ob_start

class Controller 
{
	protected $users;
	protected $posts;
	public function __construct() 
	{
		$this->users = new Users();
		$this->posts = new Posts();
	}
	public function session() // public public function __construct() -> is part of the constructor, avoids calling for the 						public function everytime
	{
		session_start();
	}
	public function home() //loads homepage
	{
		/*
		 * if user is not connected -> show button "login"
		* if user is connected 	-> show "hello $user instead of button"
		*/
		require('view/front/home.php');
	}
	public function signup() //shows registration form
	{
		$this->session(); 
		if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
			require('view/front/signup.php');
		}
	}
	public function signin($username, $password)
	{
		if (isset($_POST['signin'])) {
			var_dump('on rentre dans le contrôleur');
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);
			var_dump($username);
			var_dump($password);
			$user = new Users(); // namespace \APE\Site\Model\
			$signin = $user->getUSer($username, $password);
			var_dump($signin);
			if ($signin) {
			var_dump('instanciation ok');
				$this->session();
				$_SESSION['username'] = htmlspecialchars($_POST['username']);
				$_SESSION['password'] = htmlspecialchars($_POST['password']);
				$hash = password_hash($password, PASSWORD_DEFAULT);
				if($_SESSION['password'] && $_SESSION['password'] = password_verify('admin', $hash)) {
					var_dump('administrateur');
					require('view/admin/pannel.php');
				} 
				else {
					var_dump('utilisateur');
					require('view/front/profile.php');
				}
			}
			$_SESSION['username'] = htmlspecialchars($_POST['username']);
        }		
	}
	public function signout() //logs user out
	{
		session(); // to remove in OOP
		$_SESSION = array();
		session_destroy();
		header('Location: index.php');
		exit;
	}
	//public function newUser($child_firstname, $child_lastname, $email, $password) // saves user to the database
	public function create_user($username, $email, $password) // saves user to the database
	{
		if (isset($_POST['signup'])) {
			$username 		= htmlspecialchars($_POST['username']);
			$email 		= htmlspecialchars($_POST['email']);
			$password 	= password_hash($_POST['password'], PASSWORD_BCRYPT);

			$new_user = $this->users->createUser($username, $email, $password);
			}
		if ($new_user) {
			require('view/front/profile.php');
		}
		else {
			echo 'erreur :(';
		}
			
	}
}

	

//require_once('model/Users.php');
//	
	//public function session() // public public function __construct() -> is part of the constructor, avoids calling for the 						public function everytime
//	{
//		session_start();
//	}
//	public function home() //loads homepage
//	{
//		session(); // to remove in OOP
//		/*
//		 * if user is not connected -> show button "login"
//		* if user is connected 	-> show "hello $user instead of button"
//		*/
//		require('view/front/home.php');
//	}
//	public function signup() //shows registration form
//	{
//		session(); 
//		if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
//			require('view/front/signup.php');
//		}
//	}
//	public function signin($username, $password)
//	{
//		if (isset($_POST['signin'])) {
//			var_dump('on rentre dans le contrôleur');
//			$username = htmlspecialchars($_POST['username']);
//			$password = htmlspecialchars($_POST['password']);
//			var_dump($username);
//			var_dump($password);
//			$user = new Users(); // namespace \APE\Site\Model\
//			$signin = $user->getUSer($username, $password);
//			var_dump($signin);
//			if ($signin === TRUE) {
//			var_dump('instanciation ok');
//				session();
//				$_SESSION['username'] = htmlspecialchars($_POST['username']);
//				$_SESSION['password'] = htmlspecialchars($_POST['password']);
//				$hash = password_hash($password, PASSWORD_DEFAULT);
//				if($_SESSION['password'] && $_SESSION['password'] = password_verify('admin', $hash)) {
//					var_dump('administrateur');
//					require('view/admin/pannel.php');
//				} 
//				else {
//					var_dump('utilisateur');
//					require('view/front/profile.php');
//				}
//			}
//			$_SESSION['username'] = htmlspecialchars($_POST['username']);
//        }		
//	}
//	public function signout() //logs user out
//	{
//		session(); // to remove in OOP
//		$_SESSION = array();
//		session_destroy();
//		header('Location: index.php');
//		exit;
//	}
//	//public function newUser($child_firstname, $child_lastname, $email, $password) // saves user to the database
//	public function registerUser($username, $email, $password) // saves user to the database
//	{
//		$users = new Users;
//		$newUser = $users->registerUser($username, $email, $password);
//		
//		if (isset($_POST['signup'])) {
//			$user 	= htmlspecialchars($_POST['user']);
//			$email 		= htmlspecialchars($_POST['email']);
//			$password 		= password_hash($_POST['password'], PASSWORD_BCRYPT);
//			}
//		if ($newUser) {
//		echo $user . " " . $email . " " . $password;
//		$userManager = new \APE\Site\Model\Users();
//		$newUser = $userManager->registerUser($user, $email, $password);
//		}
//		if ($newUser === false) {
//			echo 'erreur :(';
//		}
//		else {
//			require('view/front/profile.php');
//		}
//	}

