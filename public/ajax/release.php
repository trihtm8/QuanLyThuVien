<?php
include("../../src/model/loadClass.php");
use CT275_project\Borrowcard;
session_start();

if (isset($_GET["release"])){
    $createbrc = new Borrowcard(-1);
    $borrowcards = $createbrc->getAll();
    $forms = Borrowcard::groupbyForm($borrowcards);
    foreach ($forms as $form => $brcs){
        if($form == $_GET["release"]){
            foreach($brcs as $brc){
                $brc->release();
            }
            break;
        }
    }
    header("refresh:2;url=../index.php?view=personal");
    echo '<h1>Trả thành công! <a href="CT275-project.localhost/index.php?view=personal">Quay lại trang cá nhân</a></h1>';
}
?>