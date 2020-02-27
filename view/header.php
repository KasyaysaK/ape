<div class="head container-fluid d-flex align-items-center justify-content-center">
    <div id="carouselContent" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active text-center p-4">
             	<p class="font-italic">“Les enfants n’ont pas besoin d’être éduqués, mais d’être accompagnés avec empathie.” – Jesper Juul</p>
            </div>
            <div class="carousel-item text-center p-4">
                <p class="font-italic">“N’oubliez pas que vous êtes le réceptacle privilégié de ses souffrances non parce que vous n’avez pas d’autorité (c’est ce que racontent parfois les papas ou votre propre mère…), mais parce qu’elle est en sécurité avec vous.” – Isabelle Filliozat </p>
            </div>
            <div class="carousel-item text-center p-4">
                <p class="font-italic">“L’éducation consiste à comprendre l’enfant tel qu’il est, sans lui imposer l’image de ce que nous pensons qu’il devrait être.”- Krishnamurti</p>
            </div>
            <div class="carousel-item text-center p-4">
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
		                <?php if (!isset($_SESSION['name'])) : ?>
			                <a class="dropdown-item" href="index.php?action=login">Devenir membre</a>
			                <div class="dropdown-divider"></div>
		            	<?php endif ?>
		                <a class="dropdown-item" href="index.php?action=contact">Contactez-nous</a>
		            </div>
		        </div>
      		</li>

      		<li class="nav-item">
	        	<a class="nav-link" href="index.php?action=list_posts">Articles</a>
	      	</li>

	      	<li class="nav-item">
	        	<a class="nav-link" href="#">Activités</a>
	      	</li>

	      	<li class="nav-item">
	        	<a class="nav-link" href="#">Recettes</a>
	      	</li>
	      	
	    </ul>

	    <div class="form-inline my-2 my-lg-0">

			<?php if (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'admin' ) : ?>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=dashboard">Administration</a>
					</li>
				</ul>
			<?php endif; ?> 
			<?php if (isset($_SESSION) && isset($_SESSION['name'])) : ?>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=profile">Profil</a>
					</li>
				</ul>
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
			<button type="button" class="title btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#login-form">je me connecte</button>

			<!-- Modal -->
			<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="login-form-title" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">

		      		<div class="modal-header">
				        <button class="btn" id="signin-button"><h5 class="modal-title title" id="login-form-title">Connexion</h5></button>
				        <a class="modal-subtitle btn" href="index.php?action=login">Pas encore membre ? C'est par ici !</a>
		      		</div>

		         	<form id="signin-form" action="index.php?action=signin" method="POST">

		         		<div class="modal-body container">

		         			<div class="row justify-content-center">
		         				<div class="form-group" id="name">
									<label for="name" class="my-2 mr-5 ">Pseudo</label>
									<input type="text" name="name" class="form-control" />
									<div id="name-error"></div>
								</div>
								
								<div class="form-group my-2" id="password">
									<label for="password" class="mt-2 mr-2">Mot de passe</label>
									<input type="password" name="password" class="form-control" />
								</div>	
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
	
