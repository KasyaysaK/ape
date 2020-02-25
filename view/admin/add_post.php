<?php ob_start(); ?>

<div class="container mt-4">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<a href="index.php?action=dashboard"><i class="fas fa-arrow-left"></i></a>
		<h2 class="text-center">Ajouter un nouvel article</h2>
		<a href="index.php?action=post_manager">Tous les articles</a>
	</div>
	<hr class="mb-3" />
	<form class="row" action="index.php?action=publish_post" method="POST">
		<div class="col-md-10">
			<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" placeholder="Titre de l'article" />
			<!-- main image -->
			<textarea class="post-editor" aria-describedby="contenu" name="content" placeholder="Contenu de l'article"> 
				<p>Écrivez le contenu de l'article ici</p> 
			</textarea>
		</div>
		<div class="col-md-2 list-group justify-content-end">	
			<a class="list-group-item list-group-item-action text-center" data-toggle="collapse" href="#tags" role="button" aria-expanded="false" aria-controls="tags">
    			Rubriques
			</a>
			<div class="collapse" id="tags">
				<?php foreach ($tags as $tag): ?>
					<input type="radio" name="tag_id">
					<label><?= $tag['name'] ?></label>
				<p></p>
     			<?php endforeach; ?>
				<?php if (isset($_SESSION) && isset($_SESSION['username']) && $_SESSION['password'] === 'admin' ) : ?>
     			 <a href="index.php?action=display_tags" class="title btn btn-outline-success my-2 my-sm-0">gérer</a>
     			<?php endif; ?>		
			</div>	
			<!-- Preview -->
			<a href="index.php?action=dashboard" class="list-group-item list-group-item-action text-center">Annuler</a>
			<button type="submit" class="list-group-item list-group-item-action text-center">Publier</button>
			<a href="index.php?action=erase_post" class="list-group-item list-group-item-action text-center">Supprimer</a>
		</div>
	</form>
    
</div>

<?php $content = ob_get_clean(); ?>  
<?php require('view/template.php'); ?>
