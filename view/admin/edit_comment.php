<?php $title = htmlspecialchars('APE : Panneau d\'administration : Modifier le commentaire'); ?>

<?php ob_start(); ?>

<div class="container mt-4">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
		<h2 class="text-center">Modifier commentaire</h2>
		<a href="index.php?action=comment_manager">Tous les commentaires</a>
	</div>
	<hr class="mb-3" />

	<form class="row" action="" method="post">
		<div class="col-md-10">
			<textarea class="post-editor" aria-describedby="comment" name="comment"> 
				<p><?= htmlspecialchars($comment_to_edit['comment']) ?></p> 
			</textarea>
		</div>
		<div>
			<!-- Preview -->
			<a href="index.php?action=dashboard" class="list-group-item list-group-item-action text-center">Annuler</a>
			<button type="submit" class="list-group-item list-group-item-action text-center">Modérer</button>
			<a href="index.php?action=erase_post" class="list-group-item list-group-item-action text-center">Supprimer</a>
		</div>
    </form>
</div>

<?php $admin_content = ob_get_clean(); ?>
  
    

<?php require('view/template.php'); ?>
