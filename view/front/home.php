<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container my-4">

	<div class="col-md-6 offset-4 text-justify">
		<p>
			Description du site avec un lien vers la page d'à propos.<br />
			Pourquoi : <br />
			Comment : <br />
			Pour qui : <br />
			Par qui : <br />
		</p>
	</div>


	<hr class="mt-5" />
   	<div class="text-center">
   		<h2>À faire en famille</h2>
		<p>Des activités ludiques à faire à l'extérieur ou à la maison, des plats à cuisiner ensemble.</p>
   	</div>
	
	<hr class="mb-3" />
	<div class="row">

    <!--Carousel Wrapper-->
    <div id="entry-carousel" class="carousel slide carousel-multi-item" data-ride="carousel">

      	<!--Controls-->
    	<div class="controls-top text-center">
	        <button class="btn btn-floating" href="#entry-carousel" data-slide="prev"><i class="fa fa-chevron-left icons"></i></button>
	        <button class="btn btn-floating" href="#entry-carousel" data-slide="next"><i class="fa fa-chevron-right icons"></i></button>
      	</div>
      	<!--/.Controls-->


      	<!--Slides-->
      	<div class="carousel-inner" role="listbox">

	        <!--First slide-->
	        <div class="carousel-item active">
		      	<div class="row">

			        <div class="col-md-4">
			        	
		          		<div class="card mb-2">
		            		<img class="card-img-top" src=""
			              alt="Une femme s'étire sur un tapis de yoga">
		            		<div class="card-body">
		              			<h4 class="card-title"><?= $post['title']; ?></h4>
		      					<p class="card-text"><?= substr($post['content'], 0, 120) ?>...</p>
			                	<h4 class="title btn btn-outline-success"><a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>" class="btn btn-dark">Lire la suite</a></h4> 
			            	</div>
		          		</div>
			        </div>
	      		</div>
	        </div>
	        <!--/.First slide-->

	        <!--Second slide-->
	        <div class="carousel-item">
	          	<div class="row">

		            <div class="col-md-4">
		              	<div class="card mb-2">
		                	<img class="card-img-top" src="public/images/granola.jpg"
		                  alt="Card image cap">
		                	<div class="card-body">
		                  		<h4 class="card-title">Granola maison</h4>
			                  	<p class="card-text">Du granola sur une cuillère en bois</p>
			                  	<h4 class="title btn btn-outline-success my-2 my-sm-0">Voir</h4> 
		                	</div>
		              	</div>
		            </div>

		            <div class="col-md-4 clearfix d-none d-md-block">
		              	<div class="card mb-2">
			                <img class="card-img-top" src="public/images/pizza.jpg"
			                  alt="Card image cap">
			                <div class="card-body">
			                  	<h4 class="card-title">Pizza</h4>
			                  	<p class="card-text">Qui a dit que la pizza était à bannir ? Choississez vos toppings en la faisant maison !</p>
			                  	<h4 class="title btn btn-outline-success my-2 my-sm-0">Voir</h4> 
			                </div>
		              	</div>
		            </div>

		            <div class="col-md-4 clearfix d-none d-md-block">
			          	<div class="card mb-2">
				            <img class="card-img-top" src="public/images/cookies.jpg"
				              alt="Card image cap">
				            <div class="card-body">
				              	<h4 class="card-title">Sablés</h4>
				              	<p class="card-text">De la farine, du beurre, un peu de sucre et des emportes pièces.</p>
				              	<h4 class="title btn btn-outline-success my-2 my-sm-0">Voir</h4> 
				            </div>
		          		</div>
			        </div>

	        	</div>
	      </div>
	      <!--/.Second slide-->
	    </div>
	    <!--/.Slides-->
 	</div>
    <!--/.Carousel Wrapper-->

	

</div>
		
<div class="my-4">
   	
 	<hr class="mt-5" />
	<div class="text-center">
		<h2 class="text-center">Nos derniers articles</h2>
		<p>Différents thèmes : grossesse, alimentation, éducation, sexualité, ...</p>
	</div>
	<hr class="mb-3" />

	<div class="row">
		<div class="col-md-8">
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

