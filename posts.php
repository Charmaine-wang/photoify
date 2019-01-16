<?php require __DIR__.'/views/header.php'; ?>

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
<div class="edit-div">
  <div class="post-img-des">
  <?php $posts = getPost($_SESSION['user']['id'], $pdo); ?>
  <?php  foreach($posts as $post): ?>
    <img data-id="<?= $post['id']?>" class="post-image img-small" src=<?php echo"/app/posts/upload-image/".$post['content'];?>>
    <div data-id="<?= $post['id']?>" class="img-pop modal">
      <!-- The Close Button -->
    <span data-id="<?= $post['id']?>" class="close">&times;</span>
      <div class="description-container">
      <div class="container-post">
        <img data-id="<?= $post['id']?>" class="image-clicked" src=<?php echo"/app/posts/upload-image/".$post['content'];?>>
          <form id="<?= $post['id']?>"class="likes-form" action="app/posts/likes.php"  method="post">
            <input type="hidden" name="post_id" value="<?= $post['id']?>">
            <button type="submit" class="">
              <div class="likes-div">
                <i class="far fa-heart likes-heart"></i>
                <p class="likes" data-id="<?= $post['id'] ?>"><?php echo $post['likes']?></p>
              </div>
            </button>
        </form>
      </div>
  <!-- use session to get user???-->
        <h3 class="slide-name"><?php  echo $_SESSION['user']['username']; ?></h3>
          <div class="description-btn"><i class="fas fa-arrow-up"></i></div>

          <div class="description-text"><i data-id="<?= $post['id']?>"class="fas fa-ellipsis-h change-post"></i>
            <p class="text-des" id="<?= $post['id']?>" ><?php echo $post['description']?></p>
          </div>
          <div data-id="<?= $post['id']?>" class="post-edit">
          <form action="app/posts/update.php"  class="update-form" method="post">
            <div class="form-group">
              <label for="post_description">Edit description</label>
              <input type="hidden" name="post_id" value="<?= $post['id']?>">
              <textarea class="form-control descrip-text" type="text" name="post_description"> <?php echo $post['description']; ?></textarea>
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

        </div>
      </div>
  <?php endforeach;?>
  </div><!-- post-img-des (div)-->
</div>




<?php require __DIR__.'/views/footer.php'; ?>
