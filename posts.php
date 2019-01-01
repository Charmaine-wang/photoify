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
          <img class="post-image" src=<?php echo"/app/posts/upload-image/".$post['content'];?>>
          <p class="post-description"> <?php echo $post['description']; ?></p>
<?php  endforeach; ?>
</div>
</article>
