<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<a href="index.php?action=dashboard"><i class="fas fa-arrow-left"></i></a>
		<h2 class="text-center">Article</h2>
		<a href="index.php?action=add_post"><i class="far fa-plus-square"></i></a>
	</div>
	<hr class="mb-3" />
	<div>
		<table class="table table-light table-striped">
	  		<thead>
		    	<tr>
		      		<th scope="col">Titre</th>
		      		<th scope="col">Contenu</th>
		      		<th scope="col">Rubrique</th>
		      		<th scope="col">Date de publication</th>
		      		<th>Action</th>

		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<?php foreach ($posts as $post): ?>
			    <tr>
			      	<td><?= htmlspecialchars($post['title']); ?></td>
			      	<td><?= htmlspecialchars(substr($post['content'], 0, 60)) ?>...</td>
			      	<td><?= htmlspecialchars($post['label']) ?></td>
			      	<td><?= $post['creation_date_fr'] ?></td>
			      	<td>
			      		<a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>" class="btn"><i class="far fa-eye"></i></a> | <a href="index.php?action=edit_post&amp;id=<?= $post['id'] ?>" class="btn"><i class="fas fa-edit"></i></a> | <a href="index.php?action=remove_post&amp;post_id=<?= $post['id'] ?>" class="btn"><i class="far fa-trash-alt"></i></a>  
			      	</td>
			    </tr>
				<?php endforeach; ?>   
	  		</tbody>
		</table>
	</div>	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
