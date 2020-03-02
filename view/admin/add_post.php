<?php ob_start(); ?>

<div class="container mt-4">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<a href="index.php?action=dashboard"><i class="icon fas fa-arrow-left"></i></a>
		<h2 class="text-center">Ajouter un nouvel article</h2>
		<a href="index.php?action=post_manager">Tous les articles</a>
	</div>
	<hr class="mb-3" />
	<div class="notice">
		<p>Pour pouvoir publier un article, il faut: </p>
		<ul>
			<li id="title-notice">Écrire un <a href="#title">titre</a> de plus de trois lettres</li>
			<li id="description-notice">Mettre une <a href="#description">description</a> en une ou deux phrases</li>
			<li id="content-notice">Rédiger le <a href="#content">contenu</a> de l'article</li>
			<li id="tag-notice">Choisir une <a class="" data-toggle="collapse" href="#tags" role="button" aria-expanded="false" aria-controls="tags">rubrique</a></li>
			<li>Appuyer sur le bouton 'Publier'</li>
		</ul>
	</div>
	<form class="row" action="index.php?action=publish_post" method="POST">
		<div class="col-md-10">
			<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" placeholder="Titre de l'article" />
			<input id="description" class="form-control form my-2" aria-describedby="description" name="description" placeholder="Description de l'article" />
			<!-- main image -->
			<textarea id="content" class="post-editor" aria-describedby="contenu" name="content" placeholder="Contenu de l'article"> </textarea>
		</div>
		<div class="col-md-2 list-group justify-content-end">	
			<a class="list-group-item list-group-item-action text-center" data-toggle="collapse" href="#tags" role="button" aria-expanded="false" aria-controls="tags">
    			Rubriques
			</a>
			<div class="collapse" id="tags">
				<?php foreach ($tags as $tag): ?>
					<input id="tag"  type="radio" name="tag_id" value="<?= $tag['id'] ?>">
					<label><?= $tag['label'] ?></label>
				<p></p>
     			<?php endforeach; ?>
				<?php if (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'admin' ) : ?>
     			 <a href="index.php?action=display_tags" class="title btn btn-outline-success my-2 my-sm-0">gérer</a>
     			<?php endif; ?>		
			</div>	
			<!-- Preview -->
			<button type="submit" class="text-center btn btn-outline-success" id="publish-post">Publier</button>
		</div>
	</form>
    
</div>

<?php $content = ob_get_clean(); ?>  
<?php require('view/template.php'); ?>

