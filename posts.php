
<form action="app/posts/store.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_image">Image</label>
        <input class="form-control" type="file" name="post_image">

        <?php if (isset($_SESSION['user'])): ?>
          <img class="profile_pic" src=<?php echo"/app/posts/upload-image/".$_SESSION['posts']['content'];?>>

        <?php endif; ?>
    </div><!-- /form-group -->

    <div class="form-group">
        <label for="description">content</label>
        <textarea class="form-control" type="text" name="description"></textarea>
    </div><!-- /form-group -->

    <button type="submit" class="btn_posts">Upload post</button>
</form>
</article>
