<?php $title = htmlspecialchars('APE : Panneau d\'administration : Liste des articles'); ?>

<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
		<h2 class="text-center">Articles</h2>
		<a href="index.php?action=add_post"><i class="icons far fa-plus-square"></i></a>
	</div>
	<hr class="mb-3" />
	<div>
		<table class="table table-light table-striped" data-aos="zoom-in" data-aos-duration="500">
	  		<thead>
		    	<tr>
		      		<th class="border-right text-center" scope="col">Titre</th>
		      		<th class="border-right text-center" scope="col">Description</th>
		      		<th class="border-right text-center" scope="col">Auteur</th>
		      		<th class="border-right text-center" scope="col">Rubrique</th>
		      		<th class="border-right text-center" scope="col">Voir</th>
		      		<th class="border-right text-center" scope="col">Modifier</th>
		      		<th class="border-right text-center" scope="col">Supprimer</th>

		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<?php foreach ($posts as $post): ?>
			    <tr>
			      	<td class="border-right text-center"><?= htmlspecialchars($post['title']); ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($post['description']) ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($post['author']) ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($post['label']) ?></td>
			      	<td class="border-right text-center"><a href="index.php?action=display_post&amp;id=<?= $post['postid'] ?>" class="btn"><i class="far fa-eye"></i></a></td>
			      	<td class="border-right text-center"><a href="index.php?action=edit_post&amp;id=<?= $post['postid'] ?>" class="btn"><i class="fas fa-edit"></i></a></td>
			      	<td class="border-right text-center"><a href="index.php?action=remove_post&amp;post_id=<?= $post['postid'] ?>" class="btn"><i class="far fa-trash-alt"></i></a></td>
			    </tr>
				<?php endforeach; ?>   
	  		</tbody>
		</table>
	</div>	
</div>

<?php $admin_content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
