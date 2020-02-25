<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-around">	
		<a href="index.php?action=dashboard"><i class="fas fa-arrow-left"></i></a>
		<h2 class="text-center">Utilisateurs</h2>
		<a href=""></a>
	</div>
	<hr class="mb-3" />
	<div>
		<table class="table table-light table-striped">
	  		<thead>
		    	<tr>
		      		<th scope="col">Pseudo</th>
		      		<th scope="col">Rôle</th>
		      		<th scope="col">Signalement</th>
		      		<th>Action</th>

		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<?php foreach ($users as $user): ?>
			    <tr>
			      	<td><?= htmlspecialchars($user['name']); ?></td>
			      	<td><?= htmlspecialchars($user['type']) ?></td>
			      	<td><?= htmlspecialchars($user['status']) ?></td>
			      	<td>
			      		<a href="index.php?action=display_profile&amp;id=<?= $user['id'] ?>" class="btn"><i class="far fa-eye"></i></a> | 
			      		<!-- Button trigger modal -->
						<button type="button" class="btn" data-toggle="modal" data-target="#role"><i class="fas fa-user-tag"></i></button>
						<!-- Modal -->
						<div class="modal fade" id="role" tabindex="-1" role="dialog" aria-labelledby="role-title" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
						      		<div class="modal-header">
								        <h5 class="modal-title title" id="role-title">Rôle du membre</h5>
						      		</div>
						      		<form action="index.php?action=update_role" method="POST">
					         			<div class="modal-body">
					         				<?php foreach ($roles as $role): ?>
				         					<div class="form-group" id="role_id">
												<input type="radio" name="role_id">
												<label class="form-control"><?= $role['type'] ?></label>
											</div>
											<?php endforeach; ?>					         			
					         			</div>
							      		<div class="modal-footer justify-content-center">
				  							<input type="submit" name="role" value="valider" class="title btn btn-outline-success mt-2">
							       		 	<button type="button" class="title btn btn-outline-secondary my-2 my-sm-0" data-dismiss="modal">annuler</button>
								      	</div>
								    </form>
							    </div>
							</div>
						</div> | 
						<a href="index.hp?action=ban_user&amp;user_id=<?= $user['id'] ?>" class="btn"><i class="far fa-trash-alt"></i></a>  
			      	</td>
			    </tr>
				<?php endforeach; ?>   
	  		</tbody>
		</table>
	</div>	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
