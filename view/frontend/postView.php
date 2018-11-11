
<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

    <p><a href="index.php">Retour à la liste des épisodes</a></p>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['date_fr'] ?></em>
        </h3>

        <textarea id="contenu" readonly>
            <?php $content1 = $post['content'];
                  if (get_magic_quotes_gpc()) $content1 = stripslashes($content1); 
                  echo $content1; 
            ?> 
        </textarea>
    </div>

    <h2>Commentaires</h2>

        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="author">Votre pseudo :</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Votre commentaire :</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['com_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <p><a href="index.php?action=signaler&amp;id=<?= $comment['id'] ?>">Signaler</a></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php $afficheBio = false; ?>
<?php $afficheAccesAdmin = false; ?>
<?php require('template.php'); ?>
