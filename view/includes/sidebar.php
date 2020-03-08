<div>
	<h5 class="text-center">Derniers articles</h5>
	<hr class="mb-3" />
	<?php foreach ($last_posts as $post): ?>
	<ul class="list-group">
		<li class="list-group-item list-group-item-action">
			<a href="index.php?action=display_post&amp;id=<?= $post['id'] ?>" class="btn"><?= htmlspecialchars($post['title']) ?></a>
			<br />publié par <?= htmlspecialchars($post['author']) ?>
		</li>
	</ul>
	<hr class="mb-3" />
	<?php endforeach; ?>
</div>
	<a href="index.php?action=list_posts"><p class="text-center">Voir tous les articles</p></a>
<hr class="mb-3" />
<h5 class="text-center">Derniers commentaires</h5>
<hr class="mb-3" />
<div>
	<?php foreach ($last_comments as $comment): ?>
		<ul class="list-group">
			<li class="list-group-item list-group-item-action">
				Par <?= htmlspecialchars($comment['name']); ?> sur <a href="index.php?action=display_post&amp;id=<?= $comment['postid'] ?>"><?= htmlspecialchars($comment['title']); ?></a>
      			<br /><?= htmlspecialchars($comment['comment']) ?>
			</li>
		</ul>
		<hr class="mb-3" />      	
    <?php endforeach; ?> 
	<img src="public/images/APE_logo.png">
</div>
