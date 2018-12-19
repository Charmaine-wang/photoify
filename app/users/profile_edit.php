<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

// Checking if all POST are set and user is logged in
if (isset($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['profile_bio'])){

  if ($_SESSION['user'] !== $_POST['password']) {
  $_SESSION['message'] = 'try again ';
  redirect('/edit.php');
}//post variable


$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$profile_bio = filter_var(trim($_POST['profile_bio']), FILTER_SANITIZE_STRING);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$id = (int) $_SESSION['user']['id'];

$statement = $pdo->prepare("SELECT email, username FROM users WHERE username = :username AND email = :email");
// Fetch password from database

  // die(var_dump($user));
  // Updating Database with new values 
  $statement = $pdo->prepare("UPDATE users SET name = :name, username = :username, email = :email, password = :password WHERE id = :id");

  if (!$statement){
    die(var_dump($pdo->errorInfo()));
  }

    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':profile_bio', $profile_bio, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);


  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);
  // Updating the Session Variable

}
redirect('/../../profile.php');
