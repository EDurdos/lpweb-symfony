<?php

require_once('models/posts.php');

/**
 * Liste des posts
 *
 * @author Fabien Bellanger
 * @return void
 */
function getPostsListController(): void
{
    $posts = getAllPosts();

    require_once('views/posts.php');
}
