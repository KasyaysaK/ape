<?php
/**
 * Class User_ontroller
 */
class User_controller
{
	/**
	 * @var $users defines the model managing the users
	 * @var $session starts the session
	 * @var $messages dtefines the model managing the messages
	 */

	protected $users;
	protected $roles;
	protected $messages;

	public function __construct()
	{
		$this->users 	= new Users();
		$this->roles 	= new Roles();
		$this->messages = new Messages();

	}

	/**
	 * loads the registration form if the user is not connected
	 */
	public function login() //shows registration form
	{
		if (!isset($_SESSION['name'])) {
			require('view/front/login.php');
		}
		else {
			echo "Vous êtes déjà connecté";
		}
	}
	/**
	 * shows the admin dashboard
	 */
	public function dashboard()
	{
		if(isset($_SESSION['name'])) {
			$messages = $this->messages->get_messages();
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
        $name 	  = htmlspecialchars($name);
        $email 	  = htmlspecialchars($email);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $new_user = $this->users->create_user($name, $email, $password);
        $role = 'member';
		if ($new_user) {
			$_SESSION['name']     = $name;
			$_SESSION['password'] = $password;
			$_SESSION['role'] 	  = $role;
			$notice	= "Vous pouvez désormais laisser des commentaires et nous contacter ! Nous vous remercions de votre intérêt et vous souhaitons une bonne visite sur notre site !";
			require('view/front/success.php');
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
		$name = htmlspecialchars($name);
		$password = htmlspecialchars($password);
		$hash = password_hash($password, PASSWORD_BCRYPT);
		
		$user = $this->users->get_user($name);
		$correct_password = password_verify($password, $user['password']);
		if ($user) {
			$_SESSION['name']     = $name;
			$_SESSION['password'] = $correct_password;
			$_SESSION['role'] 	  = $user['roletype'];
			if($_SESSION['password'] && $_SESSION['role'] == 'admin') {
				header('Location: index.php?action=dashboard');
			}
			elseif($_SESSION['password'] && $_SESSION['role'] == 'author') {
					$notice	= "Vous êtes bien connecté ! Vous pouvez publier un article dès maintenant !";
					require('view/front/success.php');
			}
			elseif($_SESSION['password']  && $_SESSION['role'] == 'member') {
	 				$notice	= "Vous êtes bien connecté ! Nous vous souhaitons une bonne visite sur notre site !";
					require('view/front/success.php');		
			} else {
				$_SESSION['name'] = null;
				$notice           = "Le pseudo ou le mot de passe est incorrect, veuillez réessayer !";
				require('view/front/fail.php');
			}
		}
		else {
			$notice = "Le pseudo ou le mot de passe est incorrect, veuillez réessayer !";
			require('view/front/fail.php');
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
