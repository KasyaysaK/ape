<?php $title = htmlspecialchars('Déconnexion'); ?>

<?php ob_start(); ?>

   	<div class="container">
   		<hr class="mb-3" />
		<h2 class="text-center">Vous avez été déconnecté</h2>
		<a class="text-center href="index.php">Revenir sur la page d'accueil</a>
		<hr class="mb-3" />
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
