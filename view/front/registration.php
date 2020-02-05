<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container" id="signup-form">
	<div class="row">
		<div class="col-8 offset-2">
			<div class="d-flex justify-content-between">
				<h2 class="title my-4">Inscription</h2>
				<button class="btn" id="signin-button">Déjà membre ? Connectez-vous !</button>
			</div>
			

			<hr class="mb-3"></hr>

			<?php if(!empty($errors)): ?>
			<div class="alert alert-danger">
				<p>Le formulaire n'a pas été rempli correctement :</p>
				<ul>
					<?php foreach($errors as $error): ?>
						<li><?= $error; ?></li>
					<?php endforeach; ?>
				</ul>	
			</div>
			<?php endif; ?>

			<form action="index.php?action=registerUser" onsubmit="return " method="POST">
				<div class="form-group" id="username">
					<label for="username" class="mt-2">Pseudo</label>
					<input type="text" name="username" class="form-control" />
					<div id="username-error"></div>
				</div>

				<div class="form-group" id="email">
					<label for="email" class="mt-2">Adresse email</label>
					<input type="email" name="email" class="form-control" />
					<div id="email-error"></div>
				</div>
				
				<div class="form-group" id="password">
					<label for="password" class="mt-2">Mot de passe</label>
					<input type="password" name="password" class="form-control" />
				</div>
				
				<div class="form-group" id="password-confirm">
					<label for="password-confirm" class="mt-2">Confirmez votre mot de passe</label>
					<input type="password" name="password-confirm" class="form-control" />
					<div id="password-error"></div>
				</div>
				

				<hr class="mb-3"></hr>
				<input type="submit" name="signup" value="Je m'inscris" class="title btn btn-outline-success mt-2">
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

