<?php require __DIR__.'/views/header.php'; ?>


<?php $allPosts = getAllPosts($pdo); ?>

  <?php  foreach($allPosts as $postUsers): ?>
    <div class="all-posts">
    <img src="app/posts/upload-image/<?= $postUsers['content'] ?>" alt="">
    <p><?= $postUsers['description']?>

      <form action="app/posts/likes.php"  method="post" enctype="multipart/form-data">
        <input type="text" style="display:none" hidden name="post_id" value="<?= $post['id']?>">
        <button type="submit" class="delete" name="likes_add">
          <i class="far fa-heart likes"></i>
          <?php echo $postUsers['likes']?>
          <?php //$likes = getPostLikes($_SESSION['user']['id'], $pdo);?>
        <?php  //foreach($likes as $like): ?>


        </button>
      </form>
    </div>
<?php endforeach; ?>



<?php require __DIR__.'/views/footer.php'; ?>
