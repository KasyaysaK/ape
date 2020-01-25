<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<section class="container-fluid">
	<div id="carouselHome" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselHome" data-slide-to="0" class="active"></li>
	    	<li data-target="#carouselHome" data-slide-to="1"></li>
	    	<li data-target="#carouselHome" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
	    <div class="carousel-item active">
	  		<img class="d-block w-100" src="public/images/together.jpg" alt="First slide">
	  		<div class="carousel-caption d-none d-md-block">
			    <h5>...</h5>
			    <p>...</p>
		  	</div>
	    </div>
	    <div class="carousel-item">
	  		<img class="d-block w-100" src="public/images/projects.jpg" alt="Second slide">
	  		<div class="carousel-caption d-none d-md-block">
			    <h5>...</h5>
			    <p>...</p>
		  	</div>
	    </div>
	    <div class="carousel-item">
	  		<img class="d-block w-100" src="public/images/idea.jpg" alt="Third slide">
	  		<div class="carousel-caption d-none d-md-block">
			    <h5>...</h5>
			    <p>...</p>
		  	</div>
	    </div>
	</div>
</section>

<section class="container my-4">
	<div class="row">
		<div class="col-7 offset-1">
			<h2>Activité du mois</h2>
			<p>Photo avec description d'une activité à faire à la maison. Accessible si la personne est connectée (revue de l'APE)</p>
		</div>
		<div class="col-3 offset-1">
			<h2>Évênement en cours</h2>
			<p>Tableau ou liste avec date, lieu et description de l'évênement (projets en cours)</p>
		</div>
	</div>	
</section>
	
	

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

