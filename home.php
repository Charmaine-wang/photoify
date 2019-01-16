<?php require __DIR__.'/views/header.php'; ?>

<article class="profile-home-article">
  <div class="profile-info-home" >

    <form class ="pro-box" action="app/users/picture.php" method="post" enctype="multipart/form-data">

        <div class="profile_img">
          <p><label for="images">Change photo</label></p>
          <input for="profile_pic"type="file"  value="upload file" name="profile_pic" id="profile_pic" accept=".png, .jpeg, .jpg" multiple required>
          <br>
        </div>
      <button type="submit">Upload</button>
      <?php if (isset($_SESSION['user'])): ?>
        <img class="profile-pic-home" src=<?php echo"/app/users/upload/".$_SESSION['user']['profile_pic'];?>>
      <?php endif; ?>
    </form>

    <h2 class="name-rub"> <?= $_SESSION['user']['name'];?> </h2> <br>
    <p>email: <?= $_SESSION['user']['email']; ?></p> <br>
    <p> username:<?= $_SESSION['user']['username']; ?></p> <br>
    <p>profile:<?= $_SESSION['user']['profile_bio'];?></p> <br>
      <div class="icon-box">

        <a href="/profile.php"><i class="fas fa-user user-icon"></i></a>
        <hr class="hr-down">
        <a href="/editprofile.php"><i class="fas fa-users-cog user-icon"></i></i></a>
          <hr class="hr-down">
            <hr class="hr-up">
        <a href="/allposts.php"><i class="fas fa-users user-icon"></i></i></a>
          <hr class="hr-up">
        <a href="/posts.php"><i class="fas fa-camera-retro user-icon"></i></a>
      </div>
  </div>
</article>






<div class="profile-info" >
  <h1 >Profile</h1>
    <form class ="pro-box" action="app/users/picture.php" method="post" enctype="multipart/form-data">
    <?php if (isset($_SESSION['user'])): ?>
      <img class="profile-pic" src=<?php echo"/app/users/upload/".$_SESSION['user']['profile_pic'];?>>
    <?php endif; ?>
        <div class="profile_img">
          <p><label for="images">Change photo</label></p>
          <input for="profile_pic"type="file"  value="upload file" name="profile_pic" id="profile_pic" accept=".png, .jpeg, .jpg" multiple required>
          <br>
        </div>
      <button type="submit">Upload</button>
    </form>
    <h2 class="name-rub"> <?= $_SESSION['user']['name'];?> </h2> <br>
    <p>email: <?= $_SESSION['user']['email']; ?></p> <br>
    <p> username:<?= $_SESSION['user']['username']; ?></p> <br>
    <p>profile:<?= $_SESSION['user']['profile_bio'];?></p> <br>
    <a class="editprofile-btn" href="editprofile.php">EDIT</a>
</div>





<?php require __DIR__.'/views/footer.php'; ?>
