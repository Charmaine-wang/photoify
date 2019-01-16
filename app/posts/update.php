<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we delete posts in the database.
if(isset($_POST['post_description'], $_POST['post_id'])){
  $description  = trim(filter_var($_POST['post_description'], FILTER_SANITIZE_STRING));
  $id = (int) $_POST['post_id'];
  $statement = $pdo->prepare('UPDATE posts SET description = :description, id = :id WHERE id = :id');
    //if not die
    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }
  $statement->bindParam(':description', $description, PDO::PARAM_STR);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  $_SESSION['posts'] = [
      'user_id' => $id,
      'content' => $postName,
      'description' => $description,
      'created_at' => $created,
  ];
}

redirect('/posts.php');
