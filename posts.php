<?php require __DIR__.'/views/header.php'; ?>

<article class="">
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
<!--likes send to likes php and cound likes -->


<?php $likes = getLikes($_SESSION['user']['id'], $pdo); ?>

<form action="app/posts/likes.php"  method="post" enctype="multipart/form-data">
<?php foreach($likes as $like): ?>
  <div class="form-group">
    <label for="likes_add"></label>
  </div>
    <p>  <?php echo $like['like']?></p></button>
<?php endforeach;?>
    <i class="far fa-heart likes"></i><button type="submit" class="delete" name="likes_add" value="<?= $like['id'] ?>">


</form>



</div>


          <!-- give the icon and the div that will slide out when you click the same data-id -->
          <i data-id="<?= $post['id']?>" class="fas fa-cogs change-post"></i>
          <!-- form that will show when you click -->
          <div data-id="<?= $post['id']?>" class="post-edit">




          <form action="app/posts/update.php"  method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="post_description">Edit description</label>
              <textarea class="form-control" type="text" name="post_description"> <?php echo $post['description']; ?></textarea>
            </div>
            <button type="submit" class="post" name="post_id" value="<?= $post['id'] ?>">edit</button>
          </form>

          <form action="app/posts/delete.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="delete_post">Delete Post</label>
            </div>
            <button type="submit" class="delete" name="delete_post" value="<?= $post['id'] ?>">DELETE</button>

          </form>
    </div>


      </article>
<?php endforeach;?>


<?php require __DIR__.'/views/footer.php'; ?>
