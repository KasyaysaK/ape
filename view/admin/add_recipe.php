<?php ob_start(); ?>

<div class="container mt-4">

	<hr class="mb-3" />
	<h2 class="text-center">Ajouter un nouvel article</h2>
	<hr class="mb-3" />

	<form class="row" action="index.php?action=publish_post" method="POST">
		<div class="col-md-10">
			<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" placeholder="Titre de l'article" />
			<textarea class="post-editor" aria-describedby="contenu" name="content" placeholder="Contenu de l'article"> 
				<p>Écrivez le contenu de l'article ici</p> 
			</textarea>
		</div>
		<div>
			<div class="row">
				<div class="col-sm-2">
					<button type="submit" class="btn btn-light">Publier</button>
				</div>
				<div class="col-sm-2">
					<a href="index.php?action=showDashboard" class="btn btn-light">Annuler</a>
				</div>
			</div>
		</div>
    </form>
    
</div>

<?php $content = ob_get_clean(); ?>
  
<?php require('view/template.php'); ?>
