<?php require __DIR__.'/views/header.php'; ?>

<div class="all-posts">
  <?php $allPosts = getAllPosts($pdo);?>
    <?php  foreach($allPosts as $postUser):?>
  <div class="name-box">
    <img class="feed-profilepic" src="app/users/upload/<?= $postUser['profile_pic']?>" alt="">
    <!-- want to  put everys profile pic over the pi -->
    <h1><?= $postUser['username']?></h1>
  </div>
  <img class="img-feed" src="app/posts/upload-image/<?= $postUser['content'] ?>" alt="">
  <p><?= $postUser['description']?></p>

    <form action="app/posts/likes.php" class="likes-form" method="post">
      <input type="hidden" name="post_id" value="<?= $postUser['id']?>">
      <button type="submit" class="delete" name="likes_add">
        <div class="likes-div">
          <i class="far fa-heart likes-heart"></i>
          <p class="likes" data-id="<?= $post['id'] ?>"><?php echo $postUser['likes']?></p>
        </div>
      </button>
    </form>
      <?php endforeach;?>
</div>


  <?php require __DIR__.'/views/footer.php'; ?>
