<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container-fluid">
	<div class="row justify-content-start">
	    <div class="col-2 sidebar">
	      Sidebar

	      <ul>
	      	<li>lien vers ci</li>
	      	<li>lien vers ça</li>
	      </ul>
	    </div>

	    <div class="col-3 offset-3">
	     <div class="d-flex justify-content-between">
	     	<div>édition du profil</div>
	     	<div>message</div>
	     </div>
	     <div>
	     	<p>activité en famille</p>
	     </div>
	    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view /template.php'); ?>

