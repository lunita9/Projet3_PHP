<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function redaction()
{
    
 
    if (isset($_GET['modifier_billets'])) // Si on demande de modifier une news.
    {   
    
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
    require('view/backend/rediger_news.php');
}

function addArticle($titre, $contenu)
 {
    $postManager = new PostManager();

    $affectedLines = $postManager->addArticle($titre, $contenu);

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

    if ($affectedLines === false) 
    {
        throw new Exception('Impossible de modifier l\'article !');
    }
    else 
    {
        header('Location: index.php?action=listPosts');
    }
}

function dessignaler($commentID)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->dessignaler($commentID);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else
    {
        header('Location: index.php?action=auteur');
    }
}

function supprimer_comment($commentID)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->supprimer_comment($commentID);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else
    {
        header('Location: index.php?action=auteur');
    }
}

function supprimer_billets($postId)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->supprimer_billets($postId);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de supprimer l\'article !');
    }
    else
    {
        header('Location: index.php?action=auteur');
    }
}

function administration()
{
    $postManager = new PostManager();
    $req = $postManager->getPosts();
    
    $commentManager = new CommentManager();
    $reqs = $commentManager->getSignalComments();
    include 'view/backend/administration.php';
    
    
}

    
 
