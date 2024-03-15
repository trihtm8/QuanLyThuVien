<?php
    include(__DIR__ . "../../class/tool/Psr4AutoloaderClass.php");
    $loader = new Psr4AutoloaderClass();
    $loader->register();
    $loader->addNamespace("CT275_project", __DIR__ ."../../class");
    $loader->addNamespace("CT275_project\db", __DIR__ ."../../class/db");
    $loader->addNamespace("CT275_project\\tool", __DIR__ ."../../class/tool");
?>