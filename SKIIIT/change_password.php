<?php require __DIR__.'/views/header.php'; ?>

<form action="app/users/password.php" method="post">

<div class="form-group edit-group">
    <label for="new_password">NEW Password</label>
    <input class="form-control" type="password" name="new_password" placeholder="password">
</div><!-- /form-group -->

<div class="form-group edit-group">
    <label for="repeat_password">REPEAT NEW Password</label>
    <input class="form-control" type="password" name="repeat_password" placeholder="password">
</div><!-- /form-group -->


<div class="form-group edit-group">
    <label for="password">Confirm with Password</label>
    <input class="form-control" type="password" name="confirm_old_password" placeholder="password" required>
</div><!-- /form-group -->


<button type="submit" class="btn btn-primary">Update</button>
</form>

<?php require __DIR__.'/views/footer.php'; ?>



<?php $likes = getLikes($_SESSION['user']['id'], $pdo); ?>

<?php foreach($likes as $like): ?>
<form action="app/posts/likes.php"  method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="likes_add"></label>
  </div>
  <i class="far fa-heart likes"><button type="submit" class="delete" name="likes_add" value="<?= $like['id'] ?>">
</i>
    <p>  <?php echo $like['like']?></p></button>



</form>
<?php endforeach;?>
</div>
