<?php require __DIR__.'/views/header.php'; ?>

    <h1>Profile</h1>




    <div class="profile_img">
      <?php if (isset($_SESSION['user'])): ?>

        <img class="profile_pic" src=<?php echo"/app/users/upload/".$_SESSION['user']['profile_pic'];?>>
      <?php endif; ?>
       <form action="app/users/picture.php" method="post" enctype="multipart/form-data">
          <div>
            <p><label for="images">Change photo</label></p>
            <input for="profile_pic"type="file"  value="upload file" name="profile_pic" id="profile_pic" accept=".png, .jpeg, .jpg" multiple required>
                </div><br>
                <button type="submit">Upload</button>
            </form>
        </div>


<!-- Name -->     <?= $_SESSION['user']['name'];?> <br>
<!-- EMAIL -->   <?= $_SESSION['user']['email']; ?><br>
  <!--USERNAME --><?= $_SESSION['user']['username']; ?><br>

  <!--BIO --><?= $_SESSION['user']['profile_bio']; ?><br><a href="editprofile.php">EDIT</a>

<!--<a href="/app/users/delete.php">Delete my user</a> -->


<?php require __DIR__.'/views/footer.php'; ?>
