<?php ob_start(); ?>

<div class="container mt-4">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<a href="index.php?action=dashboard"><i class="fas fa-arrow-left"></i></a>
		<h2 class="text-center">Modifier l'article</h2>
		<a href="index.php?action=post_manager">Tous les articles</a>
	</div>
	<hr class="mb-3" />

	<div>
		<h2></h2> <p></p>
	</div>

	<form class="row" action="index.php?action=save_edited_post&amp;post_id=<?= $post_to_edit['postid'] ?>" method="post">
		<div class="col-md-10">
			<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" value="<?= htmlspecialchars($post_to_edit['title']) ?>" />
			<input id="description" class="form-control form my-2" aria-describedby="description" name="description" value="<?= htmlspecialchars($post_to_edit['description']) ?>" />
			<textarea class="post-editor" aria-describedby="contenu" name="content"> 
				<p><?= htmlspecialchars($post_to_edit['content']) ?> </p> 
			</textarea>
		</div>
		<div class="col-md-2 list-group justify-content-end">	
			<a class="list-group-item list-group-item-action text-center" data-toggle="collapse" href="#tags" role="button" aria-expanded="false" aria-controls="tags">
    			Rubriques
			</a>
			<div class="collapse" id="tags">
				<?php foreach ($tags as $tag): ?>
					<input type="radio" name="tag_id" value="<?= $tag['id'] ?>" >
					<label><?= $tag['label'] ?></label>
				<?php endforeach; ?>
				<?php if (isset($_SESSION) && isset($_SESSION['username']) && $_SESSION['role'] === 'admin' ) : ?>
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
