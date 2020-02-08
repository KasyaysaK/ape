<?php

	require_once('Router.php');
	require('autoload.php');
	$router = new Router();
	$router->request();
	ob_start();
	$content = ob_get_clean();

//require('controller/front.php');
//try {
//	if (isset($_GET['action'])) {
//		switch ($_GET['action']) {
//			case 'home':
//			var_dump('ici');
//				home();
//				break;
//			case 'signup':
//				signup();
//				break;
//			case 'registerUser':
//				if (!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['password'])) 
//				{
//					registerUser($_POST['username'], $_POST['email'], $_POST['password']);
//				}
//				else {
//					echo 'Veuillez remplir tous les champs.';
//				}
//				break;
//			case 'signin':
//				if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
//						var_dump('pas de session');
//						if(!empty($_POST['username']) || !empty($_POST['password'])) {
//							signin($_POST['username'], $_POST['password']);
//						}
//						else {
//							echo 'veuillez remplir le formulaire';
//						}                       
//                }
//                elseif (isset($_SESSION['username']) && (isset($_SESSION['password']))) {
//                	var_dump('session en cours');
//                    signin($_SESSION['username'], $_SESSION['password']);    
//                }
//                else {
//                        echo 'il y a des erreurs';
//                }
//		}
//	}
//	else {
//		home();
//	}
//}
//catch(Exception $e) 
//			{
//			    $errorMessage = $e->getMessage();	
//			}
