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

//if chamge password check if they match
if(isset($_POST['new_password'], $_POST['new_rep_password'])){
if ($_POST['new_password'] === $_POST['new_rep_password']){}
  $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);


        $id = (int)$_SESSION['user']['id'];
        //Trim post
        $profile_bio = trim(filter_var($_POST['profile_bio'],FILTER_SANITIZE_STRING));
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));

        $statement = $pdo->prepare('UPDATE users SET profile_bio = :profile_bio, name = :name, email = :email, username = :username, password = :password
        WHERE id = :id');

        //if not die
        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        // binds variables to parameteres for insert statement
        $statement->bindParam(':profile_bio', $profile_bio, PDO::PARAM_STR);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);

        $statement->execute();

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
          'password' => $user['password']

        ];
      }
    }
        redirect('/profile.php');
    }
