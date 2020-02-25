<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container" id="signup-form">
	<div class="row">
		<div class="col-8 offset-2">
			<div class="d-flex justify-content-between">
				<h2 class="title my-4">Inscription</h2>
				<button type="button" class="title btn" data-toggle="modal" data-target="#login-form">Déjà membre ? Connectez-vous !</button>
			</div>
			

			<hr class="mb-3"></hr>

			<?php if(!empty($this->errors)): ?>
			<div class="alert alert-danger">
				<p>Le formulaire n'a pas été rempli correctement :</p>
				<ul>
					<?php foreach($this->errors as $error): ?>
						<li><?= $error; ?></li>
					<?php endforeach; ?>
				</ul>	
			</div>
			<?php endif; ?>

			<form action="index.php?action=signup" onsubmit="return" method="POST">
				<div class="form-group" id="name">
					<label for="name" class="mt-2">Pseudo</label>
					<input type="text" name="name" class="form-control" />
					<div id="name-error"></div>
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

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

