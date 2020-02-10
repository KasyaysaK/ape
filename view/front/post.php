<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

   	<div class="container">
   		<hr class="mb-3" />
		<h2 class="text-center">Ajouter un nouvel article</h2>
		<a href="index.php?action=dashboard">Revenir sur la page d'administration</a>
		<hr class="mb-3" />
		<div class="row">
			<div class="col-10 offset-1">
				<div class="d-flex justify-content-between my-4">
					<a href="index.php" class="btn btn-dark">Revenir à la page d'accueil</a>
					<a href="index.php?action=listPosts" class="btn btn-dark">Revenir à la liste des chapitres</a>	
				</div>



				<div class="card content">
					<div class="card-header d-flex justify-content-between">
						 <h3 class="card-title"><?= $post['title'] ?></h3>
				         <p class="card-subtitle">le <?= $post['creation_date_fr'] ?></p>    	
					</div>
				   <div class="card-body">
				   		<div class="card-text">
				   			<p>
					        	<?= nl2br($post['content']) ?>
					    	</p>

				   		</div>
					    
				    </div>
				    <div class="card-footer"><a href="#add-comment">Donnez-moi votre avis</a></div> 
				</div>

				<h4>Commentaires</h4>
				<form id="add-comment" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
	       			 <div class="form-group">
				        <input id="author" class="form-control form" aria-describedby="auteur" name="author" placeholder="Entrez votre nom" />
				    </div>
				    <div class="form-group">
				        <textarea id="comment" class="form-control form" aria-describedby="commentaire" name="comment" placeholder="Entrez vore commentaire"></textarea>
				    </div>
				    <div>
				         <button type="submit" class="btn btn-dark">Envoyer</button>
				    </div>
	    		</form>

				<?php foreach ($comment as $comment): ?>
				<div class="card content">
					<div class="card-header d-flex justify-content-between">
						<h5 class="card-title"><?= htmlspecialchars($comment['author']) ?></h5>
						<h6 class="card-subtitle">le <?= $comment['comment_date_fr'] ?></h6>
					</div>
					<div class="card-body">
		  	  			<p class="card-text"><?= htmlspecialchars($comment['comment']) ?></p>
					</div>
				   	<div class="card-footer">
				   		<!-- Button trigger modal -->
						<a href="index.php?action=flagComment&amp;postId=<?= $post['id'] ?>&amp;commentId=<?= $comment['id'] ?>" class="btn btn-dark flag ">
						  <i class="fas fa-exclamation-triangle warning"></i>
						</a>				   		
				   	</div>
				</div>

				<?php endforeach; ?>

			</div>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
