<?php if (!(array_key_exists('cookieConsent', $_COOKIE) && $_COOKIE['cookieConsent'] === 'dismissed')) : ?>
<div class="cookie-banner d-flex flex-column justify-content-between">
   <p class="">En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies. <a href="index.php?action=terms_conditions#cookies">En savoir plus</a></p>
   <button class="cookie-dismiss title btn btn-outline-success my-2 my-sm-0">OK</button>
</div>
<?php endif; ?>

<footer class="page-footer">
	<div class="container text-center text-md-left">
		<div class="row">
			<div class="col-md-4 mt-4">
				<h5 class="font-weight-bold text-uppercase mt-3 mb-4">À propos</h5>
				<ul class="list-unstyled">
					<li class=""><a href="index.php?action=about">Qui sommes nous</a></li>
					<li class=""><a href="index.php?action=terms_conditions">Mentions légales</a></li>
					<li class=""><a href="index.php?action=terms_conditions#privacy_policy">Politique de confidentialité</a></li>
					<li class=""><a href="index.php?action=contact">Contact</a></li>
				</ul>
			</div>
			<div class="col-md-4 mt-4">
				<h5 class="font-weight-bold text-uppercase mt-3 mb-4">À propos</h5>
				<ul class="list-unstyled">
					<li class=""><a href="index.php?action=list_posts">Articles</a></li>
					<li class=""><a href="index.php?action=list_activities">Activités</a></li>
					<li class=""><a href="index.php?action=list_recipes">Recettes</a></li>
				</ul>
			</div>
			<div class="col-md-4 mt-4">
				<?php if (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'admin' ) : ?>
				<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Administration</h5>
				<ul class="list-unstyled">
					<li class=""><a href="index.php?action=post_manager">Articles</a></li>
					<li class=""><a href="index.php?action=tag_manager">Rubriques</a></li>
					<li class=""><a href="index.php?action=comment_manager">Commentaires</a></li>
					<li class=""><a href="index.php?action=user_manager">Utilisateurs</a></li>
				</ul>
				<?php elseif (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'author' ) : ?>
				<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Auteur</h5>
				<ul class="list-unstyled">
					<li class=""><a href="index.php?action=author_pannel">Nouvel article</a></li>
				</ul>
				<?php else : ?>
					<img src="public/images/APE_logo.png">
				<?php endif; ?>
			</div>
		</div>	
	</div> 
	 <div class="footer-copyright text-center py-3">© 2020
    <a href=""> APE</a>
  </div>
</footer>