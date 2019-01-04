<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if(isset($_POST['likes_post'])){


$statement = $pdo->prepare('INSERT INTO likes(likes) VALUES(:likes)');

     if (!$statement){
     die(var_dump($pdo->errorInfo()));

     }

   }



   if(!isset($_SESSION['count'])){
   $_SESSION['count'] = 0;
   } else {
   $_SESSION['count']++;

   echo 'Number of page views: '. $_SESSION['count'];
   }



//    `id`    INTEGER PRIMARY KEY AUTOINCREMENT,
// `likes` INTEGER,
// `dislikes`      INTEGER,
// `post_id`       INTEGER NOT NULL UNIQUE
