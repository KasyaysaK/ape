<h3>Derniers commentaires</h3>
<hr class="mb-3" />
<div>
	<?php foreach ($last_comments as $comment): ?>
      	<p>
      		Par <?= htmlspecialchars($comment['name']); ?> sur <a href="index.php?action=display_activity&amp;id=<?= $comment['activityid'] ?>"><?= htmlspecialchars($comment['title']); ?></a>
      	<br /><?= htmlspecialchars($comment['comment']) ?>
      
      	</p>
		<hr class="mb-3" />      	
    <?php endforeach; ?> 
</div>