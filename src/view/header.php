<?php
    include(__DIR__ . "../../class/tool/Psr4AutoloaderClass.php");
    $loader = new Psr4AutoloaderClass();
    $loader->register();
    $loader->addNamespace("CT275_project", __DIR__ ."../../class");
    $loader->addNamespace("CT275_project/db", __DIR__ ."../../class/db");
    $loader->addNamespace("CT275_project/tool", __DIR__ ."../../class/tool");

    use CT275_project\Bookname;
    use CT275_project\User;
    session_start();
    $type = Bookname::getAlltype();
    $check=0;
    if (isset($_POST["tenTK"])){
        $_SESSION["userName"] = $_POST["tenTK"];
        $_SESSION["password"] = $_POST["matKhau"];
    }
    if (isset($_SESSION["userName"])){
        $user = User::createByUserName($_SESSION["userName"]);
        $user->checkDB($_SESSION["password"]);
        $_SESSION["role"]=$user->checkRole();
    }else{
        $user = null;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/b265370c1b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}
        
        /* Set gray background color and 100% height */
        .sidenav {
          background-color: #f1f1f1;
          height: 100%;
        }
        
        /* Set black background color, white text and some padding */
        footer {
          background-color: #555;
          color: white;
          padding: 15px;
        }
        
        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
          .sidenav {
            height: auto;
            padding: 15px;
          }
          .row.content {height: auto;} 
        }
      </style>
</head>
<body>
    <header>
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Quản Lý Thư Viện</a>
            </div>
            <form class="navbar-form navbar-left" action="index.php" method="get">
                <div class="form-group">
                <input type="text" name="view" value="indexmain" hidden>
                </div>
                <button type="submit" class="btn btn-default">Trang chủ</button>
            </form>
            <?php foreach ($type as $t): ?>
            <form class="navbar-form navbar-left" action="index.php" id="type<?=htmlspecialchars($t)?>" method="get" hidden>
                <div class="form-group">
                <input type="text" name="view" value="type_of_book">
                <input type="text" name="typeId" value="<?=htmlspecialchars($t)?>">
                </div>
            </form>
            <?php endforeach; ?>
            <button class="dropdown btn btn-default navbar-btn navbar-left">
                <a class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none; color: black;">Thể loại<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php foreach ($type as $t): ?>
                    <li><a href="javascript:{}" onclick="document.getElementById('type<?=htmlspecialchars($t)?>').submit();"><?=htmlspecialchars(Bookname::getTypeNameByNameId($t))?></a></li>
                    <?php endforeach; ?>
                </ul>
            </button>
            <form class="navbar-form navbar-left" action="index.php" method="get">
                <div class="form-group">
                <input type="text" name="view" value="tableDB" hidden>
                </div>
                <button type="submit" class="btn btn-default">Danh sách</button>
            </form>
            <form class="navbar-form navbar-right" style="margin-right: 30px;" action="index.php" method="get">
                <div class="form-group">
                    <input type="text" size="30" onkeyup="showResult(this.value)" placeholder="Nhập tên sách hoặc tác giả">
                    <input type="text" name="view" value="tableDB" hidden>
                    <div id="livesearch"></div>
                </div>
                <button type="submit">Tìm kiếm</button>
            </form>
            <div class="navbar-right dropdown">
                <form action="index.php" method="get" id="personal_page" hidden><input type="text" name="view" value="personal"></form>
                <form action="index.php" method="get" id="setting" hidden><input type="text" name="view" value="personal"></form>
                <form action="ajax/logout.php" method="get" id="logout" hidden><input type="text" name="logout" value="logout"></form>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 40px;">
                    <img src="<?php 
                    if ($user == null){
                        echo "/img/AnhMacDinh.jpg";
                    }else {
                        echo $user->avatar;
                    }
                    ?>" alt="Ảnh đại diện" class="img-circle img-fluid" style="height: 30px; margin: 0px; padding: 0px; border: 0px; top: 0px;">
                </button>
                <ul class="dropdown-menu">
                    <?php if($user != null): ?>
                    <li><a href="javascript:{}" onclick="document.getElementById('personal_page').submit();">Trang cá nhân</a></li>
                    <li><a href="javascript:{}" onclick="document.getElementById('setting').submit();">Cài đặt</a></li>
                    <hr>
                    <li><a href="javascript:{}" onclick="document.getElementById('logout').submit();">Đăng xuất</a></li>
                    <?php if($user->checkRole()=="admin"): ?>
                    <li><a href="admin.php">DB admin</a></li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if($user == null): ?>
                    <li><a href="login-register.php">Đăng nhập</a></li>
                    <?php endif; ?>   
                </div>
            </form>
        </div>
    </header>