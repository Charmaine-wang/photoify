<?php require __DIR__.'/views/header.php'; ?>
<!-- get function where i have select from database -->
<?php $posts = getPost($_SESSION['user']['id'], $pdo); ?>
      <!-- foreach image and description -->
<?php  foreach($posts as $post): ?>
        <!-- post all img and description -->
<article>
  <img class="post-image-clicked" src=<?php echo"/app/posts/upload-image/".$post['content'];?>>
  <p class="post-description-clicked"> <?php echo $post['description']; ?></p>
    <form id="<?= $post['id']?>" action="app/posts/likes.php"  method="post" enctype="multipart/form-data">
      <input type="text-clicked" style="display:none" hidden name="post_id" value="<?= $post['id']?>">
      <button type="submit" class="delete" name="likes_add">
              <i class="far fa-heart likes"></i>
              <?php echo $post['likes']?>


            </button>
          </form>
<!--likes send to likes php and cound likes -->

  <div class="form-group">
    <label for="likes_add"></label>
  </div>
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
          </div>

          </form>
</article>

<?php endforeach;?>

<?php require __DIR__.'/views/footer.php'; ?>
