<?php

//namespace APE\Site\Controller;

/**
 * Class Controller
 */
class Backoffice_controller
{

	/**
	 * @var $users defines the model managing the users
	 * @var $posts defines the model managing the posts
	 * @var $tags defines the model managing the tags
	 * @var $comments defines the model managing the comments
	 */

	protected $users;
	protected $posts;
	protected $tags;
	protected $comments;
	protected $messages;


	public function __construct()
	{
		$this->users 	= new Users();
		$this->roles 	= new Roles();
		$this->posts 	= new Posts();
		$this->tags 	= new Tags();
		$this->comments = new Comments();
		$this->messages = new Messages();

	}

//***************************************** POSTS & COMMENTS *****************************************
	/**
	 * shows all the posts
	 */
	public function post_manager()
	{
		$posts = $this->posts->get_posts();
		$tags  = $this->tags->get_tags();
		require('view/admin/post_manager.php');
	}
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
	public function tag_manager()
	{
		$tags = $this->tags->get_tags();
		require('view/admin/tag_manager.php');
	}
	/**
	 * saves a new tag into the database
	 * @param $name
	 */
	public function add_tag($name)
	{
		$new_tag = $this->tags->create_tag($name);
		if ($new_tag) {
			header('Location: index.php?action=add_post');
    		exit;
		}
		
	}
	/**
	 * saves a new post to the database, status is set to 1 by defaulft (public)
	 * @param $title
	 * @param $content
	 */
	public function save_post($title, $author, $description, $content, $tag_id)
	{
		$new_post = $this->posts->create_post($title, $author, $description, $content, $tag_id);
		if ($new_post) {
			if($_SESSION['role']  && $_SESSION['role'] == 'author') {
				$notice = "L'article a été publié, merci pour votre contribution !";
				require('view/author/pannel.php');
			}
       		if($_SESSION['role']  && $_SESSION['role'] == 'admin') {
				header('Location: index.php?action=posts_manager');
       			exit;
			}
	    }
	}
	/**
	 * get post to edit
	 */
	public function edit_post($post_id)
	{
	    $post_to_edit = $this->posts->get_post($post_id);
	    $tags = $this->tags->get_tags();
	    require('view/admin/edit_post.php');
	}
	/**
	 * saves edited
	 */
	public function save_edited_post($post_id, $title, $author, $description, $content, $tag_id)
	{
	    $update_post = $this->posts->update_post($post_id, $title, $author, $description, $content, $tag_id);
	    if ($update_post === false) {
	    	require('view/front/error.php');
	        echo 'Impossible de mettre à jour l\'article';
	    }
	    else {
	        header('Location: index.php?action=post_manager');
       		echo "post mis à jour";
       		exit;
	    }
	}

	public function remove_post($post_id)
	{
		$post = $this->posts->delete_post($post_id);
		$this->post_manager();
	}

	public function comment_manager()
	{
		$comments = $this->comments->get_comments();
		//$posts    = $this->posts->get_posts();
		require('view/admin/comment_manager.php');
	}
	/**
	 * shows all the comments
	 */
	public function list_comments()
	{
		$comment = $this->comments->get_comments();
	}
	public function unflag_comment($comment_id) 
	{
	    $unflag_comment = $this->comments->validate_comment($comment_id);
	    header('Location: index.php?action=comment_manager');
       		echo "commentaire mis à jour";
       		exit;
	}

	public function delete_comment($comment_id) 
	{
	    $delete_comment = $this->comments->reject_comment($comment_id);
	    header('Location: index.php?action=comment_manager');
       		echo "commentaire mis à jour";
       		exit;
	}

	/**
	 * get post to edit
	 */
	public function edit_comment($comment_id)
	{
	    $comment_to_edit = $this->comments->get_comment($comment_id);
	    require('view/admin/edit_comment.php');
	}

	//***************************************** USERS *****************************************
	/**
	 * shows all the users
	 */
	public function user_manager()
	{
		$users = $this->users->get_users();
		$roles_result = $this->roles->get_roles();
		foreach($roles_result as $result) {
			$roles[] = $result;
		}
		require('view/admin/user_manager.php');
	}
	public function update_role($user_id, $role_id)
	{
		$set_role = $this->users->set_role($user_id, $role_id);
	    if ($set_role === false) {
	        echo 'Impossible de modifer le statut de l\'utilisateur';
	    }
	    else {
	        $this->user_manager();
	    }
	}
	public function ban_user($user_id)
	{
		$ban_user = $this->users->delete_user($user_id);
		header('Location: index.php?action=user_manager');
		echo 'Utilisateur banni';
	}

}
