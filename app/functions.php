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

  $statement = $pdo->prepare('SELECT *, sum(likes) FROM posts WHERE user_id = :user_id');

  $statement->bindParam(':user_id', $userID, PDO::PARAM_INT);

  $statement->execute();

  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

  return $posts;
}
//
// function getLikes(int $likesID, $pdo){
//   $statement = $pdo->prepare('SELECT * FROM likes WHERE post_id = :post_id');
//
//   $statement->bindParam(':post_id', $likesID, PDO::PARAM_INT);
//
//   $statement->execute();
//
//   $likes = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//
//   return $likes;
// }


//joina de två funktionerna för att få ut likes och post i samma funktion

// function getPost(int $userID, $pdo){
//   $postsAndLikes = [];
//   $statement = $pdo->prepare('SELECT * FROM posts WHERE user_id = :user_id');
//
//   $statement->bindParam(':user_id', $userID, PDO::PARAM_INT);
//
//   $statement->execute();
//
//   $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
//   $postsAndLikes = $posts;
//
//   $statement = $pdo->prepare('SELECT * FROM likes WHERE post_id = :post_id');
//   $statement->bindParam(':post_id', $likesID, PDO::PARAM_INT);
//   $statement->execute();
//   $likes = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//   $postsAndlikes = $likes;
//
//   return $postsAndLikes;
//
//
// }
