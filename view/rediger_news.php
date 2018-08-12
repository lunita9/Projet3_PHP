<!DOCTYPE html>
    <head>
    </head>
      
    <body>
     
        <div id="section">
            <br/>
            <p>REDIGER NEWS</p><hr>
             
            <div id="texte">
                <p><a href="frontend/listPostsView.php">Retour à la liste des news</a></p><br/>
   
<?php
 
if (isset($_GET['modifier_billets'])) // Si on demande de modifier une news.
{
    // On protège la variable « modifier_billets » pour éviter une faille SQL.
    //$_GET['modifier_billets'] = ($_GET['modifier_billets']));
    // On récupère les informations de la news correspondante.
     
    $req = $bdd->query('SELECT * FROM articles WHERE id=\'' . $_GET['modifier_billets'] . '\'');
    while($donnees = $req->fetch()){
      
    // On place le titre et le contenu dans des variables simples.
    $title = $donnees['title'];
    $content = $donnees['content'];
    $articleID = $donnees['id']; // Cette variable va servir pour se souvenir que c'est une modification.
}}
else // C'est qu'on rédige une nouvelle news.
{
    // Les variables $titre et $contenu sont vides, puisque c'est une nouvelle news.
    $title = '';
    $content = '';
    $articleID = 0; // La variable vaut 0, donc on se souviendra que ce n'est pas une modification.
}
?>
                    <form method="post" action="listPostsView.php" enctype="multipart/form-data">
                     
                        <label for="titre">Titre de l'article :</label><br/>
                        <input type="text" size="30" name="titre" id="titre" placeholder="Titre de l'article" required value="<?php echo $title; ?>" /><br/><br/>
                         
                        
                         
                        <label for="contenu">Contenu de l'article :</label><br/>
                        <textarea name="contenu" id="contenu" placeholder="Contenu de l'article" cols="50" rows="10"><?php echo $content; ?></textarea><br/><br/>
                         
                        <input type="hidden" name="id_billets" value="<?php echo $articleID; ?>" />
                         
                        <!--<label for="image">Illustration de l'article : (Tous formats - Max. 2 Mo)</label><br/>
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                        <input type="file" name="illustration" id="illustration" value="<?php echo $illustration; ?>" /><br/><br/>--><br/>
 
                        <input type="submit" value="Envoyer" /><br/>
 
                    </form>
                    <br/>
            </div>
        </div>
         
    </body>
</html>