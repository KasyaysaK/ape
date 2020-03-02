<?php
require_once('controller/controller.php');

class Router
{
	protected $controller;

	public function __construct()
	{
		$this->controller = new Controller();
	}
	public function request()
	{
		try {
			if (isset($_GET['action'])) {
				switch ($_GET['action']) {
					case 'home':
						session_start();
						$this->controller->home();
						break;
					case 'about':
						session_start();
						$this->controller->about();
						break;
					case 'contact':
						session_start();
						$this->controller->contact();
						break;
					case 'terms_conditions':
						session_start();
						$this->controller->terms_conditions();
						break;
					case 'list_posts' :
						session_start();
						$this->controller->list_posts();
						break;
					case 'display_post' :
						session_start();
						if (isset($_GET['id']) && $_GET['id'] > 0) {
							$this->controller->display_post($_GET['id']);
						}
						else {
							echo 'l\'article n\'existe pas';
						}
						break;
					case 'login':
						session_start();
						$this->controller->login();
						break;
					case 'signup':
						if (!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['password']))
						{
							$this->controller->signup($_POST['name'], $_POST['email'], $_POST['password']);
						}
						break;
					case 'signin':
						if (!isset($_SESSION['name']) || !isset($_SESSION['password'])) {
								if(!empty($_POST['name']) || !empty($_POST['password'])) {
									$this->controller->signin($_POST['name'], $_POST['password']);
								}
								else {
									echo 'veuillez remplir le formulaire';
								}
		                }
		                elseif (isset($_SESSION['name']) && (isset($_SESSION['password']))) {
		                    $this->controller->signin($_SESSION['name'], $_SESSION['password']);
		                }
		                else {
		                        echo 'il y a des erreurs';
						}
						break;
		            case 'signout':
		            	$this->controller->signout();
		            	break;
					case 'dashboard':
						session_start();
		            	$this->controller->dashboard();
		            	break;
					case 'add_post' :
						session_start();
		            	$this->controller->add_post();
		            	break;
		            case 'add_tag' :
		            	session_start();
		            	if (!empty ($_POST['tag-name'])) {
		            		$this->controller->add_tag($_POST['tag-name']);
		            		//$this->controller->add_post();	
		            	} 
		            	else {
		            		echo "tag non crée";
		            		$this->controller->add_post();
		            	}
		            	break;
		            case 'display_tags' : 
		            	session_start();
		            	$this->controller->display_tags();
		            	break;
					case 'publish_post' :
						session_start();
		            	if (!empty ($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content']) && !empty($_POST['tag_id'])) {
				       		echo "post crée";
		                    $this->controller->save_post($_POST['title'], $_POST['description'], $_POST['content'], $_POST['tag_id']);
		                }
		                else {
		                    header('Location: index.php');
				       		echo "post non crée";
				       		exit;
		                }
		                break;
					case 'post_manager' :
						session_start();
		            	$this->controller->post_manager();
		            	break;
					case 'edit_post' :
						session_start();
		            	$this->controller->edit_post($_GET['id']);
		            	break;
					case 'save_edited_post' :
						var_dump('ici');
						session_start();
	            	 	if (!empty ($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content']) && !empty($_POST['tag_id'])) {
		                    $this->controller->save_edited_post($_GET['post_id'], $_POST['title'], $_POST['description'], $_POST['content'], $_POST['tag_id']);
			                }
			                else {
			                    require('view/backend/error.php');
			                    throw new Exception('Veuillez écrire l\'article avant de l\'envoyer.');
			                }
			            break;
					case 'remove_post' :
						session_start();
			        	if(isset($_GET['post_id'])) {
		                  	$this->controller->remove_post($_GET['post_id']);
		                } else {
		                  	throw new Exception('L\'article n\'a pas été supprimé');
		                }
		                break;
		            case 'user_manager' :
		            	session_start();
		            	$this->controller->user_manager();
		            	break;
		            case 'update_role' :
		            	session_start();
		            	$this->controller->update_role($_GET['id'], $_POST['role_id']);
		            	break;
				}
			}
			else {
				$this->controller->home();
			}
		}
		catch(Exception $e)
					{
					    $errorMessage = $e->getMessage();
					}
}
}