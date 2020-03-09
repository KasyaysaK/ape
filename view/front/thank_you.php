<?php $title = htmlspecialchars('APE : Message envoyé !'); ?>

<?php ob_start(); ?>

   	<div class="container">
   		<hr class="mb-3" />
		<h2 class="text-center">Nous vous remercions et nous vous recontacterons dès que possible !</h2>
		<a href="index.php"><p class="text-center">Revenir sur la page d'accueil</p></a>
		<hr class="mb-3" />
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
