<?php $title = htmlspecialchars('APE : Gestionnaire des articles'); ?>

<?php ob_start(); ?>

<div class="container">

	<hr class="mb-3" />
	<h2 class="text-center title">Gestion des articles</h2>
	<hr class="mb-3" />

	<div class="row">
		<div class="col-md-12 mb-4" data-aos="fade-down">
    		<fieldset>
			  	<legend>Mes articles</legend>
			  	<table class="table table-light table-striped" data-aos="zoom-in" data-aos-duration="500">
	  		<thead>
		    	<tr>
		      		<th class="border-right text-center" scope="col">Titre</th>
		      		<th class="border-right text-center" scope="col">Description</th>
		      		<th class="border-right text-center" scope="col">Rubrique</th>
		      		<th class="border-right text-center" scope="col">Voir</th>
		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<!--<?php foreach ($author_posts as $post): ?> 
			    <tr>
			      	<td class="border-right text-center"><?= htmlspecialchars($post['title']); ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($post['description']) ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($post['label']) ?></td>
			      	<td class="border-right text-center"><a href="index.php?action=display_post&amp;id=<?= $post['postid'] ?>" class="btn"><i class="far fa-eye"></i></a></td>
			    </tr>
				<?php endforeach; ?> -->  
	  		</tbody>
		</table>
			    <p class="notice"><?= $notice ?></p>

			    <a data-toggle="collapse" href="#add-post" role="button" aria-expanded="false" aria-controls="add-post">Ajouter un article</h4></a>
			</fieldset>
		</div>
	</div>
	
	<div id="add-post" class="collapse">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
		<h2 class="text-center">Ajouter un nouvel article</h2>
		<a href=""></a>
	</div>
	<hr class="mb-3" />
	<div class="notice">
		
	</div>
		<form id="add_post" class="row" action="index.php?action=publish_post" onsubmit="return validatePost()" method="POST">
			<div class="col-md-10">
				<div class="form-group">
					<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" placeholder="Titre de l'article" />
					<div class="error" id="titleError"></div>
				</div>
				<div class="form-group">
					<label>Auteur</label>
					<input id="author" class="form-control form my-2" aria-describedby="auteur" name="author" value="<?= $_SESSION['name'] ?>" disabled/>
					<input type="hidden" name="author" value="<?= $_SESSION['name'] ?>" />
				</div>
				<div class="form-group">
					<input id="description" class="form-control form my-2" aria-describedby="description" name="description" placeholder="Description de l'article" />
					<div class="error" id="descriptionError"></div>
				</div>
				<div class="form-group">
					<textarea id="content" class="post-editor" aria-describedby="contenu" name="content" placeholder="Contenu de l'article"> </textarea>
					<div class="error" id="contentError"></div>
				</div>
			</div>
			<div class="col-md-2 list-group justify-content-end">	
				<a class="list-group-item list-group-item-action text-center mb-3" data-toggle="collapse" href="#tags" role="button" aria-expanded="false" aria-controls="tags">
	    			Rubriques
				</a>
				<div class="collapse text-center" id="tags">
	     			<div class="error" id="tagError"></div>
					<?php foreach ($tags as $tag): ?>
						<div class="form-group">
							<input id="tag"  type="radio" name="tag_id" value="<?= $tag['id'] ?>">
							<label><?= $tag['label'] ?></label>
						</div>
	     			<?php endforeach; ?>	
				</div>	
				<!-- Preview -->
				<button type="submit" class="text-center btn btn-outline-success" id="publish-post">Publier</button>
			</div>
		</form>	
	</div>
</div>


<?php $author_content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

