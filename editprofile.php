<?php require __DIR__.'/views/header.php'; ?>

    <article>
                <h1>Update profile</h1>

          <?php if (isset($_SESSION['user'])): ?>
                <form action="app/users/profile_edit.php" method="post">

                  <div class="form-group">
                      <label for="name">Name</label>
                      <input class="form-control" type="name" name="name" id="name" placeholder="<?= $_SESSION['user']['name'] ?>">
                  </div><!-- /form-group -->

                  <div class="form-group">
                      <label for="username">Username</label>
                      <input class="form-control" type="username"  name="username" placeholder="<?= $_SESSION['user']['username'] ?>">
                  </div><!-- /form-group -->

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="<?= $_SESSION['user']['email'] ?>">
                    </div><!-- /form-group -->

                    <div class="form-group">
                      <label for="profile_bio">Edit Profilbio</label>
                      <textarea class="form-control" type="profile_bio" name="profile_bio" id="profile_bio" rows="8" cols="80"></textarea>
                    </div>
                  </form>

                  <div class="form-group">
                      <label for="password">Confirm with assword</label>
                      <input class="form-control" type="password" name="password" placeholder="Old Password">
                  </div><!-- /form-group -->
                <button type="submit" class="btn btn-primary">Update</button>

    </article><br><br>


    <article>
    <h1>Change password</h1>
      <form action="app/users/password.php" method="post">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="<?= $_SESSION['user']['email'] ?>">
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input class="form-control" type="password" name="newpassword" placeholder="New Password">
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label for="password">Old Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Old Password">
                    </div><!-- /form-group -->

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </article>

      <?php endif; ?>
  <?php require __DIR__.'/views/footer.php'; ?>
