<?php $title = htmlspecialchars('APE : Panneau d\'administration : Gérer les rubriques'); ?>

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
		<table class="table table-light table-striped" data-aos="zoom-in"  data-aos-duration="500">
	  		<thead>
		    	<tr>
		      		<th class="border-right text-center" scope="col">Rubrique</th>
		      		<th class="border-right text-center" scope="col">Nombre d'articles</th>
		      		<th class="border-right text-center" scope="col">Supprimer</th>

		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<?php foreach ($tags as $tag): ?>
			    <tr>
			      	<td class="border-right text-center"><?= htmlspecialchars($tag['label']); ?></td>
			      	<td class="border-right text-center"></td>
			      	<td  class="border-right text-center"><a href="index.hp?action=delete_tag ?>" class="btn"><i class="far fa-trash-alt"></i></a></td>
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

<?php $admin_content = ob_get_clean(); ?>  
<?php require('view/template.php'); ?>