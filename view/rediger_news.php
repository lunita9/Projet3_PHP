<!DOCTYPE html>
    <head>
        <script  type="text/javascript" src="tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
  tinymce.init({
    selector: '#contenu'
  });
  </script>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <style>
        body{
            background-image: url('public/images/boreale.jpg');
        }
    </style>

      
    <body>
     
        <div id="section">
            <br/>
            <p>REDIGER NEWS</p><hr>
             
            <div id="texte">
                <p><a href="index.php?action=auteur">Retour à la liste des news</a></p><br/>
   

                    <form method="post" action="index.php?action=backend&amp;articleID=<?= $articleID ?>" enctype="multipart/form-data">
                     
                        <label for="titre">Titre de l'article :</label><br/>
                        <input type="text" size="30" name="titre" id="titre" placeholder="Titre de l'article" required value="<?php echo $title; ?>" /><br/><br/>
                         
                        
                         
                        <label for="contenu">Contenu de l'article :</label><br/>
                        <textarea name="contenu" id="contenu" placeholder="Contenu de l'article" cols="50" rows="10"><?php echo $content; ?></textarea><br/><br/>
                         
                        <br/>
 
                        <input  type="submit" value="Envoyer" /><br/>
 
                    </form>
                    <br/>
            </div>
        </div>
         
    </body>
</html>