<?php require __DIR__.'/views/header.php';
?>

<article class="article-create">
  <h1>Register</h1>
  <form action="app/users/create.php" method="post" class="form-create">
    <div class="form-group">
      <!-- <label class="signup-label"  for="email">EMAIL</label> -->
      <input class="signup-text" type="email" name="email" id="email" required><br>
      <small class="form-text text-muted">Please provide the your email address.</small>
    </div><!-- /form-group -->

    <div class="form-group">
      <!-- <label class="signup-label" for="username">USERNAME</label> -->
      <input class="signup-text" type="username" name="username" id="username" placeholder="Username" required><br>
      <small class="form-text text-muted">Please provide the your username (passphrase).</small>
    </div><!-- /form-group -->

    <div class="form-group">
      <!-- <label class="signup-label" for="name">NAME</label> -->
      <input class="signup-text" type="name" name="name" id="name" placeholder="Name" required><br>
      <small class="form-text text-muted">Please provide the your name (passphrase).</small>
    </div><!-- /form-group -->

    <div class="form-group">
      <!-- <label class="signup-label" for="password">PASSWORD</label> -->
      <input class="signup-text" type="password" name="password" id="password" placeholder="Password" required><br>
      <small class="form-text text-muted">Please provide the your password (passphrase).</small>
    </div><!-- /form-group -->

    <div class="form-group">
      <!-- <label class="signup-label" for="r_password">REPEAT PASSWORD</label> -->
      <input class="signup-text" type="password" name="r_password" id="r_password" placeholder="Repeat Password" required><br>
      <small class="form-text text-muted">Please provide the your password (passphrase).</small>
    </div><!-- /form-group -->

    <button class="create-button" type="submit" name ="submit" class="btn btn-primary">CREATE ACCOUNT</button>
  </form>
</article>


<?php require __DIR__.'/views/footer.php'; ?>
