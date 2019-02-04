<?php require __DIR__.'/views/header.php'; ?>

  <div class="post-img-des">
    <div class="choose-image-style">
    <a href="allpost-single.php"><i class="fas fa-image image-style"></i></a>
    <a href="allposts.php"><i class="far fa-images image-style"></i></a>
    </div>
      <!-- Get all posts in database -->
    <?php $allPosts = getAllPosts($pdo);?>
      <?php  foreach ($allPosts as $postUser):?>
    <img data-id="<?= $postUser['id']?>" class="post-image img-small" src="app/posts/upload-image/<?= $postUser['content'] ?>">
    <div data-id="<?= $postUser['id']?>" class="img-pop modal">
      <!-- Close Button -->
    <span data-id="<?= $postUser['id']?>" class="close">&times;</span>
      <div class="description-container">
      <div class="container-post">
        <img data-id="<?= $postUser['id']?>" class="image-clicked" src="app/posts/upload-image/<?= $postUser['content'] ?>">
          <form id="<?= $postUser['id']?>"class="likes-form" action="app/posts/likes.php"  method="post">
            <input type="hidden" name="post_id" value="<?= $postUser['id']?>">
            <button type="submit" class="">
              <div class="likes-div">
                <i class="far fa-heart likes-heart"></i>
                <p class="likes" data-id="<?= $postUser['id'] ?>"><?php echo $postUser['likes']?></p>
              </div>
            </button>
        </form>
      </div>
        <h3 class="slide-name"><?php echo $postUser['username']; ?></h3>
          <div class="description-btn"><i class="fas fa-arrow-up"></i></div>
          <div class="description-text">
            <p class="text-des" id="<?= $postUser['id']?>" ><?php echo $postUser['description']?></p>
          </div>
        </div>
      </div>
  <?php endforeach;?>
  </div><!-- post-img-des (div)-->



  <?php require __DIR__.'/views/footer.php'; ?>
