<div class="head">
	<div>
	<div class="container">
	    <div id="carouselContent" class="carousel slide" data-ride="carousel">
	        <div class="carousel-inner" role="listbox">
	            <div class="carousel-item active text-center p-4">
                 	<p>lorem ipsum (imagine longer text)</p>
	            </div>
	            <div class="carousel-item text-center p-4">
	                <p>lorem ipsum (imagine longer text)</p>
	            </div>
	            <div class="carousel-item text-center p-4">
	                <p>lorem ipsum (imagine longer text)</p>
	            </div>
	            <div class="carousel-item text-center p-4">
	                <p>lorem ipsum (imagine longer text)</p>
	            </div>
	        </div>
	        <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
	            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	            <span class="sr-only">Previous</span>
	        </a>
	        <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
	            <span class="carousel-control-next-icon" aria-hidden="true"></span>
	            <span class="sr-only">Next</span>
	        </a>
	    </div>
	</div>
</div>
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
		                <a class="dropdown-item" href="#">Qui sommes nous ?</a>
		                <div class="dropdown-divider"></div>
		                <a class="dropdown-item" href="index.php?action=signup">Devenir membre</a>
		                <div class="dropdown-divider"></div>
		                <a class="dropdown-item" href="#">Contactez-nous</a>
		            </div>
		        </div>
      		</li>

      		<li class="nav-item">
	        	<a class="nav-link" href="#">Articles</a>
	      	</li>

	      	<li class="nav-item">
	        	<a class="nav-link" href="#">Activités</a>
	      	</li>

	      	<li class="nav-item">
	        	<a class="nav-link" href="#">Recettes</a>
	      	</li>
	      	
	    </ul>

	    <div class="form-inline my-2 my-lg-0">

			<!-- Button trigger modal -->
			<button type="button" class="title btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#login-form">
			  je me connecte
			</button>
			<!-- if session = déconnecter-->

			<!-- Modal -->
			<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="login-form-title" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">

		      		<div class="modal-header">
				        <button class="btn" id="signin-button"><h5 class="modal-title title" id="login-form-title">Connexion</h5></button>
				        <button class="modal-subtitle btn" id="signup-button">Pas encore membre ? C'est par ici !</button>
		      		</div>

		         	<form id="signin-form" action="index.php?action=signin" method="POST">

		         		<div class="modal-body container">

		         			<div class="row justify-content-center">
		         				<div class="form-group" id="username">
									<label for="username" class="my-2 mr-5 ">Pseudo</label>
									<input type="text" name="username" class="form-control" />
									<div id="username-error"></div>
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
	
