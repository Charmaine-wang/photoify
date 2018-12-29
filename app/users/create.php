<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';


if (isset($_POST['username'],$_POST['email'],$_POST['name'], $_POST['password'], $_POST['r_password'])) {


   // Checks if passwords match
   if ($_POST['password'] === $_POST['r_password']) {

     $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
     $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
     $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

     $statement = $pdo->prepare('INSERT INTO users(name, username, email, password) VALUES(:name, :username, :email, :password)');

          if (!$statement){
          die(var_dump($pdo->errorInfo()));

          }


    if ($user['email'] == $email || $user['username'] == $username) {

       $statement = $pdo->prepare("SELECT email, username FROM users WHERE username = :username AND email = :email");

           $_SESSION['message'] = 'sorry you alredy have an account. sign in';
           redirect('/signup.php');
            }


       if (!$statement){
        die(var_dump($pdo->errorInfo()));
       }

       // binds variables to parameteres for insert statement

       $statement->bindParam(':username', $username, PDO::PARAM_STR);
       $statement->bindParam(':name', $name, PDO::PARAM_STR);
       $statement->bindParam(':email', $email, PDO::PARAM_STR);
       $statement->bindParam(':password', $password, PDO::PARAM_STR);


       $statement->execute();
       $user = $statement->fetch(PDO::FETCH_ASSOC);


               $_SESSION['user'] = [
                   'id' => $id,
                   'email' => $email,
                   'name' => $name,
                   'profile_bio' => $profile_bio,
                   'username' => $username,
                   'profile_pic' => $profile_pic,
              
               ];

$_SESSION['message'] = 'Log in on your new accont';

redirect('/login.php');


   }
   redirect('/');
}



?>
