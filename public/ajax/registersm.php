<?php
include("../../src/model/loadClass.php");
use CT275_project\db\PDOFactory;

if (isset($_POST["dangky"])){
    $PDOF = new PDOFactory();
    $PDOF->connect();
    if ($PDOF->notError){
        $conn = $PDOF->conector();
        $stament = $conn->prepare("INSERT INTO user (userName, phone, password) VALUES (?, ?, ?)");
        $stament->execute([$_POST["tenTK"], $_POST["sdt"], $_POST["matKhau"]]);
        $conn = null;
    }
    $PDOF = $PDOF->disconnect();
}
header( "refresh:2;url=../login-register.php" );
echo '<h1>Đăng ký thành công! <a href="CT275-project.localhost/login-register.php">Quay lại đăng nhập</a></h1>';