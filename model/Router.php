<?php 

	class Router
	{
		private $front;

		public function __contruct()
		{
			$this->front = new Controller;
			var_dump($this->front);
		}

		public function request()
		{
			try {
				if (isset($_GET['action'])) {

					switch ($_GET['action']) {

						case 'showHome':
							$this->front->showHome();
							break;

						case 'showRegistration':
							$this->front->showRegistration();
							break;

						case 'registerUser':
							if (isset($_POST['signup'])) {
								$user = $_POST['username'];
								echo 'Welcome' .$_user;
							}
							
							break;

						case 'listPosts':
							$this->front->listPosts();
							break;
					}
				}
				else {
					$this->front->showHome();
				}
						
			}
			catch(Exception $e) 
			{
			    $errorMessage = $e->getMessage();	
			}

		}

	}
