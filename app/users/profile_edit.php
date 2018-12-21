<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['profile_bio'], $_POST['name'], $_POST['email'], $_POST['username'],$_POST['password'])) {



    if(!isset($_SESSION['user'])){
        redirect('/profile.php');
    } else {


        $id = (int)$_SESSION['user']['id'];
        $profile_bio = trim(filter_var($_POST['profile_bio'],FILTER_SANITIZE_STRING));
        $profile_pic = trim(filter_var($_POST['profile_pic'],FILTER_SANITIZE_STRING));
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

        $statement = $pdo->prepare('UPDATE users SET profile_bio = :profile_bio, name = :name, email = :email, username = :username, password = :password
        WHERE id = :id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }
        // binds variables to parameteres for insert statement
        $statement->bindParam(':profile_bio', $profile_bio, PDO::PARAM_STR);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user'] = [
            'id' => $id,
            'email' => $email,
            'name' => $name,
            'profile_bio' => $profile_bio,
            'username' => $username,
            'profile_pic' => $profile_pic
        ];
        redirect('/profile.php');
    }
