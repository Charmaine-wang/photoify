<?php // TODO: Implement the upload script here.
declare(strict_types=1);

require __DIR__.'/../autoload.php';


if(isset($_POST['old_password'],$_POST['new_password'], $_POST['new_rep_password'])){

  $oldPassword = $_POST['old_password'];
  $newPassword =$_POST['new_password'];
  $newRepPassword = $_POST['new_rep_password'];
  $id = (int)$_SESSION['user']['id'];

    $statement = $pdo->query('SELECT password FROM users WHERE id = :id');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

  if (password_verify($oldPassword, $user['password'])) {
      // If the password was valid we know that the user exists and provided

      if ($newpassword === $newRepPassword) {

        $statement = $pdo->prepare('UPDATE users SET password = :password WHERE id = :id');

        $statement->bindParam(':password', password_hash($newPassword, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

$statement->execute();
}
}

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
