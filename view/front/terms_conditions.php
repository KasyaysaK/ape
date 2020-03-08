<?php $title = htmlspecialchars('Mentions légales'); ?>

<?php ob_start(); ?>

<div class="container">
	<hr class="mb-3" />
	<div class="d-flex align-items-center justify-content-between">	
		<button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
		<h2 class="text-center">Mentions légales</h2>
		<a href=""></a>
	</div>
	<hr class="mb-3" />
	<div>
		<div class="legal-information">
			<p>
				Le site est hébergé par : <br />
				<span>
					adresse de l'hébergeur
				</span> 
			</p>

			<p>
				Les articles sur le site sont rédigés par le webmaster, Charlène Caruk, ou par des auteurs dont le nom est mentionné dans l'entête. <br />
				Il est possible de contacter le webmaster en utilisant le <a href="index.php?action=contact">formulaire de contact</a> ou directement par <a href="mailto:charlene.caruk@gmail.com?subject=Contact à partir des mentions légales via le site">mail</a>.
			</p>
		</div>
		<div class="intellectual-property">
			<p>Texte concernant la propriété intellectuelle</p>
		</div>
		<div class="cookies">
			<p>
				Le site utilise les cookies pour vous différencier des autres utilisateurs. Cela nous permet de vous offrir un meilleur service lorsque vous naviguez sur notre site et également d'améliorer le site.
			</p>
		</div>
		<div class="privacy-policy">
			<p>Texte concernant la politique de confidentialité</p>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>


