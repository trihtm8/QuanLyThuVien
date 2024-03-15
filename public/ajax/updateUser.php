<?php
include("../../src/model/loadClass.php");
use CT275_project\User;
session_start();

$thisuser = User::createByUserName($_SESSION["userName"]);
$thisuser->checkDB($_SESSION["password"]);

if (isset($_POST["changePass"])){
    if($thisuser->changePass($_POST["oldpass"], $_POST["newpass"])){
        $_SESSION["password"]=$_POST["newpass"];
        header("refresh:2;url=../index.php?view=personal");
        echo '<h1>Thay đổi thành công! <a href="CT275-project.localhost/index.php?view=personal">Quay lại trang cá nhân</a></h1>';
    }else{
        header("refresh:2;url=../index.php?view=personal");
        echo '<h1>Sai mật khẩu! <a href="CT275-project.localhost/index.php?view=personal">Quay lại trang cá nhân</a></h1>';
    }
}elseif (isset($_POST["changeTarget"])){
    if($thisuser->update($_POST["changeTarget"], $_POST["changeValue"])){
        if($_POST["changeTarget"]=="userName"){
            $_SESSION["userName"]=$_POST["changeValue"];
        }
        header("refresh:2;url=../index.php?view=personal");
        echo '<h1>Thay đổi thành công! <a href="CT275-project.localhost/index.php?view=personal">Quay lại trang cá nhân</a></h1>';
    }else{
        header("refresh:2;url=../index.php?view=personal");
        echo '<h1>Có lỗi khi thay đổi! <a href="CT275-project.localhost/index.php?view=personal">Quay lại trang cá nhân</a></h1>';
    }
}elseif (isset($_POST["addBalance"])){
    if($thisuser->update('balance', $thisuser->balance+abs($_POST["addBalance"]))){
        header("refresh:2;url=../index.php?view=personal");
        echo '<h1>Thay đổi thành công! <a href="CT275-project.localhost/index.php?view=personal">Quay lại trang cá nhân</a></h1>';
    }else{
        header("refresh:2;url=../index.php?view=personal");
        echo '<h1>Có lỗi khi thay đổi! <a href="CT275-project.localhost/index.php?view=personal">Quay lại trang cá nhân</a></h1>';
    }
}