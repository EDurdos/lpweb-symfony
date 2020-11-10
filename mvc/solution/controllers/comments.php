<?php

require_once('models/comments.php');
require_once('models/posts.php');

/**
 * Liste des commentaires d'un post
 *
 * @author Fabien Bellanger
 * @param int $postId   ID du post
 * @return void
 */
function getCommentsOfPostController(int $postId): void
{
    if ($postId <= 0)
    {
        echo 'Invalid post';
        die();
    }

    // Recherche du post en base de données
    // ------------------------------------
    $post = getPostFromId($postId);
    if (count($post) === 0)
    {
        echo 'Invalid post';
        die();
    }

    
    // Recherche des commentaires d'un post
    // ------------------------------------
    $comments = getCommentsOfPost($postId);

    require_once('views/comments.php');
}
