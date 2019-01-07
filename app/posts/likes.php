<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// check if user has already liked the post
// if user has liked the post, remove the like from the likes table and decrement total on post by 1
// if user has not liked the post, add like to the likes table and increment total on post by 1

if(isset($_POST['likes_add'])){
  $userId = (int) $_SESSION['user']['id'];
  $postId = (int) $_POST['post_id'];

  $hasLiked = $pdo->prepare('SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id');
  $hasLiked->bindParam(':post_id', $postId, PDO::PARAM_INT);
  $hasLiked->bindParam(':user_id', $userId, PDO::PARAM_INT);
  $hasLiked->execute();
  $hasLiked = $hasLiked->fetch(PDO::FETCH_ASSOC);

  $statement = $pdo->prepare('SELECT likes FROM posts WHERE id = :id');
  $statement->bindParam(':id', $postId, PDO::PARAM_INT);
  $statement->execute();
  $currentLikes = (int) $statement->fetch(PDO::FETCH_ASSOC);

  if ($hasLiked) {
    $statement = $pdo->prepare('DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id');
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare('UPDATE posts SET likes = :likes WHERE id = :id');
    $statement->bindParam(':id', $postId, PDO::PARAM_INT);

    $hej = $currentLikes - 1;
    $statement->bindParam(':likes', $hej,  PDO::PARAM_INT);
    $statement->execute();
  } else {
    $statement = $pdo->prepare('INSERT INTO likes(user_id, post_id) VALUES(:user_id, :post_id)');
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare('UPDATE posts SET likes = :likes WHERE id = :id');
    $statement->bindParam(':id', $postId, PDO::PARAM_INT);
    $hej = $currentLikes + 1;
    $statement->bindParam(':likes', $hej,  PDO::PARAM_INT);
    $statement->execute();

  }







    // $statement = $pdo->prepare('UPDATE posts SET description = :description, id = :id WHERE id = :id');


  // $likePost = filter_var($_POST['like'], FILTER_SANITIZE_EMAIL);


}
