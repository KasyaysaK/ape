<?php
	
//namespace APE\Site\Controller;

/**
 * Class Controller 
 * 
 */	

class Controller 
{

	/**
	 * @var defines the model managing the users
	 * @var defines the model managing the posts
	 */	

	protected $users;
	protected $posts;
	protected $ession;



	public function __construct() 
	{
		$this->users = new Users();
		$this->posts = new Posts();
		$this->session = session_start();
	}

	/**
	 * loads the homepage view
	 */

	public function home() //loads homepage
	{
		//$this->session;
		require('view/front/home.php');
	}

	//************************************** LOGIN MANAGER ***************************************

	/**
	 * loads the registration form if the user is not connected
	 */
	public function login() //shows registration form
	{
		//$this->session; 
		if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
			$this->session;
			require('view/front/login.php');
		}
		else {
			echo "Vous êtes déjà connecté";
		}
	}

	/**
	 * saves a new user to the database
	 * @param string $username
	 * @param string $email
	 * @param string $password 
	 */
	public function signup($username, $email, $password) 
	{
		//$this->session;
		if (isset($_POST['signup'])) {
			$username 		= htmlspecialchars($_POST['username']);
			$email 		= htmlspecialchars($_POST['email']);
			$password 	= password_hash($_POST['password'], PASSWORD_BCRYPT);
			$new_user = $this->users->create_user($username, $email, $password);
			}
		if ($new_user) {
			$this->session;
			require('view/front/profile.php');
		}
		else {
			echo 'erreur :(';
		}			
	}

	/**
	 * signs an existing user in
	 * if the password is admin and the role_id is set to 1 -> show admin pannel 
	 * else show the profile page
	 * @param string $username
	 * @param string $password 
	 */
	public function signin($username, $password)
	{
		//$this->session;
		if (isset($_POST['signin'])) {

			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);
			$signin = $this->users->get_uSer($username, $password);
			if ($signin) {
				$this->session;
				$_SESSION['username'] = htmlspecialchars($_POST['username']);
				$_SESSION['password'] = htmlspecialchars($_POST['password']);
				$hash = password_hash($password, PASSWORD_DEFAULT);
				if($_SESSION['password'] && $_SESSION['password'] = password_verify('admin', $hash)) {
					require('view/admin/pannel.php');
				} 
				else {
					$this->session;
					require('view/front/profile.php');
				}
			}
        }		
	}

	/**
	 * signs user out
	 */
	public function signout()
	{		
		session_destroy();
		header('Location: index.php');
		exit;
	}

//****************************************** CONTENT MANAGER ******************************************
	/**
	 * shows all the posts
	 */
	//public function list_posts()

	/**
	 * shows one post
	 */
	//public function get_post()

	/**
	 * shows all the comments
	 */
	//public function list_comments()

	/**
	 * shows all the posts
	 * @param post_id
	 */
	//public function get_comments(post_id)

	/**
	 * shows user profile
	 */
	//public function get_user() 

	/**
	 * shows user's comment
	 */
	//public function get_user_comments()


//***************************************** BACKOFFICE MANAGER ****************************************

	/**
	 * loads the add post view
	 */
	public function add_post() {
		require('view/admin/add_post.php');
	}

	/**
	 * saves a new post to the database, status is set to 1 by defaulft
	 * @param $title
	 * @param $content
	 */
	public function save_post($title, $content) {
		$new_post = $this->posts->create_post($title, $content);
		if ($new_post) {
       		header('Location: index.php');
       		echo "post crée";
       		exit;
	    }
	    else {
	       	header('Location: index.php');
       		echo "post non crée";
       		exit;
	    }
	}

	/**
	 *allows admin/author to publish a post on the website when status is set to 0
	 * @param $title
	 * @param $content
	 * @param $status
	 */
	//public function publish_post($title, $content, $status)

	/**
	 *allows admin/author to edit a post
	 * @param $title
	 * @param $content
	 * @param $status
	 */
	//public function edit_post($title, $content, $status)

	
	//public function delete_post()


}
