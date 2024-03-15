<?php
include("../../src/model/loadClass.php");
use CT275_project\tool\Borrow_keeper;
session_start();

Borrow_keeper::init();
if (isset($_REQUEST["keep"])){
    Borrow_keeper::keep($_REQUEST["keep"]);
    echo "Giữ thẻ thành công!###";
    echo Borrow_keeper::sum();
}elseif (isset($_REQUEST["pop"])){
    Borrow_keeper::pop($_REQUEST["pop"]);
    echo "Xóa thẻ thành công!###";
    echo Borrow_keeper::sum();
}elseif (isset($_REQUEST["popall"])){
    Borrow_keeper::popAll();
    echo "Xóa thẻ thành công!###";
    echo Borrow_keeper::sum();
}elseif (isset($_REQUEST["count"])){
    if (isset($_SESSION["borrow_keeper"][$_REQUEST["count"]])){
        echo $_SESSION["borrow_keeper"][$_REQUEST["count"]];
    }else{
        echo 0;
    }
}

