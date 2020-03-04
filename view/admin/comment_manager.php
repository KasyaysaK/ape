<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<a href="index.php?action=dashboard"><i class="fas fa-arrow-left"></i></a>
		<h2 class="text-center">Commentaires</h2>
		<a href=""></a>
	</div>
	<hr class="mb-3" />
	<div>
		<table class="table table-light table-striped">
	  		<thead>
		    	<tr>
		      		<th class="text-center" scope="col">Pseudo</th>
		      		<th class="text-center" scope="col">Commentaire</th>
		      		<th class="text-center" scope="col">Article</th>
		      		<th class="text-center" scope="col">Action</th>

		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<?php foreach ($comments as $comment): ?>
			    <tr>
			      	<td class="border-right text-center"><?= htmlspecialchars($comment['name']); ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($comment['comment']) ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($comment['']) ?></td>
			      	<td>
			      		<a href="index.php?action=display_comment&amp;id=<?= $comment['id'] ?>" class="btn"><i class="far fa-eye"></i></a>|<a href="index.php?action=edit_comment&amp;id=<?= $comment['commentid'] ?>" class="btn"><i class="fas fa-edit"></i></a>|<a href="index.php?action=remove_comment&amp;comment_id=<?= $comment['id'] ?>" class="btn"><i class="far fa-trash-alt"></i></a>  
			      	</td>
			    </tr>
				<?php endforeach; ?>   
	  		</tbody>
		</table>
	</div>	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
