<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<button id="signup-button" class="btn btn-outline-success title">je m'inscris</button> 

<button id="signin-button" class="btn btn-outline-success title">je me connecte</button>


<div id="signin-form"> 
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
</div>


<div id="signup-form" style="display: none;">
	<fieldset>
	<legend>
		<h2>Inscription</h2>
	</legend>

	<form action="index.php?action=signup" method="POST">
		<input type="text" name="child_firstname" placeholder="Prénom de votre enfant" />

		<input type="text" name="child_lastname" placeholder="Nom de votre enfant" />

		<input type="email" name="email" placeholder="Votre adresse email" />

		<input type="password" name="password" placeholder="Votre mot de passe" />
		<input type="password" name="password2" placeholder="Confirmez votre mot de passe" />


		<input type="submit" name="signup" value="Je m'inscris">
	</form>
</fieldset>


</div>


<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>

