<?php $title = htmlspecialchars('APE : Formulaire d\'inscription'); ?>

<?php ob_start(); ?>

<div class="container" id="signup-form">
	<div class="row">
		<div>
	        <hr class="mb-3" />
	        <div class="header-list d-flex align-items-center justify-content-between">
	            <button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
	            <h2 class="text-center title">Inscription</h2>
				<button type="button" class="title btn" data-toggle="modal" data-target="#login-form">Déjà membre ? Connectez-vous !</button>
	        </div>
	        <hr class="mb-3" />
    	</div>
		<div class="col-md-12">
			<div class="notice">
				<p>Pour pouvoir créer un compte, il faut: </p>
				<ul>
					<li id="name-notice">Choisir un pseudo qui ne contient que des lettres</li>
					<li id="email-notice">Indiquer son adresse email</li>
					<li id="password-notice">Entrer un mot de passe qui contient au moins un chiffre et le confimer</li>
					<li>Appuyer sur le bouton 'Publier'</li>
				</ul>
			</div>

			<form name="login" action="index.php?action=signup" onsubmit="return validateSignupForm()" method="POST">
				<div class="form-group">
					<label for="signupName" class="mt-2">Pseudo</label>
					<input id="signupName" class="form-control" type="text" name="name" aria-required="true" />
					<div class="error" id="nameError"></div>
				</div>

				<div class="form-group">
					<label for="signupEmail" class="mt-2">Adresse email</label>
					<input id="signupEmail" type="email" name="email" class="form-control" aria-required="true" />
					<div class="error" id="emailError"></div>
				</div>
				
				<div class="form-group" id="password">
					<label for="signupPassword" class="mt-2">Mot de passe</label>
					<input id="signupPassword" type="password" name="password" class="form-control" aria-required="true" />
					<div class="error" id="passwordError"></div>
				</div>
				
				<div class="form-group" id="password-confirm">
					<label for="signupConfirm" class="mt-2">Confirmez votre mot de passe</label>
					<input id="signupConfirm" type="password" name="confirm" class="form-control" aria-required="true" />
					<div class="error" id="confirmError"></div>
				</div>
				

				<hr class="mb-3">
				<input type="submit" name="signup" value="Je m'inscris" class="title btn btn-outline-success mt-2">
			</form>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

