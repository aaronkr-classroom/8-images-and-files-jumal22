<?php 
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $message = '<b>File:</b> ' . $_FILES['image']['name'] . '<br>';
    $message .= '<b>Size:</b> ' . $_FILES['image']['size'] . ' bytes';
  } else {
    $message = "file could not be uploaded.";
  }
}
?>
<?php include 'includes/header.php' ?>

<?= $message ?>
<form method="POST" action="upload-file.php" enctype="multipart/form-data">
  <label for="image"><b>Upload file:</b></label>
  <input type="file" name="image" accept="image/*" id="image"><br>
  <input type="submit" value="Upload">
</form>

<?php include 'includes/footer.php' ?>