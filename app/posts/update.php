<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';


// In this file we delete posts in the database.
if(isset($_POST['post_description'], $_POST['post_id'])){
  $description  = trim(filter_var($_POST['post_description'], FILTER_SANITIZE_STRING));
  $id = (int) $_POST['post_id'];
  $statement = $pdo->prepare('UPDATE posts SET description = :description WHERE id = :id');
    //if not die

    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }

  $statement->bindParam(':description', $description, PDO::PARAM_STR);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  $statement = $pdo->prepare('SELECT description FROM posts WHERE id = :id');
  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  $edit = $statement->fetch(PDO::FETCH_ASSOC);
  $edit = $edit['description'];

  $edit = json_encode($edit);
  header('Content-Type: application/json');
  echo $edit;
}
