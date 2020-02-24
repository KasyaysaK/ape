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
	protected $tags;
	protected $comments;

	public function __construct()
	{
		$this->users 	= new Users();
		$this->posts 	= new Posts();
		$this->tags 	= new Tags();
		$this->comments = new Comments();
	}

//****************************************** CONTENT MANAGER ******************************************
	
	/**
	 * loads the homepage page
	 */
	public function home() //loads homepage
	{
		$last_posts = $this->posts->get_last_posts();
		require('view/front/home.php');
	}
	
	/**
	 * loads the about page
	 */
	public function about() //loads homepage
	{
		require('view/front/about.php');
	}
	/**
	 * loads the contact page
	 */
	public function contact() //loads homepage
	{
		require('view/front/contact.php');
	}
	/**
	 * shows all the posts
	 */
	public function list_posts()
	{
		$posts = $this->posts->get_posts();
		$comments = $this->comments->get_last_comments();
		require('view/front/posts_list.php');
	}
	/**
	 * shows one post and its comments
	 */
	public function display_post()
	{
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
		$posts = $this->posts->get_posts();
		require('view/admin/post_manager.php');
	}
	/**
	 * shows all the comments
	 */
	public function list_comments()
	{
		$comment = $this->comments->get_comments();
	}
	/**
	 * shows the flagged comments
	 */
	public function list_flagged_comments()
	{
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
		//if there is a session
		require('view/front/profile.php');
		//else veuillez vous connecter
	}
	/**
	 * shows the dashboard
	 */
	public function dashboard()
	{
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
			if ($user) {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
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
		session_start();
		$_SESSION = array();
        session_destroy();
		require('view/front/logout.php');
	}


//***************************************** BACKOFFICE MANAGER ****************************************

	/**
	 * loads the add post view
	 */
	public function add_post()
	{
		$tags = $this->tags->get_tags();
		require('view/admin/add_post.php');

	}
	/**
	 * loads the add post view
	 */
	public function display_tags()
	{
		require('view/admin/tags.php');
	}
	/**
	 * saves a new tag into the database
	 * @param $name
	 */
	public function add_tag($name)
	{
		$new_tag = $this->tags->create_tag($name);
		if ($new_tag) {
			var_dump($new_tag);
			header('Location: index.php?action=add_post');
    		exit;
		}
		
	}
	/**
	 * saves a new post to the database, status is set to 1 by defaulft (public)
	 * @param $title
	 * @param $content
	 */
	public function save_post($title, $content)
	{
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
		$post_id = $_GET['id'];
	    $post_to_edit = $this->posts->get_post($post_id);
	    require('view/admin/edit_post.php');
	}
	/**
	 * saves edited
	 */
	public function save_edited_post($post_id, $title, $content)
	{
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
		$post 	 = $this->posts->delete_post($post_id);
		//$comment = $this->comments->delete_comment($post_id);
		$this->post_manager();
	}


}
