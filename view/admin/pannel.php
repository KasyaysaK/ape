<?php $title = htmlspecialchars('Panneau d\'administration'); ?>

<?php ob_start(); ?>

<div class="container">

	<hr class="mb-3" />
	<h2 class="text-center title">Gestion du site</h2>
	<hr class="mb-3" />

	<div class="row">
		<div class="col-md-6 mb-4" data-aos="fade-right" data-aos-duration="1000">
    		<fieldset>
			  	<legend><i class="icons far fa-plus-square"></i></legend>
			    <a href="index.php?action=add_post"><h4 class="title btn btn-secondary my-2 my-sm-0">Ajouter un article</h4></a>
			</fieldset>
		</div>
		<div class="col-md-6 mb-4" data-aos="fade-left" data-aos-duration="1500">
    		<fieldset>
			  	<legend><i class="icons far fa-newspaper"></i></legend>
			    <a href="index.php?action=post_manager"><h4 class="title btn btn-secondary my-2 my-sm-0">Gérer les articles</h4></a>
			</fieldset>
		</div>
		<div class="col-md-6 my-4" data-aos="fade-right" data-aos-duration="2000">
    		<fieldset>
			  	<legend><i class="icons far fa-comments"></i></legend>
			    <a href="index.php?action=comment_manager"><h4 class="title btn btn-secondary my-2 my-sm-0">Gérer les commentaires</h4></a>
			</fieldset>
		</div>
		<div class="col-md-6 my-4" data-aos="fade-left" data-aos-duration="2500">
    		<fieldset>
			  	<legend><i class="icons fas fa-users"></i></legend>
			    <a href="index.php?action=user_manager"><h4 class="title btn btn-secondary my-2 my-sm-0">Gérer les utilisateurs</h4></a>
			</fieldset>
		</div>	
	</div>
			
</div>



<?php $admin_content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

