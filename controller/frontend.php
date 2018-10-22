<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/PostEntity.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function redaction()
{
    
 
if (isset($_GET['modifier_billets'])) // Si on demande de modifier une news.
{
    // On protège la variable « modifier_billets » pour éviter une faille SQL.
    //$_GET['modifier_billets'] = ($_GET['modifier_billets']));
    // On récupère les informations de la news correspondante.
    
//    $db = new PDO('mysql:host=localhost;dbname=blog_auteur;charset=utf8', 'root', ''); 
//    $req = $db->query('SELECT * FROM articles WHERE id=\'' . $_GET['modifier_billets'] . '\'');
//    while($donnees = $req->fetch()){
    $postManager = new PostManager();
    $donnees = $postManager->getPost($_GET['modifier_billets']);
      
    // On place le titre et le contenu dans des variables simples.
    $title = $donnees['title'];
    $content = $donnees['content'];
    $articleID = $donnees['id']; // Cette variable va servir pour se souvenir que c'est une modification.
}
else // C'est qu'on rédige une nouvelle news.
{
    // Les variables $titre et $contenu sont vides, puisque c'est une nouvelle news.
    $title = '';
    $content = '';
    $articleID = 0; // La variable vaut 0, donc on se souviendra que ce n'est pas une modification.
}
require('view/rediger_news.php');
}

function addArticlePOO($titre, $contenu)
{
    $article = new PostEntity();
    $article->setTitre($titre);
    $article->setContenu($contenu);
    
    $postManager = new PostManager();

    $affectedLines = $postManager->add($article);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function updateArticle($articleID, $titre, $contenu)
{
    $postManager = new PostManager();

    $affectedLines = $postManager->updateArticle($articleID, $titre, $contenu);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function signaler($commentID)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->signaler($commentID);
    if ($affectedLines === false){
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else{
        header('Location: index.php?action=listPosts');
    }
}

function dessignaler($commentID)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->dessignaler($commentID);
    if ($affectedLines === false){
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else{
        header('Location: index.php?action=auteur');
    }
}

function supprimer_comment($commentID)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->supprimer_comment($commentID);
    if ($affectedLines === false){
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else{
        header('Location: index.php?action=auteur');
    }
}

function supprimer_billets($postId)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->supprimer_billets($postId);
    if ($affectedLines === false){
        throw new Exception('Impossible de supprimer l\'article !');
    }
    else{
        header('Location: index.php?action=auteur');
    }
}


function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function vueConnexion()
{
    require('view/login.php');
}
function verificationAdmin($Pseudo, $MotDePasse)
{
    $userManager=new UserManager();
    $validation=$userManager->VerificationOK($Pseudo, $MotDePasse);
    if($validation===false){
        throw new Exception('Le pseudo ou le mot de passe est incorrect, le compte n\'a pas été trouvé.');
    }
    else{
        // on ouvre la session avec $_SESSION:
        $_SESSION['mdp'] = $MotDePasse; 
        header('Location:  index.php?action=auteur');
    }
}
    
       

function biographieAuteur()
{
    require('view/biographie.php');
}
function administration()
{
    $postManager = new PostManager();
    $req = $postManager->getPosts();
    
    $commentManager = new CommentManager();
    $reqs = $commentManager->getSignalComments();
    include 'view/administration.php';
    
    
}
//function redaction()
//{
//    require('view/rediger_news.php');
//}