<?php
require('controller/frontend.php');
if(!isset($_SESSION )){
    session_start();
}
try {

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'signaler') {
            if(isset($_GET['id']) && $_GET['id']>0){
                signaler($_GET['id']);
                
            }
            else{
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        
        } elseif($_GET['action']=='admin'){
            
            if(isset($_SESSION['mdp'])){
            vueConnexion();
        }
        }
        elseif($_GET['action']=='bio')
        {
            biographieAuteur();
        }
        elseif($_GET['action']=='validation'){
            verificationAdmin();
        }
        elseif($_GET['action']=='auteur'){
            administration();
        }
        
        elseif($_GET['action']=='redaction'){
            
            if(isset($_SESSION['mdp'])){
                redaction();
            }
        }
        elseif($_GET['action']=='supprimer_billets'){
            
            if(isset($_SESSION['mdp'])){
            
               if(isset($_GET['id'])&& $_GET['id']>0){
                supprimer_billets($_GET['id']);
            } 
            
            
        }}
        elseif($_GET['action']=='supprimer_comment'){
            
            if(isset($_SESSION['mdp'])){
            if(isset($_GET['id'])&& $_GET['id']>0){
                supprimer_comment($_GET['id']);
            }
        }}
        elseif($_GET['action']=='dessignaler'){
            
            if(isset($_SESSION['mdp'])){
            if(isset($_GET['id']) && $_GET['id']>0){
                dessignaler($_GET['id']);
            }
            else{
                throw new Exception('Aucun identifiant de commentaire à remettre à jour');
            }
        }}

         elseif($_GET['action']=='deconnexion'){
             unset($_SESSION['mdp']);
             listPosts();
         }
        elseif($_GET['action']=='backend'){
            
            
            if(isset($_SESSION['mdp'])){
            if (isset($_GET['articleID'])){
                if($_GET['articleID']==0){ //Ajout article
                    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {
                        addArticle($_POST['titre'], $_POST['contenu']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                
                elseif($_GET['articleID']>0){ //Modification
                    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {
                        updateArticle($_GET['articleID'], $_POST['titre'], $_POST['contenu']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                 header('Location: index.php?action=auteur');
                
            }
            }}
        
    }else {
                
        listPosts();
    }
        
    }



catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

