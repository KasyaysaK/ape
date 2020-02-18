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
				var_dump($_GET['action']);
				switch ($_GET['action']) {
					case 'home':
						session_start();
						$this->controller->home();
						break;
					case 'about':
						session_start();
						$this->controller->about();
						break;
					case 'list_posts' :
						session_start();
						$this->controller->list_posts();
						break;
					case 'display_post' :
						session_start();
						if (isset($_GET['id']) && $_GET['id'] > 0) {
							$this->controller->display_post();
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
						if (!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['password']))
						{
							$this->controller->signup($_POST['username'], $_POST['email'], $_POST['password']);
						}
						break;
					case 'signin':
						if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
								if(!empty($_POST['username']) || !empty($_POST['password'])) {
									$this->controller->signin($_POST['username'], $_POST['password']);
								}
								else {
									echo 'veuillez remplir le formulaire';
								}
		                }
		                elseif (isset($_SESSION['username']) && (isset($_SESSION['password']))) {
		                    $this->controller->signin($_SESSION['username'], $_SESSION['password']);
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
					case 'publish_post' :
						session_start();
		            	if (!empty ($_POST['title']) && !empty($_POST['content'])) {
				       		echo "post crée";
		                    $this->controller->save_post($_POST['title'], $_POST['content']);
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
		            	$this->controller->edit_post();
		            	break;
					case 'save_edited_post' :
						session_start();
	            	 	if (!empty ($_POST['title']) && !empty($_POST['content'])) {
		                    $this->controller->save_edited_post($_GET['post_id'], $_POST['title'], $_POST['content']);
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