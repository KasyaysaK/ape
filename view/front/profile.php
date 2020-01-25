<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<h4>voici votre profile</h4>


<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>

