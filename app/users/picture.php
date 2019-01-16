<?php // TODO: Implement the upload script here.
declare(strict_types=1);

require __DIR__.'/../autoload.php';


if(isset($_FILES['profile_pic'])) {
  $profile_pic = $_FILES['profile_pic'];
  $id = (int) $_SESSION['user']['id'];
  $extension = pathinfo($_FILES['profile_pic']['name'])['extension'];
  $pic_name = $id.'.'.$extension;

   if ($profile_pic['type'] !== 'image/jpeg') {

     echo 'The image file type is not allowed.';
   }elseif ($profile_pic['size'] > 2097152) {
     echo 'The uploaded file exceeded the file size limit.';
   }else{
    $statement = $pdo->prepare('UPDATE users SET profile_pic = :profile_pic WHERE id = :id');
    $statement->bindParam(':profile_pic', $pic_name, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    //VART SKA MAN LÄGGA BILDEN???????????
    echo 'You have download your pic.';
    move_uploaded_file($profile_pic['tmp_name'], __DIR__.'/upload/'. $pic_name);
  };

  $_SESSION['user']['profile_pic'] = $pic_name;
  
  };

  redirect('/profile.php');
