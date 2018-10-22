<?php
class UserManager
{
    public function VerificationOK($Pseudo, $MotDePasse)
    {
        $db = $this->dbConnect();
        
        if(!$db){
            echo "Erreur de connexion à la base de données.";
        }else {
            // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:

            $Requete = mysqli_query($db, "SELECT * FROM users WHERE pseudo = '".$Pseudo."' AND mdp = '".$MotDePasse."'");
            $nombreEnreg=mysqli_num_rows($Requete);
                //$loginCorrect = ($nombreEnreg>0);
            if($nombreEnreg==0) {
                $LoginCorrect=false;
            } else {
                $LoginCorrect=true;
            }
            return $LoginCorrect;
        }
    }
    
    private function dbConnect()
    {
        $db = mysqli_connect('localhost', 'root', '', 'blog_auteur');
        return $db;
    }
}