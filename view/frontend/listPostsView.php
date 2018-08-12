<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<header>
    <div id="titre_principal">
    <h1>Billet simple pour l'Alaska<br/>par Jean Forteroche</h1>
    </div>
    
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=bio">A propos</a></li>
            <li><a href="index.php?action=admin">Administration</a></li>
        </ul>
    </nav>
        
</header>



<p>Bonjour et bienvenue sur mon site dédié à mon nouveau roman "Billet simple pour l'Alaska".<br/> Chaque semaine je mettrai en ligne un extrait de mon livre déjà disponible dans les bacs.<br/> Je vous souhaite une bonne lecture et n'hésitez pas de commenter les épisodes afin que je puisse connaître vos préférences!!</p>


        

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['date_fr'] ?></em>
        </h3>
        
        <p>
            
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">LIRE L'EPISODE</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>