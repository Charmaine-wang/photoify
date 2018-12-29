<?php // TODO: Implement the upload script here.
declare(strict_types=1);

require __DIR__.'/../autoload.php';

$id = (int) $_SESSION['user']['id'];
$statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['password'])) {
	$firstname = ($_POST['name']) ? trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING)) : $user['name'];
  $firstname = ($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_STRING)) : $user['email'];
	$username = ($_POST['username']) ? trim(filter_var($_POST['username'] , FILTER_SANITIZE_STRING)) : $user['username'];
	$profile_bio = ($_POST['profile_bio']) ? trim(filter_var($_POST['profile_bio'], FILTER_SANITIZE_STRING)) : $user['profile_bio'];
	$password = $_POST['password'];
	$errors = [];

	$statement = $pdo->prepare('UPDATE users SET name = :name, email = :email, username = :username, profile_bio = :profile_bio WHERE id = :id');
	if(!$statement) {
		die(var_dump($pdo->errorInfo()));
	}
	$statement->bindParam(':id', $id, PDO::PARAM_INT);
	$statement->bindParam(':name', $name, PDO::PARAM_STR);
	$statement->bindParam(':email', $email, PDO::PARAM_STR);
	$statement->bindParam(':username', $username, PDO::PARAM_STR);
	$statement->bindParam(':profile_bio', $profile_bio, PDO::PARAM_STR);

	$statement->execute();

	if(!$statement){
		die(var_dump($statement->errorInfo()));
	}
}
  redirect('/profile.php');
