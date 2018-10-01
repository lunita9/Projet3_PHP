<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<header>
    
    <!--<div class="container-fluid">
         <nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
           <div class="navbar-header">
               <button type="button" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
               </button>
              <a href="#" class="navbar-brand" >Billet simple pour l'Alaska<br/>par Jean Forteroche</a>
            </div>
           <div class="collapse navbar-collapse">
             <ul class="nav navbar-nav">       
               <li class="active"><a href="index.php">Accueil</a></li>
               <li><a href="index.php?action=bio">Biographie</a></li>
               <li><a href="index.php?action=admin">Administration</a></li>
             </ul>
           </div>
		</div>
       </nav>-->
    
    
    
    
    
    
    
    
    <!--<div id="titre_principal">
    <h1>Billet simple pour l'Alaska<br/>par Jean Forteroche</h1>
    </div>
    
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=bio">A propos</a></li>
            <li><a href="index.php?action=admin">Administration</a></li>
        </ul>
    </nav>-->
        
</header>



<p>Bonjour et bienvenue sur mon site dédié à mon nouveau roman "Billet simple pour l'Alaska".<br/> Chaque semaine je mettrai en ligne un extrait de mon livre déjà disponible dans les bacs.<br/> Je vous souhaite une bonne lecture et n'hésitez pas à commenter les épisodes afin que je puisse connaître vos préférences!!</p>


        

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
<?php $afficheBio = true; ?>
<?php $afficheAccesAdmin = true; ?>
<?php require('template.php'); ?>