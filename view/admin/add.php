
        <link href="../../public/css/style.css" rel="stylesheet" /> 
        <script src="../../public/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript">tinymce.init({ height : "480", selector:'.post-editor', language: 'fr_FR'});</script>


<?php ob_start(); ?>

<div class="container mt-4">

	<div  class="my-4">
		<h2>Ajouter un nouvel article</h2>
	</div>

	<form class="row" action="" method="POST">
		<div class="col-md-8">
			<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" placeholder="Titre de l'article" />
			<textarea class="post-editor" aria-describedby="contenu" name="content" placeholder="Contenu de l'article"> 
				<p>Écrivez le contenu de l'article ici</p> 
			</textarea>
		</div>
		<div>
			<div class="row">
				<div class="col my-2">
					<button type="submit" class="btn btn-light">Publier</button>
					<a href="index.php?action=showDashboard" class="btn btn-light">Annuler</a>
				</div>
			</div>
		</div>
    </form>
    
</div>

<?php $content = ob_get_clean(); ?>
  
<?php require('../template.php'); ?>
