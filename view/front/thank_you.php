<?php $title = htmlspecialchars('APE : Message envoyé !'); ?>

<?php ob_start(); ?>

   	<div class="container">
   		<hr class="mb-3" />
		<h2 class="text-center">Nous avons bien reçu votre message !</h2>
		<p class="text-center">Nous vous recontacterons dès que possible !</p>
		<a href="index.php"><p class="text-center">Revenir sur la page d'accueil</p></a>
		<hr class="mb-3" />
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
