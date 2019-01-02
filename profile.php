<?php require __DIR__.'/views/header.php';
?>
<div class="profile-info" >
    <h1 >Profile</h1>

<form class ="pro-box" action="app/users/picture.php" method="post" enctype="multipart/form-data">

                <?php if (isset($_SESSION['user'])): ?>
                  <img class="profile_pic" src=<?php echo"/app/users/upload/".$_SESSION['user']['profile_pic'];?>>
                <?php endif; ?>

                <div class="profile_img">
                    <p><label for="images">Change photo</label></p>
                    <input for="profile_pic"type="file"  value="upload file" name="profile_pic" id="profile_pic" accept=".png, .jpeg, .jpg" multiple required>
                    <br>
                </div>
                        <button type="submit">Upload</button>

        </form>

<!-- <form action="app/users/profile_edit.php" method="post" enctype="multipart/form-data"> -->
<!-- Name -->   <p>name: <?= $_SESSION['user']['name'];?> </p> <br>
<!-- EMAIL --> <p>  email: <?= $_SESSION['user']['email']; ?></p> <br>
  <!--USERNAME --> <p> username:<?= $_SESSION['user']['username']; ?></p> <br>
  <!--BIO --><p> bio:<?= $_SESSION['user']['profile_bio'];?></p> <br>

  <a href="editprofile.php">EDIT</a>
<!-- </form> -->
<!--<a href="/app/users/delete.php">Delete my user</a> -->
</div>
<?php require __DIR__.'/views/footer.php'; ?>
