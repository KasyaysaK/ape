<?php $title = htmlspecialchars('La revue : liste des rubriques'); ?>

<?php ob_start(); ?>
<div class="container">
	<div>
		<hr class="mb-3" />
		<div class="d-flex align-items-center justify-content-between">
			<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
			<h2 class="text-center title">La revue : toutes les publications</h2>
			<a href=""></a>
		</div>
		<hr class="mb-3" />
	</div>
	<div class="row">
		<div class="col-md-8">
			<?php foreach ($posts as $post): ?>
	      	<div class="card mb-2" data-aos="fade-left" data-aos-easing="ease-in-sine">
	            <div class="card-body">
	              	<h3 class="card-title"><?= $post['title']; ?></h3>
	              	<p class="card-text"><?= $post['description'] ?></p>
	              	<a href="index.php?action=display_post&amp;id=<?= $post['postid'] ?>"><h3 class="title btn btn-outline-success my-2 my-sm-0">Lire la suite</h3></a> 
	            </div>
	      	</div>
			<?php endforeach; ?>
	    </div>
	    <div class="col-sm-4">
	    	<div>
	    		<h3>Derniers commentaires</h3>
	    		<hr class="mb-3" />
	    		<div>
	    			<?php foreach ($last_comments as $comment): ?>
				      	<p>
				      		Par <?= htmlspecialchars($comment['name']); ?> sur <a href="index.php?action=display_post&amp;id=<?= $comment['postid'] ?>"><?= htmlspecialchars($comment['title']); ?></a>
				      	<br /><?= htmlspecialchars($comment['comment']) ?>
				      
				      	</p>
				      	
				     <?php endforeach; ?> 
	    		</div>
	    	</div>
	    </div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

