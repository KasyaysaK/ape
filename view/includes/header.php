<div class="head container-fluid d-flex align-items-center justify-content-center">
	<div id="carouselContent" class="carousel slide header-box" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active p-4">
             	<p class="font-italic">“Les enfants n’ont pas besoin d’être éduqués, mais d’être accompagnés avec empathie.” – Jesper Juul</p>
            </div>
            <div class="carousel-item p-4">
                <p class="font-italic">“N’oubliez pas que vous êtes le réceptacle privilégié de ses souffrances non parce que vous n’avez pas d’autorité (c’est ce que racontent parfois les papas ou votre propre mère…), mais parce qu’elle est en sécurité avec vous.” – Isabelle Filliozat </p>
            </div>
            <div class="carousel-item p-4">
                <p class="font-italic">“L’éducation consiste à comprendre l’enfant tel qu’il est, sans lui imposer l’image de ce que nous pensons qu’il devrait être.”- Krishnamurti</p>
            </div>
            <div class="carousel-item p-4">
                <p class="font-italic">“C’est lorsqu’ils semblent en mériter le moins que les enfants ont le plus besoin d’amour et d’attention” – Aletha solter</p>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div> 
</div>

<div class="navigation">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand title" href="index.php?action=home" style="">APE</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
	        	<a class="nav-link" href="index.php?action=home"><i class="fas fa-home"></i></a>
      		</li>
      		<li class="nav-item dropdown">
      			<div class="btn-group">
	            	<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" id="about" aria-haspopup="true" aria-expanded="false">
	                	À Propos
	            	</button>
		            <div class="dropdown-menu" aria-labelledby="about">
		                <a class="dropdown-item" href="index.php?action=about">Qui sommes nous ?</a>
		                <div class="dropdown-divider"></div>
		                <?php if (!isset($_SESSION['name']) && !isset($_SESSION['password'])) : ?>
			                <a class="dropdown-item" href="index.php?action=login">Devenir membre</a>
			                <div class="dropdown-divider"></div>
		            	<?php endif ?>
		                <a class="dropdown-item" href="index.php?action=contact">Contactez-nous</a>
		            </div>
		        </div>
      		</li>

      		<li class="nav-item">
	        	<a class="nav-link" href="index.php?action=list_articles">Articles</a>
	      	</li>

	      	<li class="nav-item">
	        	<a class="nav-link" href="index.php?action=list_activities">Activités</a>
	      	</li>

	      	<li class="nav-item">
	        	<a class="nav-link" href="index.php?action=list_recipes">Recettes</a>
	      	</li>
	      	
	    </ul>

	    <div class="form-inline my-2 my-lg-0">
			<?php if (isset($_SESSION) && isset($_SESSION['name']) && isset($_SESSION['password'])) : ?>
				<ul class="navbar-nav">
					<li class="nav-item mr-2">
						| Bonjour <?= $_SESSION['name'] ?> ! |
					</li>
				</ul>

			<?php if (isset($_SESSION) && isset($_SESSION['name']) && isset($_SESSION['password']) && $_SESSION['role'] === 'admin' ) : ?>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=dashboard">Administration</a>
					</li>
				</ul>
			<?php endif; ?> 

				<!-- Button trigger modal -->
				<button type="button" class="title btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#login-form">se déconnecter</button>
				<!-- Modal -->
				<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="login-form-title" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
				      		<div class="modal-header">
						        <h5 class="modal-title title" id="login-form-title">Déconnexion</h5>
				      		</div>
			         		<div class="modal-body">
			         			<p> <?= $_SESSION['name'] ?>, souhaitez-vous vous déconnecter ?</p>
			         		</div>
				      		
				      		<div class="modal-footer justify-content-center">
	  							<a class="title btn btn-outline-success my-2 my-sm-0" href="index.php?action=signout">oui</a>
				       		 	<button type="button" class="title btn btn-outline-secondary my-2 my-sm-0" data-dismiss="modal">non</button>
					      	</div>
					    </div>
					</div>
				</div>
			<?php else : ?>
			<button type="button" id="login-form-title" class="title btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#login-form">je me connecte</button>
			<!-- Modal -->
			<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="login-form-title" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
		      		<div class="modal-header">
				        <button class="btn" id="signin-button">Connexion</button>
				        <a class="modal-subtitle btn" href="index.php?action=login">Pas encore membre ? C'est par ici !</a>
		      		</div>
		         	<form id="signin-form" action="index.php?action=signin"  onsubmit="return validateSigninForm()" method="POST">
		         		<div class="modal-body justify-content-center">
	         				<div class="form-group col-sm-8 text-center" id="name">
								<label for="signinName" class="my-2 mr-5 ">Pseudo</label>
								<input id="signinName" type="text" name="name" class="form-control" /> 
								<div class="error" id="signinNameError"></div>
							</div>							
							<div class="form-group col-sm-8" id="password">
								<label for="signinPassword" class="mt-2 mr-2">Mot de passe</label>
								<input id="signinPassword" type="password" name="password" class="form-control" />
								<div class="error" id="signinPasswordError"></div>
							</div>			         			
		         		</div>			      		
			      		<div class="modal-footer justify-content-center">
  							<input type="submit" class="title btn btn-outline-success my-2 my-sm-0" name="signin" value="valider">
			       		 	<button type="button" class="title btn btn-outline-secondary my-2 my-sm-0" data-dismiss="modal">annuler</button>
				      	</div>
					</form>
			    </div>
			  </div>
			</div>
			<?php endif; ?>
	    </div>
	  </div>
	</nav>
</div>
	
