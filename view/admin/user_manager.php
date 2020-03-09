<?php $title = htmlspecialchars('APE : Panneau d\'administration : Liste des utilisateurs'); ?>

<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
		<h2 class="text-center">Utilisateurs</h2>
		<a href=""></a>
	</div>
	<hr class="mb-3" />
	<div>
		<table class="table table-light table-striped" data-aos="zoom-in" data-aos-duration="500">
	  		<thead>
		    	<tr>
		      		<th class="border-right text-center" scope="col">Pseudo</th>
		      		<th class="border-right text-center" scope="col">Rôle</th>
		      		<th class="border-right text-center" scope="col">Modifier</th>
		      		<th class="border-right text-center" scope="col">Bannir</th>

		    	</tr> 		
		  	</thead>
		  	<tbody>
			  	<?php foreach ($users as $user): ?>
			    <tr>
			      	<td class="border-right text-center"><?= htmlspecialchars($user['name']); ?></td>
			      	<td class="border-right text-center"><?= htmlspecialchars($user['rolelabel']) ?></td>
			      	<td class="border-right text-center">
			      		<!-- Button trigger modal -->
						<button type="button" class="btn" data-toggle="modal" data-target="#role-<?= $user['userid'] ?>"><i class="fas fa-user-tag"></i></button>
						<!-- Modal -->
						<div class="modal fade" id="role-<?= $user['userid'] ?>" tabindex="-1" role="dialog" aria-labelledby="role-title" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
						      		<div class="modal-header">
								        <h5 class="modal-title title" id="role-title">Rôle du membre : <?= $user['name'] ?> </h5>
						      		</div>
						      		<form action="index.php?action=update_role&amp;id=<?= $user['userid'] ?>" method="POST">
					         			<div class="modal-body">
					         				<?php foreach ($roles as $role): ?>
				         					<div class="form-group" id="role_id">
												<input type="radio" name="role_id" value="<?= $role['id'] ?>">
												<label class="form-control"><?= $role['label'] ?></label>
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
						</div>
					</td>
			      	<td class="border-right text-center"><a href="index.php?action=ban_user&amp;user_id=<?= $user['userid'] ?>" class="btn"><i class="far fa-trash-alt"></i></a></td>
			    </tr>
				<?php endforeach; ?>   
	  		</tbody>
		</table>
	</div>	
</div>

<?php $admin_content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
