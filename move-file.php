<?php
//upload 
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    //임시 경로와 새로운 목적지를 저장한다.
    $temp = $_FILES['image']['tmp_name'];
    $path = 'uploads/' . $_FILES['image']['name']; //candy.png
    //파일을 이동하고 그결과를 $move에 저장한다
    $moved = move_uploaded_file($temp, $path);
  } 
  if ($moved) {
    $message = '<img src="' . $path . '">'; //웹사이트에 표시
    }  
      else {
    $message = "file could not be uploaded.";
  }
  
}

//move file code

?>
<?php include 'includes/header.php' ?>
<?= $message ?>
<form method="POST" action="move-file.php" enctype="multipart/form-data">
  <label for="image"><b>Upload file:</b></label>
  <input type="file" name="image" accept="image/*" id="image"><br>
  <input type="submit" value="upload">
</form>
<?php include 'includes/footer.php' ?>