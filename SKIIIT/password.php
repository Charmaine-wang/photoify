<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if(isset($_POST['new_password'], $_POST['repeat_password'], $_POST['confirm_old_password'])){

  $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
  $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_STR);
  $statement->execute();
  $passwordDb = $statement->fetch(PDO::FETCH_ASSOC);

  if(password_verify($_POST['confirm_old_password'], $passwordDb['password'])){


   if ($_POST['new_password'] === $_POST['repeat_password']){

     $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

       $statement = $pdo->prepare('UPDATE users SET password = :password WHERE  id = :id');

       if (!$statement)
       {
           die(var_dump($pdo->errorInfo()));
       }

      $statement->bindParam(':password', $newPassword, PDO::PARAM_STR);

      $statement->execute();

      $user = $statement->fetch(PDO::FETCH_ASSOC);
    }

      $_SESSION['user'] = [
          'id' => $user['id'],
          'email' => $user['email'],
          'name' => $user['name'],
          'profile_bio' => $user['profile_bio'],
          'username' => $user['username'],
          'profile_pic' => $user['profile_pic'],
          'password' => $user['password'],

      ];

}

redirect('/profile.php');
}
