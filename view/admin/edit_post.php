<?php $title = htmlspecialchars('Panneau d\'administration : Modifier l\'article'); ?>

<?php ob_start(); ?>

<div class="container mt-4">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
		<h2 class="text-center">Modifier l'article</h2>
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
			<div class="collapse text-center mb-3" id="tags">
				<div class="error" id="addTagError"></div>
				<?php foreach ($tags as $tag): ?>
					<div class="form-group">
						<input id="addTag"  type="radio" name="tag_id" value="<?= $tag['id'] ?>">
						<label><?= $tag['label'] ?></label>
					</div>
     			<?php endforeach; ?>
				<hr class="mb-3" />
				<?php if (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'admin' ) : ?>
     			 <span class="my-2"><a href="index.php?action=display_tags" class=""><p class="text-center">Gérer les Rubriques</p></a></span>	
     			<?php endif; ?>
				<hr class="mb-3" />	
			</div>	
			<!-- Preview -->
			<button type="submit" class="list-group-item list-group-item-action text-center">Publier</button>
			<a href="index.php?action=erase_post" class="list-group-item list-group-item-action text-center">Supprimer</a>
		</div>
    </form>
</div>

<?php $admin_content = ob_get_clean(); ?>
  
    

<?php require('view/template.php'); ?>
