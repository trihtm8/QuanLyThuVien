<?php
include("../../src/model/loadClass.php");

use CT275_project\User;

$username = $_REQUEST["username"];
$password = base64_decode($_REQUEST["encodePass"],true);

$user = User::createByUserName($username);
if ($user->truePass($password)) {
    echo "OK";
}else{
    echo "Pasw not true";
}