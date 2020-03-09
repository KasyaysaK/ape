<?php $title = htmlspecialchars('APE : Devenir auteur'); ?>

<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<a href="index.php?action=dashboard"><i class="fas fa-arrow-left"></i></a>
		<h2 class="text-center title">Contributions</h2>
		<a href=""></a>
	</div>
	<hr class="mb-3" />
	<div>
		<h3 class="text-center">Être auteur sur l'APE.</h3>
		<p>Notre communauté grandit de jour en jour. Nous avons décider d'agrandir notre équipe afin de pouvoir proposer du contenu toujours aussi intéressant. <br/>
			Nous rentrerons dans une phase de recrutement durant le mois d'avril. Si cela vous intéresse, il suffira de remplir le formulaire et de l'envoyer. Vous recevrez un email contenant des explications sur ce qui est attendu de vous et ce que vous recevrez en échange de vos contributions. <br />
			Ne vous inquiétez pas si vous n'êtes pas recrutés pour cette phase de sélection, nous avons pour objectif d'en tenir plusieurs car nous pensons que notre site ne continuera d'évoluer d'ici là !</p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>


