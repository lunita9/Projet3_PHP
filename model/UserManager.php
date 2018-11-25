<?php
class UserManager
{
    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_auteur;charset=utf8', 'root', '');
        return $db;
    }
    

    
     public function VerificationOK($Pseudo, $MotDePasse)
    {
      try{
        $db = $this->dbConnect();
        
        if(!$db){
            echo "Erreur de connexion à la base de données.";
            return false;
        }else {
            // Mot de passe salé et hashé
            $mdp_hash = hash('sha256', "@=&$".$MotDePasse."x+-%");
            // Pour voir le hashage afin de le rentrer en base de données,
            // il faut utiliser comme pseudo : EchoHash
            if($Pseudo=="EchoHash") {
              echo $mdp_hash;
            }

            // on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
            $req = $db->prepare("SELECT COUNT(*) as nombre FROM users WHERE pseudo = ? AND mdp =? ");
            $req->execute(array($Pseudo, $mdp_hash));
            $post = $req->fetch();
            
            $nombreEnreg=$post['nombre'];

            if($nombreEnreg==1) {
                $LoginCorrect=true;
            } else {
                $LoginCorrect=false;
            }
            return $LoginCorrect;
        }
      } catch (Exception $e) {
        return false;
      }  
    }

}