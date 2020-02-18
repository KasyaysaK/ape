<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<h2 class="text-center">A propos de nous</h2>
	<hr class="mb-3" />

	<div class="row">
		<div class="col-md-10">
			<div id="users"></div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>	


