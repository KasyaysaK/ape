<?php

//namespace APE\Site\Controller;

/**
 * Class Controller
 */
class User_controller
{

	/**
	 * @var $users defines the model managing the users
	 * @var $session starts the session
	 */

	protected $users;

	public function __construct()
	{
		$this->users 	= new Users();
		$this->roles 	= new Roles();
	}

	/**
	 * loads the registration form if the user is not connected
	 */
	public function login() //shows registration form
	{
		if (!isset($_SESSION['name']) || !isset($_SESSION['password'])) {
			require('view/front/login.php');
		}
		else {
			echo "Vous êtes déjà connecté";
		}
	}
	/**
	 * shows the dashboard
	 */
	public function dashboard()
	{
		if(isset($_SESSION['name']) && isset($_SESSION['password'])) {
			require('view/admin/pannel.php');
		}
	}
	/**
	 * saves a new user to the database
	 * @param string $name
	 * @param string $email
	 * @param string $password
	 */
	public function signup($name, $email, $password)
	{
		session_start();
        $name = htmlspecialchars($_POST['name']);
        var_dump($name);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $new_user = $this->users->create_user($name, $email, $password);
		if ($new_user) {
			require('view/front/home.php');
		} else {
			$this->error();
		}
	}

	/**
	 * signs an existing user in
	 * if the password is admin and the role_id is set to 1 -> show admin pannel
	 * else show the profile page
	 * @param string $name
	 * @param string $password
	 */
	public function signin($name, $password)
	{
		session_start();
		if (isset($_POST['signin'])) {

			
			$name = htmlspecialchars($name);
			$password = htmlspecialchars($password);
			$hash = password_hash($password, PASSWORD_BCRYPT);
			
			$user = $this->users->get_user($name);
			if ($user) {
				$_SESSION['name']     = $name;
				$_SESSION['password'] = $password;
				$_SESSION['role'] 	  = $user['roletype'];
				if($_SESSION['password']  && $_SESSION['role'] == 'admin') {
					header('Location: index.php?action=dashboard');;
				}
				else {
					$correct_password = password_verify($password, $user['password']);
					if ($correct_password) {
						header('Location: index.php');
    					exit;
					}
				}
			}
        }
	}

	/**
	 * signs user out
	 */
	public function signout()
	{
		session_start();
		$_SESSION = array();
        session_destroy();
		require('view/front/logout.php');
	}

}
