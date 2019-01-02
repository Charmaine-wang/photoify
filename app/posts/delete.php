<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we delete new posts in the database.

if(isset($_POST['delete_post'])){

$delete = $_POST['delete_post'];

$statement = $pdo->prepare('DELETE FROM posts WHERE id = :id');

//if not die
if (!$statement)
{
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
