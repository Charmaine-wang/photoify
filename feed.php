<?php require __DIR__.'/views/header.php'; ?>




    <div class="all-posts">

      <?php $allPosts = getAllPosts($pdo);?>

        <?php  foreach($allPosts as $postUser):?>

<img class="feed-profilepic" src="app/users/upload/<?= $profile_pic?>" alt="">
<!-- want to  put everys profile pic over the pi -->
    <img class="img-feed" src="app/posts/upload-image/<?= $postUser['content'] ?>" alt="">
    <p><?= $postUser['description']?>

      <form action="app/posts/feed-likes.php"  method="post" enctype="multipart/form-data">
        <input type="text" style="display:none" hidden name="post_id" value="<?= $postUser['id']?>">
        <button type="submit" class="delete" name="likes_add">
          <i class="far fa-heart likes"></i>
          <?php echo $postUser['likes']?>

        </button>
      </form>

    </div>

      <?php endforeach;?>
<?php require __DIR__.'/views/footer.php'; ?>
