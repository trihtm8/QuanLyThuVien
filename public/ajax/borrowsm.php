<?php
include("../../src/model/loadClass.php");
use CT275_project\tool\Borrow_keeper;
use CT275_project\User;
session_start();

echo '<h1 id="loading">Đang xử lý...<h1>';
if(isset($_GET["borrow"])){
    $thisuser = User::createByUserName($_SESSION["userName"]);
    $thisuser->checkDB($_SESSION["password"]);
    $thisuser->update('balance', $thisuser->balance-Borrow_keeper::sumcost());
    if (isset($_SESSION["borrow_keeper"])){
        if (count($_SESSION["borrow_keeper"])>0){
            Borrow_keeper::borrow($_GET["borrowDate"], $_GET["deadLine"]);
            header("refresh:2;url=../index.php?view=indexmain");
            echo '<script>
                document.getElementById("loading").setAttribute("hidden", true);
            </script>';
            echo '<h1>Mượn thành công! <a href="CT275-project.localhost/index.php?view=indexmain">Quay lại trang chủ</a></h1>';
        }
    }
    
}

?>
