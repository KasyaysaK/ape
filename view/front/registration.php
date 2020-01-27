<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container" id="signup-form">
	<div class="row">
		<div class="col-8 offset-2">
			<h2 class="title my-4">Inscription</h2>
			<button class="btn" id="signin-button">Déjà membre ? Connectez-vous !</button>

			<hr class="mb-3"></hr>
			<form action="index.php?action=registerUser" method="POST">
				<label for="firstname" class="mt-2">Prénom</label>
				<input type="text" name="firstname" class="form-control" required />
				
				<label for="lastname" class="mt-2">Nom</label>
				<input type="text" name="lastname" class="form-control" required />
				
				<label for="email" class="mt-2">Adresse email</label>
				<input type="email" name="email" class="form-control" required />
				
				<label for="password" class="mt-2">Mot de passe</label>
				<input type="password" name="password" class="form-control" required />
				
				<!-- <label for="password2" class="mt-2">Confirmez votre mot de passe</label>
				<input type="password" name="password2" class="form-control" required /> -->
				
				<hr class="mb-3"></hr>
				<input type="submit" name="registerUser" value="Je m'inscris" class="title btn btn-outline-success mt-2">
			</form>
		</div>
	</div>
</div>
		
<div id="signin-form" style="display:none;"> 
	<fieldset>
		<legend>
			<h2>Connexion</h2>
		</legend>

		<form action="index.php?action=signin" method="POST">
			<input type="email" name="email" placeholder="Votre adresse" />
			<input type="password" name="password" placeholder="Votre mot de passe" />

			<input type="submit" value="Je me connecte">
		</form>
	</fieldset>
3





</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

