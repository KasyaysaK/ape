<?php $title = htmlspecialchars('APE : Super !'); ?>

<?php ob_start(); ?>

   	<div class="container">
   		<hr class="mb-3" />
		<h2 class="text-center">Bonne nouvelle !</h2>
		<p class="text-center"><?= $notice ?></p>
		<a class="text-center" href="index.php?action=home"><p class="text-center">Revenir sur la page d'accueil</p></a>
		<hr class="mb-3" />
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
