<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we store/insert new posts in the database.
if (isset($_FILES['post_image'], $_POST['description'])) {
    $postImage = $_FILES['post_image'];
    $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
    $created = date('Y-m-d-H-i-s');
    $id = (int) $_SESSION['user']['id'];
    $extension = pathinfo($_FILES['post_image']['name'])['extension'];
    $postName = $id.'.'.$created.'.'.$extension;

    //if it is jpeg you can upload
    if ($postImage['type'] !== 'image/jpeg') {

//if it is jpeg check size
    } elseif ($postImage['size'] > 2097152) {
        //then insert into database
    } else {
        $statement = $pdo->prepare('INSERT INTO posts(user_id, content, description, created_at) VALUES(:user_id, :content, :description, :created_at)');
        $statement->bindParam(':content', $postName, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':created_at', $created, PDO::PARAM_STR);
        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
        $statement->execute();
        //put the upload image in (userid, date, type)
        move_uploaded_file($postImage['tmp_name'], __DIR__.'/upload-image/'. $postName);
    };

    $_SESSION['posts'] = [
    'user_id' => $id,
    'content' => $postName,
    'description' => $description,
    'created_at' => $created,
];
};


redirect('/posts.php');
