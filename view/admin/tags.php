<?php ob_start(); ?>
<div class="container">
	<form id="add-tag" action="index.php?action=add_tag" method="POST">
		<div class="form-group">
			<label for="tag-name">Ajouter une nouvelle rubrique</label>
			<input type="text" name="tag-name" class="form-control" id="tag-name" />
		</div>
		<input type="submit" class="title btn btn-outline-success my-2 my-sm-0" name="add-tag" value="valider">
	</form>
</div>

<?php $content = ob_get_clean(); ?>  
<?php require('view/template.php'); ?>