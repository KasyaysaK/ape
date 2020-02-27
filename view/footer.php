<?php if (!(array_key_exists('cookieConsent', $_COOKIE) && $_COOKIE['cookieConsent'] === 'dismissed')) : ?>
<div class="cookie-banner d-flex flex-column justify-content-between">
   <p class="">En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies. <a href="index.php?action=terms_conditions#cookies">En savoir plus</a></p>
   <button class="cookie-dismiss title btn btn-outline-success my-2 my-sm-0">OK</button>
</div>
<?php endif; ?>

<div class="d-flex justify-content-around align-items-center sitemap">
	<fieldset class="mt-4">
		<legend>À propos</legend>
		<ul class="list-group">
			<li class="list-group-item"><a href="index.php?action=about">Qui sommes nous</a></li>
			<li class="list-group-item"><a href="index.php?action=terms_conditions">Mentions légales</a></li>
			<li class="list-group-item"><a href="index.php?action=privacy_policy">Politique de confidentialité</a></li>
			<li class="list-group-item"><a href="index.php?action=contact">Contact</a></li>
		</ul>
	</fieldset>
	<fieldset>
		<legend>La revue</legend>
		<ul class="list-group">
			<li class="list-group-item"><a href="index.php?action=list_posts">Articles</a></li>
			<li class="list-group-item"><a href="index.php?action=list_activities"></a>Activités</li>
			<li class="list-group-item"><a href="index.php?action=list_recipes"></a>Recettes</li>
		</ul>
	</fieldset>
	<?php if (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['password'] === 'admin' ) : ?>
		<fieldset>
			<legend>Administration</legend>
			<ul class="list-group">
				<li class="list-group-item"><a href="index.php?action=post_manager">Articles</a></li>
				<li class="list-group-item"><a href="index.php?action=comment_manager"></a>Commentaires</li>
				<li class="list-group-item"><a href="index.php?action=user_manager"></a>Utilisateurs</li>
			</ul>
		</fieldset>
		<?php endif; ?> 
	
</div>