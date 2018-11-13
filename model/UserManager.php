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
        $db = $this->dbConnect();
        
        if(!$db){
            echo "Erreur de connexion à la base de données.";
        }else {
            // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
            $req = $db->prepare("SELECT COUNT(*) as nombre FROM users WHERE pseudo = ? AND mdp =? ");
            $req->execute(array($Pseudo, $MotDePasse));
            $post = $req->fetch();
            
            $nombreEnreg=$post['nombre'];

            if($nombreEnreg==0) {
                $LoginCorrect=false;
            } else {
                $LoginCorrect=true;
            }
            return $LoginCorrect;
        }
    }
    
    

}