<?php

// Chargement des classes
require_once('model/PostManager.php');
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


function signaler($commentID)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->signaler($commentID);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else
    {
        header('Location: index.php?action=listPosts');
    }
}


function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) 
    {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else 
    {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


function verificationAdmin($Pseudo, $MotDePasse)
{
    $userManager=new UserManager();
    $validation=$userManager->VerificationOK($Pseudo, $MotDePasse);
    if($validation===false)
    {
        throw new Exception('Le pseudo ou le mot de passe est incorrect, le compte n\'a pas été trouvé.');
    }
    else
    {
        // on ouvre la session avec $_SESSION:
        $_SESSION['mdp'] = $MotDePasse; 
        header('Location:  index.php?action=auteur');
    }
}
    

