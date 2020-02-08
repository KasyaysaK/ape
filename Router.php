<?php 

	require_once('controller/front.php');

	class Router
	{
		private $front;

		public function __construct()
		{
			$this->front = new Controller();
		}

		public function request()
		{
			try {
				if (isset($_GET['action'])) {
					switch ($_GET['action']) {
						case 'home':
						var_dump('ici');
							$this->front->home();
							break;
						case 'signup':
							$this->front->signup();
							break;
						case 'create_user':
							if (!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['password'])) 
							{
								$this->front->create_user($_POST['username'], $_POST['email'], $_POST['password']);
							}
							else {
								
								echo 'Veuillez remplir tous les champs.';
							}
							break;
						case 'signin':
							if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
									var_dump('pas de session');
									if(!empty($_POST['username']) || !empty($_POST['password'])) {
										$this->front->signin($_POST['username'], $_POST['password']);
									}
									else {
										echo 'veuillez remplir le formulaire';
									}                       
			                }
			                elseif (isset($_SESSION['username']) && (isset($_SESSION['password']))) {
			                	var_dump('session en cours');
			                    $this->front->signin($_SESSION['username'], $_SESSION['password']);    
			                }
			                else {
			                        echo 'il y a des erreurs';
			                }
					}
				}
				else {
					$this->front->home();
				}
			}
			catch(Exception $e) 
						{
						    $errorMessage = $e->getMessage();	
						}
	}
}