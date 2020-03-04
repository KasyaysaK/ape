<?php $title = htmlspecialchars('Message envoyé !'); ?>

<?php ob_start(); ?>

   	<div class="container">
   		<hr class="mb-3" />
		<h2 class="text-center">Nous vous remercions et nous vous recontacterons dès que possible !</h2>
		<a class="text-center" href="index.php">Revenir sur la page d'accueil</a>
		<hr class="mb-3" />
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
