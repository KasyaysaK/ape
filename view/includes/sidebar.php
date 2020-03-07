<h6>Derniers commentaires</h6>
<hr class="mb-3" />
<div>
	<?php foreach ($last_comments as $comment): ?>
      	<p>
      		Par <?= htmlspecialchars($comment['name']); ?> sur <a href="index.php?action=display_activity&amp;id=<?= $comment['activityid'] ?>"><?= htmlspecialchars($comment['title']); ?></a>
      	<br /><?= htmlspecialchars($comment['comment']) ?>
      
      	</p>
		<hr class="mb-3" />      	
    <?php endforeach; ?> 
	<img src="public/images/APE_logo.png">
</div>