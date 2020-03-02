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
	/**
	 * shows all the posts
	 */
	/**
	 * loads the terms and conditions page
	 */
	public function terms_conditions() //loads homepage
	{
		require('view/front/terms_conditions.php');
	}
	public function list_posts()
	{
		$posts = $this->posts->get_posts();
		//$last_comments = $this->comments->get_last_comments();
		require('view/front/posts_list.php');
	}
	/**
	 * shows all article
	 */
	public function list_articles()
	{
		$articles = $this->posts->get_articles($tag_id);
		$post 	  = $this->posts->get_post($post_id);
		$comment  = $this->comments->get_comment($post_id);
		require('view/front/post.php');
	}
	/**
	 * shows one post and its comments
	 */
	public function display_post($post_id)
	{
		$last_posts = $this->posts->get_last_posts();
		$post 	 	= $this->posts->get_post($post_id);
		$comment 	= $this->comments->get_comment($post_id);
		require('view/front/post.php');
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

}
