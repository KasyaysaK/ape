<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container my-4">
	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dictum, mauris et scelerisque dignissim, tellus est tincidunt diam, in varius mi risus at elit. Pellentesque eu tempus lorem. Vestibulum ac tincidunt tortor. Cras nunc orci, euismod ut ultricies vitae, congue ut quam. In eu elementum dolor, non congue turpis. Ut sed ultrices lorem. Phasellus hendrerit nisi nibh, in congue sem pellentesque in. Etiam porttitor tempus sem vel lacinia. Quisque ante orci, rutrum eu ornare in, viverra in orci. 
	</p>
</div>

<div id="carousel" class="carousel slide my-4" data-ride="carousel">
  	<div class="carousel-inner">
	    <div class="carousel-item active">
	      	<img class="d-block w-100" src="public/images/family.jpg" alt="First slide" />
	      	<div class="carousel-caption d-none d-md-block">
			    <h3>La revue</h3>
			    <a class="title btn btn-outline-success my-2 my-sm-0" href="index.php?action=list_posts">Lire les articles</a>
		  	</div>
	    </div>
	    <div class="carousel-item">
     	 	<img class="d-block w-100" src="public/images/together.jpg" alt="Second slide" />
	      	<div class="carousel-caption d-none d-md-block">
			    <h3>La revue</h3>
			    <a class="title btn btn-outline-success my-2 my-sm-0" href="index.php?action=list_posts">Lire les articles</a>
		  	</div>
	    </div>
	    <div class="carousel-item">
	      	<img class="d-block w-100" src="public/images/kid_activity_1.jpg" alt="Third slide" />
	      	<div class="carousel-caption d-none d-md-block">
			    <h3>La revue</h3>
			    <a class="title btn btn-outline-success my-2 my-sm-0" href="index.php?action=list_posts">Lire les articles</a>
		  	</div>
	    </div>
	  </div>	
	  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
</div>
	

		
<div class="container my-4">
   	
 	<hr class="mt-5" />
	<div class="text-center">
		<h2 class="text-center">Nos derniers articles</h2>
		<p>Différents thèmes : grossesse, alimentation, éducation, sexualité, ...</p>
	</div>
	<hr class="mb-3" />

	<div class="row">
		<div class="col-md-4">
			<?php foreach ($last_posts as $post): ?>
          	<div class="card mb-2">
	            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
	              alt="Card image cap">
	            <div class="card-body">
	              	<h4 class="card-title"><?= $post['title']; ?></h4>
	              	<p class="card-text"><?= substr($post['content'], 0, 120) ?>...</p>
	              	<a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>"><h4 class="title btn btn-outline-success my-2 my-sm-0">Lire la suite</h4></a> 
	            </div>
          	</div>
          	<?php endforeach; ?>
        </div>
	</div>

</div>

	
	

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

