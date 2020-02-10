<?php ob_start(); ?>

<div class="container mt-4">

	<hr class="mb-3" />
	<h2 class="text-center">Ajouter un nouvel article</h2>
	<a href="index.php?action=dashboard">Revenir sur la page d'administration</a>
	<hr class="mb-3" />

	<form class="row" action="index.php?action=publish_post" method="POST">
		<div class="col-md-10">
			<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" placeholder="Titre de l'article" />
			<textarea class="post-editor" aria-describedby="contenu" name="content" placeholder="Contenu de l'article"> 
				<p>Écrivez le contenu de l'article ici</p> 
			</textarea>
		</div>
		<div class="col-md-2 list-group justify-content-end">
			<!-- Visualiser l'article -->
			<a href="index.php?action=dashboard" class="list-group-item list-group-item-action text-center">Annuler</a>
			<button type="submit" class="list-group-item list-group-item-action text-center">Publier</button>
			<a href="index.php?action=erase_post" class="list-group-item list-group-item-action text-center">Supprimer</a>
		</div>
    </form>
    
</div>

<?php $content = ob_get_clean(); ?>
  
<?php require('view/template.php'); ?>
