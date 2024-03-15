<?php
include("../../src/model/loadClass.php");
use CT275_project\db\PDOFactory;
use CT275_project\User;
session_start();

$target_dir = $_SERVER['DOCUMENT_ROOT']."/img/";
$target_file = $target_dir . basename($_FILES["changeAvatar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["avtsubmit"])) {
  $check = getimagesize($_FILES["changeAvatar"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Đây không phải là ảnh!";
    $uploadOk = 0;
  }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Ảnh này đã tồn tại trên máy chủ, đổi tên để uplaod lại!";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["changeAvatar"]["size"] > 500000) {
    echo "Kích thước quá lớn!";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Ảnh chưa được gửi về server!";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["changeAvatar"]["tmp_name"], $target_file)) {
      header("refresh:2;url=../index.php?view=personal");   
      echo "Ảnh ". htmlspecialchars( basename( $_FILES["changeAvatar"]["name"])). " đã được cập nhật!";
      $thisuser=User::createByUserName($_SESSION["userName"]);
      $thisuser->checkDB($_SESSION["password"]);
      $PDOF = new PDOFactory();
      $PDOF->connect();
      $conn = $PDOF->conector();
      $stament = $conn->prepare("UPDATE user SET avatar = ? WHERE userId=?");
      $stament->execute(["/img/".htmlspecialchars( basename( $_FILES["changeAvatar"]["name"])), $thisuser->userId]);
    } else {
      echo "Gặp lỗi khi upload ảnh!";
    }
  }
?>
