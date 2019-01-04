<?php require __DIR__.'/views/header.php'; ?>

<article class="login-form">
    <h1>Login</h1>

    <form class="form-log" action="app/users/login.php" method="post">
        <div class="form-group login-label">
            <label for="email">Email</label><br>
            <input class="form-control login-box" type="email" name="email" id="email" placeholder="francis@darjeeling.com" required>
            <small class="form-text text-muted"><br>Please provide the your email address.</small>
        </div><!-- /form-group -->
<br>
        <div class="form-group login-label ">
            <label for="password">Password</label><br>
            <input class="form-control login-box" type="password" name="password" id="password" required>
            <small class="form-text text-muted"><br>Please provide the your password (passphrase).</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
