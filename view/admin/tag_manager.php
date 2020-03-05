<?php $title = htmlspecialchars('Panneau d\'administration : Gérer les rubriques'); ?>

<?php ob_start(); ?>
<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-around">	
		<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
		<h2 class="text-center">Rubriques</h2>
		<a data-toggle="collapse" href="#add-tag" role="button" aria-expanded="false" aria-controls="add-tag"><i class="icons far fa-plus-square"></i></a>
	</div>
	<hr class="mb-3" />
	<div>
		<table class="table table-light table-striped">
	  		<thead>
		    	<tr>
		      		<th class="text-center" scope="col">Rubrique</th>
		      		<th class="text-center" scope="col">Nombre d'articles</th>
		      		<th class="text-center" scope="col">Action</th>

		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<?php foreach ($tags as $tag): ?>
			    <tr>
			      	<td class="border-right text-center"><?= htmlspecialchars($tag['label']); ?></td>
			      	<td class="border-right text-center"></td>
			      	<td class="text-center">
			      		<a href="index.php?action=display_profile&amp;user_id=<?= $user['userid'] ?>" class="btn"><i class="far fa-eye"></i></a> |  
						<a href="index.hp?action=ban_user&amp;user_id=<?= $user['id'] ?>" class="btn"><i class="far fa-trash-alt"></i></a>  
			      	</td>
			    </tr>
				<?php endforeach; ?>   
	  		</tbody>
		</table>
	</div>
	<div class="collapse" id="add-tag">
		<hr class="my-3" />
		<div class="d-flex align-items-center justify-content-around">	
			<h3 class="text-center">Nouvelle rubrique</h3>
		</div>
		<hr class="mb-3" />
		<form id="add-tag" action="index.php?action=add_tag" method="POST">
			<div class="form-group">
				<input type="text" name="tag-name" class="form-control" id="tag-name" placeholder="Insérez le nom de la rubrique ici" />
			</div>
			<input type="submit" class="title btn btn-outline-success my-2 my-sm-0" name="add-tag" value="valider">
		</form>
	</div>
</div>

<?php $content = ob_get_clean(); ?>  
<?php require('view/template.php'); ?>