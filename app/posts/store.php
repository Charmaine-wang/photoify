<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we store/insert new posts in the database.

if(isset($_FILES['post_image'], $_POST['description'])) {

$postImage = $_FILES['post_image'];
$description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
$created = date('Y-m-d-H-i-s');
$id = (int) $_SESSION['user']['id']; //vad ska man kolla ????
$extension = pathinfo($_FILES['post_image']['name'])['extension'];


$postName = $id.'.'.$created.'.'.$extension;


 if ($postImage['type'] !== 'image/jpeg') {
    // || $profile_pic['type'] !== 'image/jpg' || $profile_pic['type'] !== 'image/png'
   echo 'The image file type is not allowed.';

}elseif ($postImage['size'] > 2097152) {
  echo 'The uploaded file exceeded the file size limit.';

}else{

  $statement = $pdo->prepare('INSERT INTO posts(user_id, content, description, created_at) VALUES(:user_id, :content, :description, :created_at)');

  $statement->bindParam(':content', $postName, PDO::PARAM_STR);
  $statement->bindParam(':description', $description, PDO::PARAM_STR);
  $statement->bindParam(':created_at', $created, PDO::PARAM_STR);
  $statement->bindParam(':user_id', $id, PDO::PARAM_INT);

  $statement->execute();
;
//bilden ska läggas i upload image mappen(användarens id, datumet den laddades upp och vilken typ)
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
