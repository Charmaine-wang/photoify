<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we delete posts in the database.
if (isset($_POST['delete_post'])) {
    $delete = $_POST['delete_post'];
    $statement = $pdo->query("SELECT content FROM posts WHERE id = '$delete' ");
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    unlink(__DIR__.'/upload-image/'. $post['content']);
    $statement = $pdo->prepare('DELETE FROM posts WHERE id = :id');

    //if not die
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':id', $delete, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['posts'] = [
    'user_id' => $id,
    'content' => $postName,
    'description' => $description,
    'created_at' => $created,
];
}
redirect('/posts.php');
