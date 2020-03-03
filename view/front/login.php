<?php $title = htmlspecialchars('Formulaire d\'inscription'); ?>

<?php ob_start(); ?>

<div class="container" id="signup-form">
	<div class="row">
		<div class="col-8 offset-2">
			<div class="d-flex justify-content-between">
				<h2 class="title my-4">Inscription</h2>
				<button type="button" class="title btn" data-toggle="modal" data-target="#login-form">Déjà membre ? Connectez-vous !</button>
			</div>
			

			<hr class="mb-3"></hr>
			<div class="notice">
				<p>Pour pouvoir créer un compte, il faut: </p>
				<ul>
					<li id="name-notice">Choisir un pseudo</li>
					<li id="email-notice">Indiquer son adresse email</li>
					<li id="password-notice">Entrer un mot de passe et le confimer</li>
					<li>Appuyer sur le bouton 'Publier'</li>
				</ul>
			</div>

			<form action="index.php?action=signup" onsubmit="return" method="POST">
				<div class="form-group">
					<label for="name" class="mt-2">Pseudo</label>
					<input id="name" class="form-control" type="text" aria-describedby="pseudo" name="name" />
				</div>

				<div class="form-group">
					<label for="email" class="mt-2">Adresse email</label>
					<input id="email" type="email" name="email" class="form-control" />
				</div>
				
				<div class="form-group" id="password">
					<label for="password" class="mt-2">Mot de passe</label>
					<input type="password" name="password" class="form-control" />
				</div>
				
				<div class="form-group" id="password-confirm">
					<label for="password-confirm" class="mt-2">Confirmez votre mot de passe</label>
					<input type="password" name="password-confirm" class="form-control" />
				</div>
				

				<hr class="mb-3"></hr>
				<input type="submit" name="signup" value="Je m'inscris" class="title btn btn-outline-success mt-2">
			</form>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

