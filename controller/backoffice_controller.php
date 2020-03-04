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

	public function __construct()
	{
		$this->users 	= new Users();
		$this->roles 	= new Roles();
		$this->posts 	= new Posts();
		$this->tags 	= new Tags();
		$this->comments = new Comments();
	}

//***************************************** POSTS & COMMENTS *****************************************
	/**
	 * shows all the posts
	 */
	public function post_manager()
	{
		$posts = $this->posts->get_posts();
		$tags = $this->tags->get_tags();
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
	public function display_tags()
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
	public function save_post($title, $description, $content, $tag_id)
	{
		$new_post = $this->posts->create_post($title, $description, $content, $tag_id);
		if ($new_post) {
       		header('Location: index.php?action=post_manager');
       		echo "post crée";
       		exit;
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
	public function save_edited_post($post_id, $title, $description, $content, $tag_id)
	{
	    $update_post = $this->posts->update_post($post_id, $title, $description, $content, $tag_id);
	    if ($update_post === false) {
	        echo 'Impossible de mettre à jour le chapitre';
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
		//$comment = $this->comments->delete_comment($post_id);
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
		$roles = $this->roles->get_roles();
		require('view/admin/user_manager.php');
	}
	public function update_role($user_id, $role_id)
	{
		$set_role = $this->users->set_role($user_id, $role_id);
	    if ($set_role === false) {
	        echo 'Impossible de mettre à jour le chapitre';
	    }
	    else {
	        $this->user_manager();
	    }
	}

}
