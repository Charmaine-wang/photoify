<?php

$page = trim($_SERVER['REQUEST_URI'], '/');

if ($page === '' || $page === 'index.php'):?>


<div class="firstpage-sek">
  <div class="firstpage-grey-box">
    <h1 class="header-firstpage">PHOTOIFY</h1>
  </div>
  <div class="yellowbox-firstpage"></div>
</div>

<nav class="navigation-mobile navbar navbar-expand-lg navbar-light bg-light">
    <!-- <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a> -->

    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?>" href="/index.php">HOME</a>
    </li><!-- /nav-item -->

    <li class="nav-item">
        <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/posts.php' ? 'active' : ''; ?>" href="/posts.php">POSTS</a>
    </li><!-- /nav-item -->

      <li class="nav-item">
      <?php if (!isset($_SESSION['user'])): ?>
        <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/signup.php' ? 'active' : ''; ?>" href="/signup.php">SIGNUP</a>
      <?php endif ?>
    </li><!-- /nav-item -->

<?php if (isset($_SESSION['user'])): ?>
        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/profile.php' ? 'active' : ''; ?>" href="/profile.php">PROFILE</a>
        </li><!-- /nav-item -->
<?php endif; ?>

<li class="nav-item">
    <?php if (isset($_SESSION['user'])): ?>
    <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/posts.php' ? 'active' : ''; ?>" href="/posts.php">POSTS</a>
    <?php endif ?>
</li><!-- /nav-item -->

      <li class="nav-item">
          <?php if (isset($_SESSION['user'])): ?>
              <a class="nav-link" href="/app/users/logout.php">LOGOUT</a>
          <?php else: ?>
              <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="login.php">LOGIN</a>
          <?php endif; ?>
      </li><!-- /nav-item -->




    </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->


<?php endif;?>
