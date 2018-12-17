<?php
declare(strict_types=1);


require __DIR__.'/../autoload.php';

if (isset($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['r_password'])) {


    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$statement = $pdo->prepare("INSERT INTO movies (name, email, username, password) VALUES (:name, :email, :username, :password)");
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':username', $username, PDO::PARAM_STR);
$statement->bindParam(':password', $password, PDO::PARAM_STR);

$statement->execute();



};

?>


$pdo = new PDO('sqlite:tmdb.db');
$statement = $pdo->query('SELECT * FROM directors ORDER BY first_name');

$directors = $statement->fetchAll(PDO::FETCH_ASSOC);
