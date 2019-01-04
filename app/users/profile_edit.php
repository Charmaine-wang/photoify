<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

//check post
if (isset($_POST['profile_bio'], $_POST['name'], $_POST['email'], $_POST['username'])) {
//Trim post
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));

  $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
  $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_STR);
  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);

if(password_verify($_POST['confirm_password'], $user['password'])){




//if username or email already is dont do anything
if($username == $_SESSION['user']['username'] || $email == $_SESSION['user']['email'] ){

}
//if not user send back to profile
if(!isset($_SESSION['user'])){
        redirect('/profile.php');
    }

    //if none of those two trim and filter theese

        $id = (int)$_SESSION['user']['id'];
        //Trim post
        $profile_bio = trim(filter_var($_POST['profile_bio'],FILTER_SANITIZE_STRING));
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));


        $statement = $pdo->prepare('UPDATE users SET profile_bio = :profile_bio, name = :name, email = :email, username = :username
        WHERE id = :id');

        //if not die
        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }



// if(isset($_POST['new_password'], $_POST['repeat_password'])){
//    if ($_POST['new_password'] == $_POST['repeat_password']){
//
//      $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
//
//        $statement = $pdo->prepare('UPDATE users SET password = :password WHERE  id = :id');
//
//
//               if (!$statement)
//               {
//                   die(var_dump($pdo->errorInfo()));
//               }
//
//              $statement->bindParam(':password', $newPassword, PDO::PARAM_STR);
//              $statement->bindParam(':id', $id, PDO::PARAM_INT);
//              $statement->execute();
//              $user = $statement->fetch(PDO::FETCH_ASSOC);
//            }
//
//
//    }


        // binds variables to parameteres for insert statement
        $statement->bindParam(':profile_bio', $profile_bio, PDO::PARAM_STR);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();


        if(isset($_POST['new_password'], $_POST['repeat_password']) && $_POST['repeat_password'] !== ""){


        if(!isset($_SESSION['user'])){
            redirect('/profile.php');
        } else {

        $newPassword = password_hash(filter_var(trim($_POST['new_password']), FILTER_SANITIZE_STRING), PASSWORD_BCRYPT);
        }

        $statement = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':password', $newPassword, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $_SESSION['messages'][] = "Your password has been updated!";
    }


        $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name'],
            'profile_bio' => $user['profile_bio'],
            'username' => $user['username'],
            'profile_pic' => $user['profile_pic'],
        ];
      }
        redirect('/profile.php');
}
