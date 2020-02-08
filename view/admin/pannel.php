        <link href="../../public/css/style.css" rel="stylesheet" /> 


<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container">

	<hr class="mb-3" />
	<h2 class="text-center">Gestion du site</h2>
	<hr class="mb-3" />

	<div class="row">

	    <div class="col-md-6">
    		<div class="card my-4">
		  		<div class="card-header d-flex justify-content-between align-items-center">
		   	 		<h3>Ajouter un nouvel article</h3>
		   	 		<a href="#" class="title btn"><i class="far fa-plus-square add"></i></a>
			  	</div>
			  	<div class="card-body">
			  		<img src="../../public/images/article.jpg" alt="bloc-note avec un stylo et ordinateur posés sur une table" class="img-thumbnail" />
				    <!-- <h4 class="carousel-caption">Rédiger un nouvel article à but informatif ou pour donner des conseils.</h4> -->
				</div>
				<div class="card-footer">
				    <h4 class="card-text text-center">Voir tous les articles</h4> 
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card my-4">
		  		<div class="card-header d-flex justify-content-between align-items-center">
		   	 		<h3>Créer une nouvelle activité</h3>
		   	 		<a href="#" class="title btn"><i class="far fa-plus-square add"></i></a>
			  	</div>
			  	<div class="card-body">
			  		<img src="../../public/images/activity.jpg" alt=" des blocs de construction et des pieds d'enfants" class="img-thumbnail" />
				    <!-- <h4 class="carousel-caption">Créer une nouvelle activité à partager en famille pour de bon moments</h4> -->
				</div>
				<div class="card-footer">
				    <h4 class="card-text text-center">Voir toutes les activités</h4> 
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card my-4">
		  		<div class="card-header d-flex justify-content-between align-items-center">
		   	 		<h3>Ajouter une nouvelle recette</h3>
		   	 		<a href="#" class="title btn"><i class="far fa-plus-square add"></i></a>
			  	</div>
			  	<div class="card-body">
			  		<img src="../../public/images/recipe.jpg" alt="un plan de travail avec des oeufs, de la farine et un rouleau à patisserie" class="img-thumbnail" />
				    <!-- <h4 class="carousel-caption">Ajouter une nouvelle recette à faire et à déguster tous ensemble<h4> -->
				</div>
				<div class="card-footer">
				    <h4 class="card-text text-center">Voir toutes les recettes</h4> 
				</div>
			</div>
    	</div>

    	<div class="col-md-6">
			<div class="card my-4">
		  		<div class="card-header d-flex justify-content-between align-items-center">
		   	 		<h3>Modération</h3>
		   	 		<a href="#" class="title btn"><i class="far fa-plus-square add"></i></a>
			  	</div>
			  	<div class="card-body">
			  		<img src="../../public/images/admin.png" alt="un plan de travail avec des oeufs, de la farine et un rouleau à patisserie" class="img-thumbnail" />
				    <!-- <h4 class="carousel-caption">Ajouter une nouvelle recette à faire et à déguster tous ensemble<h4> -->
				</div>
				<div class="card-footer">
				    <h4 class="card-text text-center">Voir tous les signalements</h4> 
				</div>
			</div>
    	</div>

	</div>
			
</div>



<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

