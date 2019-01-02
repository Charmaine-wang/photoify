<?php require __DIR__.'/views/header.php'; ?>

<form action="app/posts/store.php" method="post" enctype="multipart/form-data">
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

<div class="post-img-des">

<!-- get function where i have select from database -->
      <?php $posts = getPost($_SESSION['user']['id'], $pdo); ?>
      <!-- foreach image and description -->
      <?php  foreach($posts as $post): ?>
        <!-- post all img and description -->
          <img class="post-image" src=<?php echo"/app/posts/upload-image/".$post['content'];?>>
          <p class="post-description"> <?php echo $post['description']; ?></p>

<!-- give the icon and the div that will slide out when you click the same data-id -->
          <i data-id="<?= $post['id']?>" class="fas fa-cogs change-post"></i>
          <div data-id="<?= $post['id']?>" class="post-edit">
            <!-- form that will show when you click -->
          <form action="app/posts/update.php"  method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="post_description">Edit description</label>
              <input class="form-control" type="file" name="post_image">
            </div>
          </form>

          <form action="app/posts/delete.php" method="post" enctype="multipart/form-data">
              <label for="post_image">Delete Post</label>
          </form>
          </div>
<?php endforeach;?>
</div>
</article>



<?php require __DIR__.'/views/footer.php'; ?>
