<?php
    if(isset($_SESSION['mdp'])){
?>
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
                        
<?php
  
// On fait une boucle pour lister les news.

while ($donnees = $req->fetch())
{
?>
    <tr>
        
        <td><?php echo '<a href="index.php?action=redaction&amp;modifier_billets=' . $donnees['id'] . '">'; ?>Modifier</a></td>
        <td><?php echo '<a href="index.php?action=supprimer_billets&amp;id=' . $donnees['id'] . '">'; ?>Supprimer</a></td>
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
          
            while($donnees=$reqs->fetch())
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

<?php
}
?>