<?php require __DIR__.'/views/header.php';
?>

    <h1>Profile</h1>


<form action="app/users/picture.php" method="post" enctype="multipart/form-data">
        <div class="profile_img">
            <p><label for="images">Change photo</label></p>
            <input for="profile_pic"type="file"  value="upload file" name="profile_pic" id="profile_pic" accept=".png, .jpeg, .jpg" multiple required>
            <br>
        </div>
                <button type="submit">Upload</button>

                <?php if (isset($_SESSION['user'])): ?>
                  <img class="profile_pic" src=<?php echo"/app/users/upload/".$_SESSION['user']['profile_pic'];?>>

                <?php endif; ?>
        </form>

<!-- <form action="app/users/profile_edit.php" method="post" enctype="multipart/form-data"> -->
<!-- Name -->    name: <?= $_SESSION['user']['name'];?> <br>
<!-- EMAIL -->  email: <?= $_SESSION['user']['email']; ?><br>
  <!--USERNAME --> username:<?= $_SESSION['user']['username']; ?><br>
  <!--BIO -->bio:<?= $_SESSION['user']['profile_bio'];?><br>

  <a href="editprofile.php">EDIT</a>
<!-- </form> -->
<!--<a href="/app/users/delete.php">Delete my user</a> -->

<?php require __DIR__.'/views/footer.php'; ?>
