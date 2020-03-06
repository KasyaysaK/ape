<?php $title = htmlspecialchars('Panneau d\'administration : Liste des commentaires'); ?>

<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
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
		      		<th class="text-center" scope="col">Signalement</th>
		      		<th class="text-center" scope="col">Action</th>

		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<?php foreach ($comments as $comment): ?>
			    <tr>
			      	<td class="border-right text-center"><?= htmlspecialchars($comment['name']); ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($comment['comment']) ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($comment['flagged']) ?></td>
			      	<td>
			      		<a href="index.php?action=unflag_comment&amp;id=<?= $comment['id'] ?>" class="btn"><i class="fas fa-check"></i></a>
			      		<a href="index.php?action=edit_comment&amp;id=<?= $comment['id'] ?>" class="btn"><i class="fas fa-edit"></i></a>
			      		<a href="index.php?action=delete_comment&amp;id=<?= $comment['id'] ?>" class="btn"><i class="far fa-trash-alt"></i></a>  
			      	</td>
			    </tr>
				<?php endforeach; ?>   
	  		</tbody>
		</table>
	</div>	
</div>

<?php $admin_content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
