<?php

require_once('database.php');

/**
 * Récupération de tous les posts
 *
 * @author Fabien Bellanger
 * @return array
 */
function getAllPosts(): array
{
    $posts = [];

    $connection = initDatabse();
    if ($connection === false)
    {
        return $posts;
    }

    // Query
    // -----
    try
    {
        $query = 'SELECT * FROM posts WHERE active = :active ORDER BY created_at DESC';
        $statement = $connection->prepare($query);
        $statement->execute([':active' => 1]);
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
        echo '[PDO error]: ' . $e->getMessage();
    }

    return $posts;
}

/**
 * Récupération d'un post par son ID
 *
 * @author Fabien Bellanger
 * @param int $id ID du post
 * @return array
 */
function getPostFromId(int $id): array
{
    $post = [];
    if ($id <= 0)
    {
        return $post;
    }

    $connection = initDatabse();
    if ($connection === false)
    {
        return $post;
    }

    // Query
    // -----
    try
    {
        $query = 'SELECT * FROM posts WHERE id = :id';
        $statement = $connection->prepare($query);
        $statement->execute([':id' => $id]);
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($posts) === 1)
        {
            $post = $posts[0];
        }
    }
    catch(PDOException $e)
    {
        echo '[PDO error]: ' . $e->getMessage();
    }

    return $post;
}
