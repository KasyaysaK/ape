<?php $title = htmlspecialchars('APE : Panneau d\'administration : Liste des commentaires'); ?>

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
		<table class="table table-light table-striped" data-aos="zoom-in" data-aos-duration="500">
	  		<thead>
		    	<tr>
		      		<th class="border-right text-center" scope="col">Pseudo</th>
		      		<th class="border-right text-center" scope="col">Commentaire</th>
		      		<th class="border-right text-center" scope="col">Signalement</th>
		      		<th class="border-right text-center" scope="col">Valider</th>
		      		<th class="border-right text-center" scope="col">Modérer</th>
		      		<th class="border-right text-center" scope="col">Rejeter</th>

		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<?php foreach ($comments as $comment): ?>
			    <tr>
			      	<td class="border-right text-center"><?= htmlspecialchars($comment['name']); ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($comment['comment']) ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($comment['flagged']) ?></td>
			      	<td class="border-right text-center"><a href="index.php?action=unflag_comment&amp;id=<?= $comment['id'] ?>" class="btn"><i class="fas fa-check"></i></a></td>
			      	<td class="border-right text-center"><a href="index.php?action=edit_comment&amp;id=<?= $comment['id'] ?>" class="btn"><i class="fas fa-edit"></i></a></td>
			      	<td class="border-right text-center"><a href="index.php?action=delete_comment&amp;id=<?= $comment['id'] ?>" class="btn"><i class="far fa-trash-alt"></i></a></td>
			    </tr>
				<?php endforeach; ?>   
	  		</tbody>
		</table>
	</div>	
</div>

<?php $admin_content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
