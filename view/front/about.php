<?php $title = htmlspecialchars('APE : Qui sommes nous'); ?>

<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<h2 class="text-center">A propos de nous</h2>
	<hr class="mb-3" />

	<div class="row">
		<div class="col-md-4">
			<div id="users"></div>
		</div>
		<div class="col-md-8">
			<p>Nous avons décidé de créer ce site parce que pourquoi pas.</p>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>	


