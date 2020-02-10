<?php $title = htmlspecialchars('Liste des articles'); ?>

<?php ob_start(); ?>
    
	<div class="container my-5">
		<div class="row">
			<div class="col-10 offset-1 text-center">
    			<h2 class="">La revue</h2>
   
			    <?php foreach ($posts as $post): ?>
				<div class="card content">
					<div class="card-header d-flex justify-content-between">
						 <h3 class="card-title"><?= $post['title']; ?></h3>
					</div>
				   <div class="card-body">
				   		<div class="card-text">
				   			<p>
					        	<?= substr($post['content'], 0, 120) ?>...
					    	</p>

				   		</div>
					    
				    </div>
				    <div class="card-footer"><a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>" class="btn btn-dark">Lire la suite</a></div> 
				</div>
			    <?php endforeach; ?>
			</div>
		</div>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

