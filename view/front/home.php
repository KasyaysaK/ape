<?php $title = htmlspecialchars('Par des parents, pour des parents et leurs enfants !'); ?>

<?php ob_start(); ?>

<div class="container my-4">
	<p class="text-justify">
		Le site de (nom) a été crée dans l'optique d'accompagner les parents dans leur rôle. On ne nait pas avec des connaissances, être parents ça s'apprend aussi ! 
		Nous vous proposons des articles appuyés sur des recherches scientifiques pour expliquer les questionnements sur la parentalité. 
		Vous pouvez aussi retrouver des activités ludiques et des recettes à faire ensemble pour partager de bons moments et créer des souvenirs. 
	</p>
</div>

<div class="container my-4"> 	
 	<hr class="mt-5" />
	<div class="text-center">
		<h2 class="text-center">Nos derniers articles</h2>
	</div>
	<hr class="mb-3" />

	<div class="row">
		<?php foreach ($last_posts as $post): ?>
		<div class="col-md-4">
          	<div class="card mb-2">
	            <div class="card-body">
	              	<h4 class="card-title"><?= $post['title']; ?></h4>
	              	<p class="card-text"><?= $post['description'] ?></p>
	              	<a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>"><h4 class="title btn btn-outline-success my-2 my-sm-0">Lire la suite</h4></a> 
	            </div>
          	</div>
        </div>
      	<?php endforeach; ?>
	</div>
</div>

<div id="carousel" class="carousel slide my-4" data-ride="carousel">
  	<div class="carousel-inner">
	    <div class="carousel-item active">
	      	<img class="d-block w-100" src="public/images/family.jpg" alt="First slide" />
	      	<div class="carousel-caption d-none d-md-block">
			    <h3>La revue</h3>
			    <a class="title btn btn-outline-success my-2 my-sm-0" href="index.php?action=list_posts">Lire les articles</a>
		  	</div>
	    </div>
	    <div class="carousel-item">
     	 	<img class="d-block w-100" src="public/images/together.jpg" alt="Second slide" />
	      	<div class="carousel-caption d-none d-md-block">
			    <h3>La revue</h3>
			    <a class="title btn btn-outline-success my-2 my-sm-0" href="index.php?action=list_posts">Lire les articles</a>
		  	</div>
	    </div>
	    <div class="carousel-item">
	      	<img class="d-block w-100" src="public/images/kid_activity_1.jpg" alt="Third slide" />
	      	<div class="carousel-caption d-none d-md-block">
			    <h3>La revue</h3>
			    <a class="title btn btn-outline-success my-2 my-sm-0" href="index.php?action=list_posts">Lire les articles</a>
		  	</div>
	    </div>
	  </div>	
	  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
</div>
	
<div class="container my-4"> 	
 	<hr class="mt-5" />
	<div class="text-center">
		<h2 class="text-center">Les rubriques</h2>
	</div>
	<hr class="mb-3" />
	<div class="row">
		<div class="col-md-4">
    		<div class="card my-4">
			  	<div class="card-body">
			  		<a href="index.php?action=list_posts" class="title btn"><img src="public/images/family.jpg" alt="bloc-note avec un stylo et ordinateur posés sur une table" class="img-thumbnail" /></a>
				    <a href="index.php?action=list_posts" class="carousel-caption"><h4 class="title btn btn-secondary my-2 my-sm-0">Articles</h4></a>
				</div>
			</div>
        </div>
        <div class="col-md-4">
    		<div class="card my-4">
			  	<div class="card-body">
			  		<a href="index.php?action=list_activities" class="title btn"><img src="public/images/activity.jpg" alt="bloc-note avec un stylo et ordinateur posés sur une table" class="img-thumbnail" /></a>
				    <a href="index.php?action=list_activities" class="carousel-caption"><h4 class="title btn btn-secondary my-2 my-sm-0">Activité</h4></a>
				</div>
			</div>
        </div>
        <div class="col-md-4">
    		<div class="card my-4">
			  	<div class="card-body">
			  		<a href="index.php?action=list_recipes" class="title btn"><img src="public/images/recipe.jpg" alt="bloc-note avec un stylo et ordinateur posés sur une table" class="img-thumbnail" /></a>
				    <a href="index.php?action=list_recipes" class="carousel-caption"><h4 class="title btn btn-secondary my-2 my-sm-0">Recette</h4></a>
				</div>
			</div>
        </div>
	</div>
</div>
		

	
	

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

