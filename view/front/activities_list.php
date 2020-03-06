<?php $title = htmlspecialchars('La revue : liste des activités'); ?>

<?php ob_start(); ?>
<div class="container">
	<div>
		<hr class="mb-3" />
		<div class="d-flex align-items-center justify-content-between">
			<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
			<h2 class="text-center title">La revue : toutes les activités</h2>
			<a href="index.php?action=list_posts">Toutes les publications</a>
		</div>
		<hr class="mb-3" />
	</div>
	<div class="row">
		<div class="col-md-8">
			<?php foreach ($activities as $activity): ?>
	      	<div class="card mb-2" data-aos="fade-left" data-aos-easing="ease-in-sine">
	            <div class="card-body">
	              	<h3 class="card-title"><?= $activity['title']; ?></h3>
	              	<p class="card-text"><? $activity['description'] ?></p>
	              	<a href="index.php?action=display_post&amp;id=<?= $activity['id'] ?>"><h3 class="title btn btn-outline-success my-2 my-sm-0">Lire la suite</h3></a> 
	            </div>
	      	</div>
			<?php endforeach; ?>
	    </div>
	    <div class="col-sm-4" data-aos="fade-up-left" data-aos-duration="1000">
            <?php include('view/includes/sidebar.php'); ?>
	    </div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

