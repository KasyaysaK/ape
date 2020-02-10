<?php 
session_start();
require_once('controller/controller.php');

class Router
{
	protected $controller;
	//private $session;

	public function __construct()
	{
		$this->controller = new Controller();
		//$this->session = session_start();
	}

	public function request()
	{
		try {
			if (isset($_GET['action'])) {
				switch ($_GET['action']) {
					case 'home':
						$this->controller->home();
						break;
					case 'list_posts' : 
						$this->controller->list_posts();
						break;
					case 'display_post' :
						if (isset($_GET['id']) && $_GET['id'] > 0) {
							$this->controller->display_post();
						}
						else {
							echo 'l\'ariticle n\'existe pas';
						}
						break;
					case 'login':
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
		                	var_dump('session en cours');
		                    $this->controller->signin($_SESSION['username'], $_SESSION['password']);    
		                }
		                else {
		                        echo 'il y a des erreurs';
		                }
		            case 'signout':
		            	$this->controller->signout();
		            	break;
		            case 'dashboard':
		            	$this->controller->dashboard();
		            	break;
		            case 'add_post' :
		            	$this->controller->add_post();
		            	break;
		            case 'publish_post' :
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
		            	$this->controller->post_manager();
		            	break;
		            case 'edit_post' :
		            	$this->controller->edit_post();
		            	break;
		            case 'save_edited_post' :
	            	 	if (!empty ($_POST['title']) && !empty($_POST['content'])) {
		                    $this->controller->save_edited_post($_GET['post_id'], $_POST['title'], $_POST['content']);
			                }
			                else {
			                    require('view/backend/error.php');
			                    throw new Exception('Veuillez écrire l\'article avant de l\'envoyer.');   
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