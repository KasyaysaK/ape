<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">
		<div>
			<h2 class=""><?= $post['title'] ?></h2>
	 		<p class="card-subtitle">publié le <?= $post['creation_date_fr'] ?> par </p> 
		</div>
		<?php if (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'admin' ) : ?>
		<div>
			<a href="index.php?action=edit_post&amp;id=<?= $post['postid'] ?>" class="btn"><i class="fas fa-edit"></i></a>
		</div>
		<?php endif; ?>
	</div>
	<hr class="mb-3" />

	<div class="row">
		<div class="col-md-9">
			<div class="post">
				<p>
		        	<?= nl2br($post['content']) ?>
		    	</p>
		    	<?php if (isset($_SESSION) && isset($_SESSION['name'])) : ?>
					<a href="#add-comment">Laisser un commentaire</a>
				<?php else : ?>
					<a href="#login-form" data-toggle="modal" data-target="#login-form">Connectez-vous pour pouvoir laisser un commentaire.</a>
				<?php endif; ?>
			</div>
			<div >
				<h5 class="d-flex align-items-center border-top border-bottom my-4">Dans la même rubrique</h5>
				<div class="d-flex">
					<?php foreach ($last_posts as $post): ?>
					<div class="col-md-4">
			          	<div class="card mb-2">
				            <div class="card-body">
				              	<h4 class="card-title"><?= $post['title']; ?></h4>
				              	<p class="card-text"><?= $post['description'] ?></p>
				              	<a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>"><h4 class="title btn btn-outline-success my-2 my-sm-0">Lire la suite</h4></a> 
				            </div>
			          	</div>
			        </div>
			      	<?php endforeach; ?>
				</div>
			</div>
			<div class="comments">
				<div class="d-flex align-items-center border-top border-bottom my-4">
					<h5>Commentaires</h5>
				</div>
				<div class="">
					<?php foreach ($comment as $comment): ?>
					<div class="d-flex justify-content-between">
						<p class=""><?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?></p>
						<span class="dropdown">
					        <a class="dropdown-toggle" href="#" id="comment-setting" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					        </a>
					        <div class="dropdown-menu" aria-labelledby="comment-setting">
					         	<a class="btn dropdown-item" href="index.php?action=flagComment&amp;postId=<?= $post['id'] ?>&amp;commentId=<?= $comment['id'] ?>">
									<i class="fas fa-exclamation-triangle warning"></i>
								</a>
							</div>
					    </span>
					</div>
		  	  		<p class="card-text"><?= htmlspecialchars($comment['comment']) ?></p>				   		
				   	<?php endforeach; ?>
				</div>
				<hr class="mb-3" />
				<div>
					<?php if (isset($_SESSION) && isset($_SESSION['name'])) : ?>	
					<hr class="mb-3" />
					<form class="my-4" id="add-comment" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
		       			 <div class="form-group">
		       			 	<label>Pseudo</label>
					        <input id="author" class="form-control form" aria-describedby="auteur" name="author" placeholder="Entrez votre nom" />
					    </div>
					    <div class="form-group">
					    	<label>Commentaire</label>
					        <textarea id="comment" class="form-control form" aria-describedby="commentaire" name="comment" placeholder="Entrez vore commentaire"></textarea>
					    </div>
					    <div>
					         <button type="submit" class="btn btn-dark">Envoyer</button>
					    </div>
		    		</form>
		    		<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="col-md-3 sidebar">
			<h6 class="text-center">Derniers articles</h6>
			<hr class="mb-3" />
			<?php foreach ($last_posts as $post): ?>
			<ul class="list-group">
				<li class="list-group-item list-group-item-action">
					<a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>" class="btn"><?= htmlspecialchars($post['title']) ?></a>
				</li>
			</ul>
			<?php endforeach; ?>
			<a href="index.php?action=list_posts" class="btn text-center">Voir tous les articles</a>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
