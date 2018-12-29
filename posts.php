
<form action="app/posts/createposts.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="image">Image</label>
        <input class="form-control" type="file" name="post_image">
    </div><!-- /form-group -->

    <div class="form-group">
        <label for="description">content</label>
        <textarea class="form-control" type="text" name="description"></textarea>
    </div><!-- /form-group -->

    <button type="submit" class="btn btn-primary">Upload post</button>
</form>
</article>
