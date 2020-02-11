<?php
	
//namespace APE\Site\Controller;

/**
 * Class Controller 
 */	
class Controller 
{

	/**
	 * @var $users defines the model managing the users
	 * @var $posts defines the model managing the posts
	 * @var $session starts the session
	 */	

	protected $users;
	protected $posts;
	protected $comments;
	//protected $session;

	public function __construct() 
	{
		var_dump($_SESSION);
		$this->users 	= new Users();
		$this->posts 	= new Posts();
		$this->comments = new Comments();
		//$this->session 	= session_start();
	}

//****************************************** CONTENT MANAGER ******************************************
	/**
	 * loads the homepage view
	 */
	public function home() //loads homepage
	{
		//$this->start_session(); 
		$last_posts = $this->posts->get_last_posts();
		require('view/front/home.php');
	}
	/**
	 * shows all the posts
	 */
	public function list_posts()
	{
		var_dump($_SESSION);
		////$this->start_session(); 
		$posts = $this->posts->get_posts();
		$comments = $this->comments->get_last_comments();
		require('view/front/posts_list.php');
	}
	/**
	 * shows one post and its comments
	 */
	public function display_post()
	{
		//$this->start_session(); 
		$last_posts = $this->posts->get_last_posts();		
		$post_id = $_GET['id'];
		$post 	 = $this->posts->get_post($post_id);
		$comment = $this->comments->get_comment($post_id);
		require('view/front/post.php');
	}
	/**
	 * shows all the posts
	 */
	public function post_manager()
	{
		//$this->start_session(); 
		$posts = $this->posts->get_posts();
		require('view/admin/post_manager.php');
	}	
	/**
	 * shows all the comments
	 */
	public function list_comments()
	{
		//$this->start_session(); 
		$comment = $this->comments->get_comments();
	}
	/**
	 * shows the flagged comments
	 */
	public function list_flagged_comments()
	{
		//$this->start_session(); 
		$comment = $this->comments->get_comments();
	}
	/**
	 * shows user profile and comments
	 */
	//public function get_user() 


	//************************************** LOGIN MANAGER ***************************************

	/**
	 * loads the registration form if the user is not connected
	 */
	public function login() //shows registration form
	{
		if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
			$this->session;
			require('view/front/login.php');
		}
		else {
			echo "Vous êtes déjà connecté";
		}
	}
	/**
	 * shows user's profile
	 * @param $user_id
	 */
	public function profile($user_id)
	{
		//$this->start_session(); 
		//if there is a session
		require('view/front/profile.php');
		//else veuillez vous connecter
	}
	/**
	 * shows the dashboard
	 */
	public function dashboard()
	{
		//$this->start_session(); 
		if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
			require('view/admin/pannel.php');
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
		session_start();
		if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-confirm'])) {
            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-confirm'])) {
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $new_user = $this->users->create_user($username, $email, $password);
				if ($new_user) {
					require('view/front/profile.php');
				}
				else {
					echo 'erreur :(';
				}
			}
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
		session_start();
		if (isset($_POST['signin'])) {
			
			$username = htmlspecialchars($username);
			$password = htmlspecialchars($password);
			$hash = password_hash($password, PASSWORD_BCRYPT);

			$user = $this->users->get_user($username);
			var_dump($user);
		 	if ($user) {
	            $_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				var_dump($_SESSION);
				if($_SESSION['password'] && $_SESSION['password'] == password_verify('admin', $hash)) {
					require('view/admin/pannel.php');
				} 
				else {
					$correct_password = password_verify($password, $user['password']);
					if ($correct_password) {
						require('view/front/profile.php');
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
        session_destroy();
		require('view/front/logout.php');
	}


//***************************************** BACKOFFICE MANAGER ****************************************

	/**
	 * loads the add post view
	 */
	public function add_post()
	{
		//$this->start_session(); 
		require('view/admin/add_post.php');
	}
	/**
	 * saves a new post to the database, status is set to 1 by defaulft
	 * @param $title
	 * @param $content
	 */
	public function save_post($title, $content) 
	{
		//$this->start_session(); 
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
	 * get post to edit
	 */
	public function edit_post() 
	{
		//$this->start_session(); 
		$post_id = $_GET['id'];
	    $post_to_edit = $this->posts->get_post($post_id);
	    require('view/admin/edit_post.php');
	}
	/**
	 * saves edited 
	 */
	public function save_edited_post($post_id, $title, $content)
	{
		//$this->start_session(); 
	    $update_post = $this->posts->update_post($post_id, $title, $content);

	    if ($update_post === false) {
	        echo 'Impossible de mettre à jour le chapitre';
	    }
	    else {
	        $this->post_manager();
	    }
	}

	/**
	 *allows admin/author to publish a post on the website when status is set to 0
	 * @param $title
	 * @param $content
	 * @param $status
	 */
	//public function publish_post($title, $content, $status)
	
	public function remove_post($post_id)
	{
		//$this->start_session(); 
		$post 	 = $this->posts->delete_post($post_id);
		//$comment = $this->comments->delete_comment($post_id);
		$this->post_manager();
	}
		

}
