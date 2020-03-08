<?php

require_once('controller/page_controller.php');
require_once('controller/user_controller.php');
require_once('controller/backoffice_controller.php');

class Router
{
	protected $page_controller;
	protected $user_controller;
	protected $backoffice_controller;

	public function __construct()
	{
		$this->page_controller = new Page_controller();
		$this->user_controller = new User_controller();
		$this->backoffice_controller = new Backoffice_controller();

	}
	public function request()
	{
		try {
			if (isset($_GET['action'])) {
				switch ($_GET['action']) {
					case 'home':
						session_start();
						$this->page_controller->home();
						break;
					case 'about':
						session_start();
						$this->page_controller->about();
						break;
					case 'contact':
						session_start();
						$this->page_controller->contact();
						break;
					case 'send_message' :
						session_start();
						if (isset($_POST['send_message'])) {
						    
						    }
						break;
					case 'author' :
						session_start();
						$this->page_controller->author();
						break;
					case 'terms_conditions':
						session_start();
						$this->page_controller->terms_conditions();
						break;
					case 'list_posts' :
						session_start();
						$this->page_controller->list_posts();
						break;		
					case 'list_articles' : 
						session_start();
						$this->page_controller->list_articles();
						break;
					case 'list_activities' : 
						session_start();
						$this->page_controller->list_activities();
						break;
					case 'list_recipes' : 
						session_start();
						$this->page_controller->list_recipes();
						break;
					case 'display_post' :
						session_start();
						if (isset($_GET['id']) && $_GET['id'] > 0) {
							$this->page_controller->display_post($_GET['id']);
						}
						else {
							echo 'l\'article n\'existe pas';
						}
						break;
					case 'add_comment' :
						session_start();
		                if (isset($_GET['id']) && $_GET['id'] > 0) {
		                    if (!empty($_POST['comment'])) {
		                        $this->page_controller->add_comment($_GET['id'], $_POST['username'], $_POST['comment']);
		                    }
		                }
		                else {
		                    throw new Exception('L\'identifiant de billet n\'existe pas.');
		                }
		                break;
		            case 'report_comment' :
		            	session_start();
		            	if (isset ($_GET['post_id']) && isset ($_GET['comment_id'])) {
		                    $this->page_controller->report_comment($_GET['comment_id'], $_GET['post_id']);
		                    echo 'commentaire signalé!';
		                }
               	 		break;
					case 'login':
						session_start();
						$this->user_controller->login();
						break;
					case 'signup':
						if (!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['password']))
						{
							$this->user_controller->signup($_POST['name'], $_POST['email'], $_POST['password']);
						} 
						else 
						{
							$this->page_controller->error();
						}
						break;
					case 'signin':
						if (!isset($_SESSION['name']) || !isset($_SESSION['password'])) {
								if(!empty($_POST['name']) || !empty($_POST['password'])) {
									$this->user_controller->signin($_POST['name'], $_POST['password']);
								}
								else {
									echo 'veuillez remplir le formulaire';
								}
		                }
		                elseif (isset($_SESSION['name']) && (isset($_SESSION['password']))) {
		                    $this->user_controller->signin($_SESSION['name'], $_SESSION['password']);
		                }
						break;
		            case 'signout':
		            	$this->user_controller->signout();
		            	break;
					case 'dashboard':
						session_start();
		            	$this->user_controller->dashboard();
		            	break;
	            	case 'author_pannel' :
		            	session_start();
		            	$this->backoffice_controller->author_pannel();
		            	break;
					case 'add_post' :
						session_start();
		            	$this->backoffice_controller->add_post();
		            	break;
		            case 'add_tag' :
		            	session_start();
		            	if (!empty ($_POST['tag-name'])) {
		            		$this->backoffice_controller->add_tag($_POST['tag-name']);
		            	} 
		            	else {
		            		echo "tag non crée";
		            		$this->backoffice_controller->add_post();
		            	}
		            	break;
		            case 'tag_manager' : 
		            	session_start();
		            	$this->backoffice_controller->tag_manager();
		            	break;
					case 'publish_post' :
						session_start();
		            	if (!empty ($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content']) && !empty($_POST['tag_id'])) {
		                    $this->backoffice_controller->save_post($_POST['title'], $_POST['author'], $_POST['description'], $_POST['content'], $_POST['tag_id']);
		                }
		                else {
		                    header('Location: index.php?action=add_post');
				       		echo "post non crée";
				       		exit;
		                }
		                break;
					case 'post_manager' :
						session_start();
		            	$this->backoffice_controller->post_manager();
		            	break;
					case 'edit_post' :
						session_start();
		            	$this->backoffice_controller->edit_post($_GET['id']);
		            	break;
					case 'save_edited_post' :
						session_start();
	            	 	if (!empty ($_POST['title']) && !empty($_POST['author']) && !empty($_POST['description']) && !empty($_POST['content']) && !empty($_POST['tag_id'])) {
		                    $this->backoffice_controller->save_edited_post($_GET['post_id'], $_POST['title'], $_POST['author'], $_POST['description'], $_POST['content'], $_POST['tag_id']);
			                }
			                else {
			                    throw new Exception('Veuillez écrire l\'article avant de l\'envoyer.');
			                }
			            break;
					case 'remove_post' :
						session_start();
			        	if(isset($_GET['post_id'])) {
		                  	$this->backoffice_controller->remove_post($_GET['post_id']);
		                } else {
		                  	throw new Exception('L\'article n\'a pas été supprimé');
		                }
		                break;
		            case 'comment_manager' : 
		            	session_start();
		            	$this->backoffice_controller->comment_manager();
		            	break;
		           	case 'unflag_comment' :
		            	session_start();
	                    if (isset ($_GET['id'])) {
	                        $this->backoffice_controller->unflag_comment($_GET['id']);
	                    }
	                    else {
	                    throw new Exception('L\'identifiant de billet n\'existe pas.');
	               	 	}
	               	 	break;
		           	case 'edit_comment' :
						session_start();
		            	$this->backoffice_controller->edit_comment($_GET['id']);
		            	break;
		            case 'delete_comment' :
		            	session_start();
		                if (isset ($_GET['id'])) {
		                        $this->backoffice_controller->delete_comment($_GET['id']);
		                    }
		                    else {
		                    throw new Exception('L\'identifiant de billet n\'existe pas.');
		                }
                		break;
		            case 'user_manager' :
		            	session_start();
		            	$this->backoffice_controller->user_manager();
		            	break;
		            case 'update_role' :
		            	session_start();
		            	$this->backoffice_controller->update_role($_GET['id'], $_POST['role_id']);
		            	break;
		            case 'ban_user' :
		            	session_start();
		            	if (isset($_GET['id'])) {
		            		$this->backoffice_controller->ban_user($_GET['id']);
		            	} else {
		            		var_dump('la');
		                    throw new Exception('L\'identifiant d\'utilisateur n\'existe pas.');
		            	}
		            	break;
				}
			}
			else {
				$this->page_controller->home();
			}
		}
		catch(Exception $e)
					{
					    $errorMessage = $e->getMessage();
					}
}
}