<?php


try {
    $conn = new PDO("mysql:host=localhost;dbname=ct275_project", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    $e->getMessage();
}

$q = (string) $_REQUEST["q"];

if ($q != "" && $conn != null) {
    $stament = $conn->prepare("SELECT userId FROM user WHERE userName = ?");
    $stament->execute([$q]);



    if($stament->rowCount() > 0){
        echo "User name đã tồn tại!###ER";
    }
    else{
        if (strlen($q)<5){
            echo "User name quá ngắn!###ER";
        }else{
            echo "User name hợp lệ!###OK";
        }
    }
}

$conn = null;
