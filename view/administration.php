<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>ADMINISTRATION</title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
      
    <style>
        
        body{
            padding-top: 60px;
            background-image: url('public/images/administration.jpg');
        }
    </style>


    <body>
     <!--<header>
        <div class="container-fluid">
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
               <li class="active"><a href="index.php#accueil">Accueil</a></li>
               <li><a href="index.php#qui">Biographie</a></li>
               <li><a href="index.php#contact">Déconnexion</a></li>
             </ul>
           </div>
		</div>
       </nav>
    </header>-->
        <div id="section">
            <br/>
            
                <div id="texte">
                <a href="index.php?action=deconnexion">Déconnexion</a><br/>
                <h2><a href="index.php?action=redaction">Ajouter une news</a></h2><br/><br/><br/>
                    
                    
 
                    
 <?php
   require_once('model/PostManager.php');
 
?>
 
  <table class="table table-bordered table-striped table-condensed">
   <caption>
      <h3>Liste de tous les épisodes</h3>
   </caption>
   <thead>
      <tr>
            <th><a>Modifier</a></th>
            <th><a>Supprimer</a></th>
            <th>Titre</th>
            <th>Date</th>
      </tr>
   </thead>
      <tbody>
                        <!--<tr>
                            <th></th>
                            <th></th>
                            <th>Titre</th>
                            <th>Date</th>
                        </tr>-->
<?php
  
// On fait une boucle pour lister les news.
$postManager = new PostManager();
$req = $postManager->getPosts();
//$req = $db->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM articles ORDER BY id DESC');
while ($donnees = $req->fetch())
{
?>
    <tr>
        <!--<td><?php echo '<a href="view/rediger_news.php?modifier_billets=' . $donnees['id'] . '">'; ?>Modifier</a></td>-->
        <td><?php echo '<a href="index.php?action=redaction&amp;modifier_billets=' . $donnees['id'] . '">'; ?>Modifier</a></td>
        <td><?php echo '<a href="index.php?action=supprimer_billets&amp;id=' . $donnees['id'] . '">'; ?>Supprimer</a></td>
        <!--<td><?php echo '<a href="index.php?action=backend&sousaction=modifArticle&id=' . $donnees['id'] . '">'; ?>Modifier</a></td>-->
        <!--<td><?php echo '<a href="index.php?action=backend&sousaction=supprArticle&id=' . $donnees['id'] . '">'; ?>Supprimer</a></td>-->
        <td><?php echo stripslashes($donnees['title']); ?></td>
        <td><?php echo $donnees['date_fr']; ?></td>
    </tr>
<?php
} // Fin de la boucle qui liste les news.
?>
        </tbody>
                    </table><br/><br/>
                </div>


        <table class="table table-bordered table-striped table-condensed">
   <caption>
      <h3>Liste des signalements de commentaires</h3>
   </caption>
            <thead>
      <tr>
        
                        
            <th><a>Annuler le signalement</a></th>
            <th><a>Supprimer le commentaire</a></th>
            <th>Auteur</th>
            <th>Contenu</th>
    </tr>
                </thead>
      <tbody>
   <?php
          $commentManager = new CommentManager();
          $req = $commentManager->getSignalComments();
           //$req = $db->query('SELECT id, author, comment FROM comments WHERE signaler>0');//UPDATE comments SET signaler = signaler + 1 WHERE id = ?'); 
            while($donnees=$req->fetch())
            {
            ?>
                <tr>
                    <td><?php echo '<a href="index.php?action=dessignaler&amp;id=' .$donnees['id']. '">'; ?>Annuler</a></td>
                    <td><?php echo '<a href="index.php?action=supprimer_comment&amp;id=' .$donnees['id'] . '">'; ?>Supprimer</a></td>
                    <td><?php echo stripslashes($donnees['author']); ?></td>
                    <td><?php echo $donnees['comment']; ?></td>
                </tr>
<?php
} 
?>
                    </table><br/><br/>
            
                
            
        </div>
         
    </body>
</html>