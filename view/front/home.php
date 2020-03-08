<?php $title = htmlspecialchars('Par des parents, pour des parents et leurs enfants !'); ?>

<?php ob_start(); ?>

<div class="container my-4">
	<p class="text-justify">
		Notre site a été crée dans l'optique d'accompagner les parents dans leur rôle. On ne nait pas avec des connaissances, être parents ça s'apprend aussi ! 
		Nous vous proposons des articles appuyés sur des recherches scientifiques pour expliquer les questionnements sur la parentalité. 
		Vous pouvez aussi retrouver des activités ludiques et des recettes à faire ensemble pour partager de bons moments et créer des souvenirs. Nous vous souhaitons une bonne visite ! 
	</p>

	<div class="row">
		<div class="col-md-4">
    		<fieldset>
			  	<legend class="text-center"><i class="icons fas fa-users"></i></legend>
		  		<p>L'APE c'est un site bienveillant qui répond aux questions qu'un parent peut avoir. S'informer c'est déjà être un bon parent !</p>
			    <a href="index.php?action=about"><h4 class="title btn btn-secondary my-2 my-sm-0" data-aos="fade-down"  data-aos-duration="500">En savoir plus</h4></a>
			</fieldset>
		</div>
		<div class="col-md-4">
    		<fieldset>
			  	<legend class="text-center"><i class="icons far fa-envelope"></i></legend>
		  		<p>Vous avez des questions, une suggestion, des idées ? N'hésitez pas à nous contacter, nous vous répondons au plus vite !</p>
			    <a href="index.php?action=contact"><h4 class="title btn btn-secondary my-2 my-sm-0" data-aos="fade-down" data-aos-duration="1500">Envoyer un message</h4></a>
			</fieldset>
		</div>
		<div class="col-md-4">
    		<fieldset>
    			<?php if (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'author') : ?>
				  	<legend class="text-center"><i class="icons fas fa-pencil-alt"></i></legend>
				    <p>Vous êtes auteur, félicitations ! Vous êtes inspiré ? Ajoutez un article à une des rubriques dès maintenant !</p>
				    <a href="index.php?action=author_pannel"><h4 class="title btn btn-secondary my-2 my-sm-0" data-aos="fade-down" data-aos-duration="2500">Écrire un article</h4></a>
			    <?php elseif (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'member') : ?>
				  	<legend class="text-center"><i class="icons fas fa-pencil-alt"></i></legend>
				    <p>Vous pourrez bientôt contribuer à notre site en écrivant des articles ! Ca vous intéresse ?</p>
				    <a href="index.php?action=author"><h4 class="title btn btn-secondary my-2 my-sm-0" data-aos="fade-down" data-aos-duration="2500">Devenir auteur</h4></a>
			    <?php else : ?>
			    	<legend class="text-center"><i class="icons fas fa-user"></i></legend>
			  		<p>En rejoignant la communauté, vous avez la possibilité de commenter les articles et même de devenir auteur !</p>
				    <a href="index.php?action=login"><h4 class="title btn btn-secondary my-2 my-sm-0" data-aos="fade-down" data-aos-duration="2500">Devenir membre</h4></a>
				<?php endif; ?>
			</fieldset>
		</div>
    </div>

 	<hr class="mt-5" />
	<div class="text-center">
		<h2 class="text-center title">Nos derniers articles</h2>
	</div>
	<hr class="mb-3" />
	<div class="row">
		<?php foreach ($last_posts as $post): ?>
		<div class="col-md-6">
          	<div class="card mb-2 align-items-center">
	            <div class="card-body">
	              	<h4 class="card-title"><?= $post['title']; ?></h4>
	              	<p class="card-text"><?= $post['description'] ?></p>
	              	<a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>"><h4 class="title btn btn-outline-success my-2 my-sm-0">Lire la suite</h4></a> 
	            </div>
          	</div>
        </div>
      	<?php endforeach; ?>
	</div>

 	<hr class="mt-5" />
	<div class="text-center">
		<h2 class="text-center title"><a href="index.php?action=list_posts">Les rubriques</a></h2>
	</div>
	<hr class="mb-3" />
	<div class="row">
		<div class="col-md-4" data-aos="flip-up" data-aos-duration="1000">
		  	<div class="card-body">
		  		<a href="index.php?action=list_articles" class="title btn"><img src="public/images/article.jpg" alt="bloc-note avec un stylo et ordinateur posés sur une table" class="img-thumbnail" /></a>
			    <a href="index.php?action=list_articles" class="carousel-caption"><h4 class="title btn btn-secondary my-2 my-sm-0">Articles</h4></a>
			</div>
        </div>
        <div class="col-md-4" data-aos="flip-up" data-aos-duration="1000">
		  	<div class="card-body">
		  		<a href="index.php?action=list_activities" class="title btn"><img src="public/images/activity.jpg" alt="bloc-note avec un stylo et ordinateur posés sur une table" class="img-thumbnail" /></a>
			    <a href="index.php?action=list_activities" class="carousel-caption"><h4 class="title btn btn-secondary my-2 my-sm-0">Activités</h4></a>
			</div>
        </div>
        <div class="col-md-4" data-aos="flip-up" data-aos-duration="1000">
		  	<div class="card-body">
		  		<a href="index.php?action=list_recipes" class="title btn"><img src="public/images/recipe.jpg" alt="bloc-note avec un stylo et ordinateur posés sur une table" class="img-thumbnail" /></a>
			    <a href="index.php?action=list_recipes" class="carousel-caption"><h4 class="title btn btn-secondary my-2 my-sm-0">Recettes</h4></a>
			</div>
        </div>
	</div>
	
</div>
		

	
	

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

