<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container">

	<hr class="mb-3" />
	<h2 class="text-center">Gestion du site</h2>
	<hr class="mb-3" />

	<div class="row">
	    <div class="col-md-6">
    		<div class="card my-4">
			  	<div class="card-body">
			  		<a href="index.php?action=add_post" class="title btn"><img src="public/images/article.jpg" alt="bloc-note avec un stylo et ordinateur posés sur une table" class="img-thumbnail" /></a>
				    <a href="index.php?action=add_post" class="carousel-caption"><h4 class="title btn btn-secondary my-2 my-sm-0">Ajouter un article</h4></a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
    		<div class="card my-4">
			  	<div class="card-body">
			  		<a href="" class="title btn"><img src="public/images/article.jpg" alt="bloc-note avec un stylo et ordinateur posés sur une table" class="img-thumbnail" /></a>
				    <a href="" class="carousel-caption"><h4 class="title btn btn-secondary my-2 my-sm-0">Mes articles</h4></a>
				</div>
			</div>
		</div>
	</div>
			
</div>



<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

