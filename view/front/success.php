<?php $title = htmlspecialchars('Erreur'); ?>

<?php ob_start(); ?>

   	<div class="container">
   		<hr class="mb-3" />
		<h2 class="text-center">Bonne nouvelle !</h2>
		<p><?= $notice ?></p>
		<a class="text-center" href="index.php"><p class="text-center">Revenir sur la page d'accueil</p></a>
		<hr class="mb-3" />
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
