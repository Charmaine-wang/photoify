<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}


function getPost(int $userID, $pdo){
  $statement = $pdo->prepare('SELECT * FROM posts WHERE user_id = :user_id');
  $statement->bindParam(':user_id', $userID, PDO::PARAM_INT);
  $statement->execute();
  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function getLikes(int $userID, $pdo){

  $statement = $pdo->prepare('SELECT *, sum(likes) FROM posts WHERE user_id = :user_id');

  $statement->bindParam(':user_id', $userID, PDO::PARAM_INT);

  $statement->execute();

  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

  return $posts;
}


function getAllPosts($pdo){

  $statement = $pdo->prepare('SELECT * FROM posts ORDER BY created_at = :created_at');

  $statement->execute();

  $allPosts = $statement->fetchAll(PDO::FETCH_ASSOC);


    return $allPosts;
}
