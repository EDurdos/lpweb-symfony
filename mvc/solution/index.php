<?php

require_once('controllers/posts.php');
require_once('controllers/comments.php');

$action = $_GET['action'] ?? 'posts-list';

// Routing
// -------
switch ($action) {
    case 'posts-list':
        getPostsListController();
        break;
    case 'comments-list':
        $postId = $_GET['post_id'] ?? 0;
        getCommentsOfPostController($postId);
        break;
    default:
        echo '404 - Page Not Found';
}
