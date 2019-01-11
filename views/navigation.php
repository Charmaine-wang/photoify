<?php

if(!isset($page)){
  $page = '';
};

if ($page === 'index'):?>


<div id="firstpage-sek">
  <div class="firstpage-grey-box">
    <h1 class="header-firstpage">PHOTOIFY</h1>
  </div>
  <div class="yellowbox-firstpage"></div>
</div>

<nav class=" navbar navbar-expand-lg navbar-light bg-light">
    <!-- <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a> -->

    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?>" href="/index.php">HOME</a>
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


</nav>
<?php else:?>

<nav class="navigation-mobile">


  <div class="mobile-nav">
      <div class="hamburger-icon">
  <div class="bar-1"></div>
  <div class="bar-2"></div>
  <div class="bar-3"></div>
  <!-- <i class="fa fa-bars fa-2x" aria-hidden="true"></i> -->
</div>


    <ul class="nav-ist nav-ist__hidden">

      <li class="nav-item-mobile">
        <a class="nav-link-mobile <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?>" href="/index.php">HOME</a>
    </li><!-- /nav-item -->


      <li class="nav-item-mobile">
      <?php if (!isset($_SESSION['user'])): ?>
        <a class="nav-link-mobile <?php echo $_SERVER['SCRIPT_NAME'] === '/signup.php' ? 'active' : ''; ?>" href="/signup.php">SIGNUP</a>
      <?php endif ?>
    </li><!-- /nav-item -->

<?php if (isset($_SESSION['user'])): ?>
        <li class="nav-item-mobile">
            <a class="nav-link-mobile <?php echo $_SERVER['SCRIPT_NAME'] === '/profile.php' ? 'active' : ''; ?>" href="/profile.php">PROFILE</a>
        </li><!-- /nav-item -->
<?php endif; ?>

<li class="nav-item-mobile">
    <?php if (isset($_SESSION['user'])): ?>
    <a class="nav-link-mobile <?php echo $_SERVER['SCRIPT_NAME'] === '/posts.php' ? 'active' : ''; ?>" href="/posts.php">POSTS</a>
    <?php endif ?>
</li><!-- /nav-item -->

<li class="nav-item-mobile">
    <?php if (isset($_SESSION['user'])): ?>
    <a class="nav-link-mobile <?php echo $_SERVER['SCRIPT_NAME'] === '/feed.php' ? 'active' : ''; ?>" href="/feed.php">FEED</a>
    <?php endif ?>
</li><!-- /nav-item -->

      <li class="nav-item-mobile">
          <?php if (isset($_SESSION['user'])): ?>
              <a class="nav-link-mobile" href="/app/users/logout.php">LOGOUT</a>
          <?php else: ?>
              <a class="nav-link-mobile <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="login.php">LOGIN</a>
          <?php endif; ?>
      </li><!-- /nav-item -->



    </ul><!-- /navbar-nav -->
        <?php /*endif;*/ ?>
</nav><!-- /navbar -->

<?php
if (isset($_SESSION['user'])){
$name = $_SESSION['user']['name'];
$email = $_SESSION['user']['email'];
$username = $_SESSION['user']['username'];
$profile_bio = $_SESSION['user']['profile_bio'];


}
?>

<?php endif; ?>
