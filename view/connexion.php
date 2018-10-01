<?php


if(isset($_POST['connexion'])) { 
    if(empty($_POST['pseudo'])) {
        echo "Le champ Pseudo est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['mdp'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
            $Pseudo = htmlentities($_POST['pseudo']); 
            $MotDePasse = htmlentities($_POST['mdp']);
            //on se connecte à la base de données:
            //$db = new PDO('mysql:host=localhost;dbname=blog_auteur;charset=utf8', 'root', '');
            $db = mysqli_connect('localhost', 'root', '', 'blog_auteur');
            //on vérifie que la connexion s'effectue correctement:
            if(!$db){
                echo "Erreur de connexion à la base de données.";
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = mysqli_query($db, "SELECT * FROM users WHERE pseudo = '".$Pseudo."' AND mdp = '".$MotDePasse."'");
                
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    // on ouvre la session avec $_SESSION:
                    $_SESSION['mdp'] = $MotDePasse; 
                    //echo "Vous êtes à présent connecté  !";
                    require('view/administration.php');
                }
            }
        }
    }
}
?>