<?php require __DIR__.'/views/header.php'; ?>
<?php //if (isset($_SESSION['user'])): ?>
<!-- UPLOAD IMAGE -->
<!-- <article class="post-container"> -->

<article class="posts-article">
  <form action="app/posts/store.php" method="post" enctype="multipart/form-data" class="posts-form">
    <div class="form-group">
        <label for="post_image">Image</label>
        <input class="form-control" type="file" name="post_image">
      </div><!-- /form-group -->

      <div class="form-group">
          <label for="description">content</label>
          <textarea class="form-control" type="text" name="description"></textarea>
      </div><!-- /form-group -->

      <button type="submit" class="btn_posts">Upload post</button>
</form>
</article>


<!--SMALL IMAGE TOGETHER-->
      <?php $posts = getPost($_SESSION['user']['id'], $pdo); ?>
<div class="post-img-des">
<!-- get function where i have select from database -->

      <!-- foreach image and description -->
      <?php  foreach($posts as $post): ?>
        <!-- post all img and description -->
          <img data-id="<?= $post['id']?>" class="post-image img-small" src=<?php echo"/app/posts/upload-image/".$post['content'];?>>

</div>



<div data-id="<?= $post['id']?>" class="img-pop modal">
  <!-- The Close Button -->
  <span data-id="<?= $post['id']?>" class="close">&times;</span>

  <div class="description-container">
    <div class="container">
      <img data-id="<?= $post['id']?>" class="image-clicked" src=<?php echo"/app/posts/upload-image/".$post['content'];?>>
      <form id="<?= $post['id']?>" action="app/posts/likes.php"  method="post" enctype="multipart/form-data">
        <input type="text" style="display:none" hidden name="post_id" value="<?= $post['id']?>">
        <button type="submit" class="delete" name="likes_add">
      <i class="far fa-heart likes-heart"></i>
      <p class="likes"><?php echo $post['likes']?></p>
    </button>
  </form>
  <div class="form-group">
    <label for="likes_add"></label>
  </div>
    </div>

<!-- use session to get user???-->
    <h3 class="slide-name">CHARREBARRE</h3>

    <div class="description-btn"><i class="fas fa-arrow-up"></i></div>
    <div class="description-text"><i class="fas fa-ellipsis-h change-post"></i>
      <p class="text-des"><?php echo $post['description']?></p>
    </div>
      <div data-id="<?= $post['id']?>" class="post-edit">
      <form action="app/posts/update.php"  method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="post_description">Edit description</label>
          <textarea class="form-control descrip-text" type="text" name="post_description"> <?php echo $post['description']; ?></textarea>
        </div>
        <button type="submit" class="post" name="post_id" value="<?= $post['id'] ?>">edit</button>
      </form>



      <form action="app/posts/delete.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="delete_post">Delete Post</label>
        </div>
        <button type="submit" class="delete" name="delete_post" value="<?= $post['id'] ?>">DELETE</button>
      </div>

      </form>


  </div>
</div>

        <?php endforeach;?>

<!-- </article> -->

<?php require __DIR__.'/views/footer.php'; ?>
