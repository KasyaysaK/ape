<div class="parallax">

</div>

<div class="navigation">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand title" href="index.php" style="">APE</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
	        	<a class="nav-link" href="#"><i class="fas fa-home"></i></a>
      		</li>
      		<li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          L'association
	        	</a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          		<a class="dropdown-item" href="#">Qui sommes nous ?</a>
	          		<div class="dropdown-divider"></div>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item" href="#">La revue de l'APE</a>
	          		<a class="dropdown-item" href="#">Nos projets en cours</a>
		        </div>
      		</li>
      		<li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          L'école
	        	</a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          		<a class="dropdown-item" href="#">Actualités</a>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item" href="#">Le personnel</a>
		        </div>
      		</li>
      		<li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Informations
	        	</a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          		<a class="dropdown-item" href="#">Conseils aux parents</a>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item" href="index.php?action=showRegistration">Devenir membre</a>
	          		<div class="dropdown-divider"></div>
	          		<a class="dropdown-item" href="#">Contactez-nous</a>
		        </div>
      		</li>
	      	
	    </ul>
	    <div class="form-inline my-2 my-lg-0">

			<!-- Button trigger modal -->
			<button type="button" class="title btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#login-form">
			  je me connecte
			</button>

			<!-- Modal -->
			<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="login-form-title" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
		      		<div class="modal-header">
				        <button class="btn" id="signin-button"><h5 class="modal-title title" id="login-form-title">Connexion</h5></button>
				        <button class="modal-subtitle btn" id="signup-button">Pas encore membre ? C'est par ici !</button>
		      		</div>
		         	<form id="signin-form" action="" method="POST">
			      		<div class="modal-body form-group">
							<input type="email" name="email" class="credentials mr-2" placeholder="Votre adresse" required />
							<input type="password" name="password" class="credentials" placeholder="" >
			      		</div>
			      		<div class="modal-footer">
  							<input type="submit" class="title btn btn-outline-success my-2 my-sm-0" name="submit" value="valider">
			       		 	<button type="button" class="title btn btn-outline-secondary my-2 my-sm-0" data-dismiss="modal">annuler</button>
				      	</div>
					</form>
		         	<form id="signup-form" action="" method="POST" style="display:none;">
			      		<div class="modal-body">
			      			<div class="form-group">
			      				<input type="text" name="firstname" class="user-info mb-2 mr-2" placeholder="Prénom" required />
	      						<input type="text" name="lastname" class="user-info  mb-2" placeholder="Nom" required />
			      			</div>
	      					<div class="form-group">
	      						<input type="email" name="email" class="email form-group mb-2" placeholder="Adresse email" required />
	      					</div>
	      					<div class="form-group">
	      						<input type="password" name="password" class="password mb-2 mr-2" placeholder="Votre mot de passe" required />
	      						<input type="password" name="password2" class="password mb-2" placeholder="Confirmez votre mot de passe" required />
	      					</div>
	      						
	      																	
			      		</div>
			      		<div class="modal-footer">
  							<input type="submit" class="title btn btn-outline-success my-2 my-sm-0" name="submit" value="valider">
			       		 	<button type="button" class="title btn btn-outline-secondary my-2 my-sm-0" data-dismiss="modal">annuler</button>
				      	</div>
					</form>

			    </div>
			  </div>
			</div>

	    </div>
	  </div>
	</nav>
</div>
	
