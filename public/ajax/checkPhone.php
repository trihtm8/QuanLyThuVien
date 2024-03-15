<?php


try {
    $conn = new PDO("mysql:host=localhost;dbname=ct275_project", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    $e->getMessage();
}

$q = (string) $_REQUEST["q"];
if($conn != null) {
    $stament = $conn->prepare("SELECT userID FROM user WHERE phone = ?");
    $stament->execute([$q]);
}


if($stament->rowCount() > 0){
    echo "Số điện thoại này đã tồn tại!###ER";
}
else{
    if (truePhoneNumber($q)){
        echo "Số điện thoại hợp lệ!###OK";
    }else if(!truePhoneNumber($q)){
        echo "Số điện thoại không hợp lệ!###ER";
    }
}

function truePhoneNumber($phone){
    $phone = trim($phone);
    if (strlen($phone) == 10){
        if (preg_match("/^[0][35789][0-9]{8}/i", $phone)){
            return true;
        }
        else return false;
    }
    else return false;
}

$conn = null;