<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

function getPost(int $userID, $pdo){


  $statement = $pdo->prepare('SELECT * FROM posts WHERE user_id = :user_id');

  $statement->bindParam(':user_id', $userId, PDO::PARAM_STR);

  $statement->execute();

  $user = $statement->fetchAll(PDO::FETCH_ASSOC);


}
