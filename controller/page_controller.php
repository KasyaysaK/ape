<?php

//namespace APE\Site\Controller;

/**
 * Class Controller
 */
class Page_controller
{

	/**
	 * @var $posts defines the model managing the posts
	 * @var $tags defines the model managing the tags
	 * @var $comments dtefines the model managing the comments
	 */

	protected $posts;
	protected $tags;
	protected $comments;

	public function __construct()
	{
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
	public function send_message() 
	{
		header('Location: thank_you.php');
		exit;
	}

	/**
	 * loads the terms and conditions page
	 */
	public function terms_conditions() //loads homepage
	{
		require('view/front/terms_conditions.php');
	}
	/**
	 * shows all the posts
	 */
	public function list_posts()
	{
		$posts = $this->posts->get_posts();
		$last_comments = $this->comments->get_last_comments();
		require('view/front/posts_list.php');
	}
	/**
	 * shows all articles
	 */
	public function list_articles()
	{
		$articles = $this->posts->get_articles();
		$last_comments = $this->comments->get_last_comments();
		require('view/front/articles_list.php');
	}
	/**
	 * shows all activities
	 */
	public function list_activities()
	{
		$activities = $this->posts->get_activities();
		$last_comments = $this->comments->get_last_comments();
		require('view/front/activities_list.php');
	}
	/**
	 * shows all articles
	 */
	public function list_recipes()
	{
		$recipes = $this->posts->get_recipes();
		$last_comments = $this->comments->get_last_comments();
		require('view/front/recipes_list.php');
	}
	/**
	 * shows one post and its comments
	 * @param string $post_id
	 */
	public function display_post($post_id)
	{
		$last_posts = $this->posts->get_last_posts();
		$post 	 	= $this->posts->get_post($post_id);
		$comment 	= $this->comments->get_comment($post_id);
		$last_articles = $this->posts->get_last_articles();
		require('view/front/post.php');
	}

	public function add_comment($post_id, $name, $comment)
	{
	    $new_comment = $this->comments->post_comment($post_id, $name, $comment);
	    var_dump($new_comment);

	    if ($new_comment === false) {
	       throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	        header('Location: index.php?action=display_post&id=' . $post_id);
	        exit;
	    }
	}

	public function report_comment($comment_id, $post_id)
	{
	    $flagged_comment = $this->comments->flag_comment($comment_id);

	    if ($flagged_comment === 0) {
	        throw new Exception('Commentaire non signalé');
	        echo 'Le commentaire n\'a pas pu être signalé.';   
	    }
	    else {
	        header('Location: index.php?action=display_post&id=' . $post_id);
	        exit;
	        echo 'commentaire signalé';
	    }
	}
}
