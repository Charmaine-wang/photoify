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
  $statement = $pdo->prepare('SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC');
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
  $statement = $pdo->prepare('SELECT a.*, b.username, b.profile_pic FROM posts a LEFT JOIN users b ON a.user_id=b.id ORDER BY created_at DESC');
  $statement->execute();
  $allPosts = $statement->fetchAll(PDO::FETCH_ASSOC);

return $allPosts;

  }
