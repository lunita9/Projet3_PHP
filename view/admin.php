<!DOCTYPE html>
    <head>
    </head>
      
    <body>
     
        <div id="section">
            <br/>
            <p>ADMINISTRATION</p><hr><br/>
                <div id="texte">
                <a href="rediger_news.php">Ajouter une news</a><br/><br/><br/>
 <?php
  
//-----------------------------------------------------
// Vérification 1 : est-ce qu'on veut poster une news ?
//-----------------------------------------------------
if (isset($_POST['title']) AND  isset($_POST['content']))
{
    $titre = ($_POST['title']);
    $contenu = ($_POST['content']);
    // On vérifie si c'est une modification de news ou non.
    if ($_POST['articleID'] == 0)
    {
        // Ce n'est pas une modification, on crée une nouvelle entrée dans la table.
           
         
       //ancien code : $bdd->exec("INSERT INTO billets(id, titre, contenu, date_creation) VALUES('', '" . $titre . "', '" . $contenu . "', '" . NOW() . "')");
       $req = $bdd->prepare('INSERT INTO articles(title, content, date) VALUES(:title, :content, NOW())');
                        $req->execute(array(
                          
                        ':title' => $_POST['title'],
                        ':content' => $_POST['content']));
         
    }
    else
    {
        // On protège la variable "id_news" pour éviter une faille SQL.
        //$_POST['id_billets'] = ($_POST['id_billets']);
        // C'est une modification, on met juste à jour le titre et le contenu.
          
        $bdd->exec("UPDATE articles SET title='" . $title . "', content='" . $content . "' WHERE id='" . $_POST['articleID'] . "'");
          
    }
}
   
//--------------------------------------------------------
// Vérification 2 : est-ce qu'on veut supprimer une news ?
//--------------------------------------------------------
if (isset($_GET['supprimer_billets'])) // Si l'on demande de supprimer une news.
{
    // Alors on supprime la news correspondante.
    // On protège la variable « id_billets » pour éviter une faille SQL.
    //$_GET['supprimer_billets'] = ($_GET['supprimer_billets']);
     
        $bdd->exec('DELETE FROM articles WHERE id=\'' . $_GET['supprimer_billets'] . '\'');
}
?>
 
                    <table>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Titre</th>
                            <th>Date</th>
                        </tr>
<?php
  
// On fait une boucle pour lister les news.
  
$req = $bdd->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY date_creation DESC');
while ($donnees = $req->fetch())
{
?>
                        <tr>
                            <td><?php echo '<a href="view/rediger_news.php?modifier_billets=' . $donnees['id'] . '">'; ?>Modifier</a></td>
                            <td><?php echo '<a href="frontend/listPostsView.php?supprimer_billets=' . $donnees['id'] . '">'; ?>Supprimer</a></td>
                            <td><?php echo stripslashes($donnees['title']); ?></td>
                            
                            <td><?php echo $donnees['date_creation_fr']; ?></td>
                        </tr>
<?php
} // Fin de la boucle qui liste les news.
?>
                    </table><br/><br/>
                </div>
        </div>
         
    </body>
</html>
 
