<?php if (!(array_key_exists('cookieConsent', $_COOKIE) && $_COOKIE['cookieconsent'] === 'dismissed')) : ?>
<div class="cookie-banner d-flex flex-column justify-content-between">
   <p class="">En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies pour vous proposer des contenus et services adaptés à vos centres d’intérêts.</p>
   <button class="cookie-dismiss title btn btn-outline-success my-2 my-sm-0">OK</button>
</div>
<?php endif; ?>

<div class="d-flex justify-content-center align-items-center sitemap">
	<ul>
		<li>plan du site</li>
	</ul>
</div>