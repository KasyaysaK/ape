<?php ob_start(); ?>

<div class="container mt-4">
	<div  class="my-4">
		<h2>Modifier l'article</h2>
	</div>

	<div>
		<h2></h2> <p></p>
	</div>

	<form class="row" action="index.php?action=save_edited_post&amp;post_id=<?= $post_to_edit['id'] ?>" method="post">
		<div class="col-md-10">
			<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" value="<?= htmlspecialchars($post_to_edit['title']) ?>" />
			<textarea class="post-editor" aria-describedby="contenu" name="content"> 
				<p><?= htmlspecialchars($post_to_edit['content']) ?> </p> 
			</textarea>
		</div>
		<div class="col-md-2 list-group justify-content-end">
			<!-- Visualiser l'article -->
			<a href="index.php?action=dashboard" class="list-group-item list-group-item-action text-center">Annuler</a>
			<button type="submit" class="list-group-item list-group-item-action text-center">Publier</button>
			<a href="index.php?action=erase_post" class="list-group-item list-group-item-action text-center">Supprimer</a>
		</div>>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
  
    

<?php require('view/template.php'); ?>
