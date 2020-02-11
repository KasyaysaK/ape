<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

   	<div class="container">
   		<hr class="mb-3" />
		<h2 class="text-center"><?= $post['title'] ?></h2>
		 <p class="card-subtitle">le <?= $post['creation_date_fr'] ?></p> 
		<hr class="mb-3" />
		<div class="row">
			<div class="col-md-8">
	   			<p>
		        	<?= nl2br($post['content']) ?>
		    	</p>
				 <a href="#add-comment">Laisser un commentaire</a>
			</div>

			<div class="col-sm-4">
	    	<div>
	    		<h3>Autre articles</h3>
	    		<hr class="mb-3" />
	    			<?php foreach ($last_posts as $post): ?>
	    				<ul class="list-group">
	    					<li class="list-group-item">
	    						<a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']); ?></a>
	    					</li>
	    				</ul>
				      	
				     <?php endforeach; ?> 
	    		</div>
	    	</div>
	    </div>

		</div>
		<div class="col-md-6">
			<h3>Commentaires</h3>
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

		</div>		
			
				<?php endforeach; ?>

	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
