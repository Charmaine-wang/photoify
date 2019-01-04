<?php require __DIR__.'/views/header.php'; ?>

    <article class="edit-profile">
                <h1>Update profile</h1>


                <form action="app/users/profile_edit.php" method="post">

                  <div class="form-group edit-group">
                      <label for="name">Name</label>
                      <input class="form-control" type="name" name="name" value="<?= $_SESSION['user']['name']?>">
                  </div><!-- /form-group -->

                  <div class="form-group edit-group">
                      <label for="username">Username</label>
                      <input class="form-control" type="username"  name="username" value="<?= $_SESSION['user']['username']?>">
                  </div><!-- /form-group -->

                    <div class="form-group edit-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" value="<?= $_SESSION['user']['email']?>">
                    </div><!-- /form-group -->

                    <div class="form-group edit-group">
                      <label for="profile_bio">Edit Profilbio</label>
                      <textarea class="form-control" type="profile_bio" name="profile_bio"rows="8" cols="80"><?= $_SESSION['user']['profile_bio'] ?>
                      </textarea>
                    </div>
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
                        <input class="form-control" type="password" name="confirm_password" placeholder="password" required>
                    </div><!-- /form-group -->


                <button type="submit" class="btn btn-primary">Update</button>
</form>

</article>


  <?php require __DIR__.'/views/footer.php'; ?>
