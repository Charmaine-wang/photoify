<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Check if both email and password exists in the POST request.
if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    // Prepare, bind email parameter and execute the database query.
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        redirect('/login.php');
    }

    if (password_verify($_POST['password'], $user['password'])) {
        unset($user['password']);

        $_SESSION['user'] = $user;

        redirect('/profile.php');
    } else {
        redirect('/login.php');
    }
}
