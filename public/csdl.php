
<?php
session_start();
include('../prepare/src/dbconnect.php');
if (isset($_SESSION["userName"])) :
    $sql = "SELECT * from book";
    $ketqua = $conn->prepare($sql);
    $ketqua->execute();
    $ketqua = $ketqua->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * from bookname";
    $ketqua1 = $conn->prepare($sql);
    $ketqua1->execute();
    $ketqua1 = $ketqua1->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * from booktype";
    $ketqua2 = $conn->prepare($sql);
    $ketqua2->execute();
    $ketqua2 = $ketqua2->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT s.bookId, b.bookId, b.cardId, b.borrowDate, b.deadLine, b.form, b.state , u.userId, b.userId from borrowcard b join book s on b.bookId=s.bookId JOIN user u ON b.userId = u.userId;";
    $ketqua3 = $conn->prepare($sql);
    $ketqua3->execute();
    $ketqua3 = $ketqua3->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * from user";
    $ketqua4 = $conn->prepare($sql);
    $ketqua4->execute();
    $ketqua4 = $ketqua4->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete_book'])) {
            $id = $_POST['id_book'];
            $sql = "DELETE FROM book where bookId=?";
            $ketqua = $conn->prepare($sql);
            $ketqua->execute([$id]);
            header("Location:csdl.php");
        }
    };
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete_bookname'])) {
            $id = $_POST['id_bookname'];
            $sql = "DELETE FROM bookname where nameId=?";
            $ketqua = $conn->prepare($sql);
            $ketqua->execute([$id]);
            header("Location:csdl.php");
        }
    };
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete_booktype'])) {
            $id = $_POST['id_booktype'];
            $sql = "DELETE FROM booktype where typeId=?";
            $ketqua = $conn->prepare($sql);
            $ketqua->execute([$id]);
            header("Location:csdl.php");
        }
    };
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete_borrowcard'])) {
            $id = $_POST['id_borrowcard'];
            $sql = "DELETE FROM borrowcard where cardId=?";
            $ketqua = $conn->prepare($sql);
            $ketqua->execute([$id]);
            header("Location:csdl.php");
        }
    };
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete_user'])) {
            $id = $_POST['id_user'];
            $sql = "DELETE FROM user where userId=?";
            $ketqua = $conn->prepare($sql);
            $ketqua->execute([$id]);
            header("Location:csdl.php");
        }
    };
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cơ sở dữ liệu</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/b265370c1b.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="ms-2 mt-2"><a href="index.php"><input type="button" value="Trang chủ"></a></div>
        <main>
            <div class="container-fluid border mt-5 mb-5" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <h2>Cơ sở dữ liệu</h2>
                        <hr>
                        <div class="d-grid me-5 ms-5">
                            <button id="book_info_tbl">book</button>
                        </div>
                        <hr>
                        <div class="d-grid me-5 ms-5">
                            <button id="bookname_info_tbl">bookname</button>
                        </div>
                        <hr>
                        <div class="d-grid me-5 ms-5">
                            <button id="booktype_info_tbl">booktype</button>
                        </div>
                        <hr>
                        <div class="d-grid me-5 ms-5">
                            <button id="borrowcard_info_tbl">borrowcard</button>
                        </div>
                        <hr>
                        <div class="d-grid me-5 ms-5">
                            <button id="user_info_tbl">user</button>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-9 border ">
                        <div id="book_info">
                            <form class="form-horizontal ">
                                <div class="row mt-1">
                                    <div class="col-md-2 text-center">
                                        <h5>bookId</h5>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h5>nameId</h5>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h5>bookState</h5>
                                    </div>
                                    
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                <div class="row overflow-y-scroll text-center mt-2 border" style="height:400px">
                                    <?php foreach ($ketqua as $book) : ?>

                                        <div class="col-md-2 ">
                                            <p><?= $book['bookId'] ?></p>
                                        </div>
                                        <div class="col-md-2 ">
                                            <p><?= $book['nameId'] ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><?= $book['bookState'] ?></p>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <form method="POST" onsubmit="return confirmDelete();">
                                                <input type="submit" name="delete_book" class="" value="Xóa"><input type="hidden" name="id_book" value="<?= $book['bookId'] ?>">
                                                <a href="fix_csdl/fix_book.php?id=<?= $book['bookId'] ?>"><input type="button" value="Sửa"></a>
                                            </form>
                                        </div>

                                    <?php endforeach ?>
                                </div>
                            </form>
                        </div>

                        <div id="bookname_info">
                            <form class="form-horizontal ">
                                <div class="row mt-1">
                                    <div class="col-md-1 text-center">
                                        <h5>name</h5>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <h5>typeId</h5>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <h5>author</h5>
                                    </div>
                                    <div class="col-md-2 text-center overflow-x-hidden" style="width:140px">
                                        <h5>publishingCompany</h5>
                                    </div>
                                    <div class="col-md-2 text-center" style="padding-left:40px;">
                                        <h5>shortIntro</h5>
                                    </div>
                                    <div class="col-md-2 text-center" style="padding-left:40px;">
                                        <h5>shortContent</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>coverImg</h5>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="row overflow-y-scroll text-center border mt-2" style="height:400px">
                                    <?php foreach ($ketqua1 as $bookname) : ?>

                                        <div class="col-md-1">
                                            <p><?= $bookname['name'] ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><?= $bookname['typeId'] ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><?= $bookname['author'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><?= $bookname['publishingCompany'] ?></p>
                                        </div>
                                        <div class="col-md-2 overflow-y-hidden" style="height:100px">
                                            <p><?= $bookname['shortIntro'] ?></p>
                                        </div>
                                        <div class="col-md-2 overflow-y-hidden" style="height:100px">
                                            <p><?= $bookname['shortContent'] ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><img class="img-fluid" src="<?= $bookname['coverImg'] ?>"></p>
                                        </div>
                                        <div class="col-md-2">
                                            <form method="POST" onsubmit="return confirmDelete();">
                                                <input type="submit" name="delete_bookname" class="" value="Xóa"><input type="hidden" name="id_bookname" value="<?= $bookname['nameId'] ?>">
                                                <a href="fix_csdl/fix_bookname.php?id=<?= $bookname['nameId'] ?>"><input type="button" value="Sửa"></a>
                                            </form>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </form>
                        </div>

                        <div id="booktype_info">
                            <form class="form-horizontal ">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <h5>typeId</h5>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h5>name</h5>
                                    </div>
                                    <div class="col-md-6 text-center" style="padding-right:35px">
                                        <h5>decription</h5>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                                <div class="row overflow-y-scroll text-center border mt-2" style="height:400px">
                                    <?php foreach ($ketqua2 as $booktype) : ?>
                                        <div class="col-md-2">
                                            <p><?= $booktype['typeId'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><?= $booktype['name'] ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?= $booktype['decription'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <form method="POST" onsubmit="return confirmDelete();">
                                                <input type="submit" name="delete_booktype" class="" value="Xóa"><input type="hidden" name="id_booktype" value="<?= $booktype['typeId'] ?>">
                                                <a href="fix_csdl/fix_booktype.php?id=<?= $booktype['typeId'] ?>"><input type="button" value="Sửa"></a>
                                            </form>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </form>
                        </div>

                        <div id="borrowcard_info">
                            <form class="form-horizontal ">
                                <div class="row">
                                    <div class="col-md-1 text-center">
                                        <h5>cardId </h5>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <h5>bookId </h5>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <h5>userId </h5>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h5>borrowDate</h5>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h5>deadLine</h5>
                                    </div>
                                    <div class="col-md-1 ">
                                        <h5>form</h5>
                                    </div>
                                    <div class="col-md-2" style="padding-left: 40px;">
                                        <h5>state</h5>
                                    </div>
                                    <div class="col-md-2 text-center">

                                    </div>
                                </div>
                                <div class="row overflow-y-scroll text-center border mt-2" style="height:400px">
                                    <?php foreach ($ketqua3 as $borrowcard) : ?>
                                        <div class="col-md-1">
                                            <p><?= $borrowcard['cardId'] ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><?= $borrowcard['bookId'] ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><?= $borrowcard['userId'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><?= $borrowcard['borrowDate'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><?= $borrowcard['deadLine'] ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><?= $borrowcard['form'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><?= $borrowcard['state'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <form method="POST" onsubmit="return confirmDelete();">
                                                <input type="submit" name="delete_borrowcard" class="" value="Xóa"><input type="hidden" name="id_borrowcard" value="<?= $borrowcard['cardId'] ?>">
                                                <a href="fix_csdl/fix_borrowcard.php?id=<?= $borrowcard['cardId'] ?>"><input type="button" value="Sửa"></a>
                                            </form>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </form>
                        </div>

                        <div id="user_info">
                            <form class="form-horizontal ">
                                <div class="row">
                                    <div class="col-md-1 text-center">
                                        <h5>phone</h5>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h5>address</h5>
                                    </div>
                                    <div class="col-md-2 text-center" style="width:160px">
                                        <h5>intro</h5>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <h5>avatar</h5>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <h5>balance</h5>
                                    </div>
                                    <div class="col-md-1">
                                        <h5>payInfo</h5>
                                    </div>
                                    <div class="col-md-1 overflow-x-hidden" style="width:85px">
                                        <h5>userName</h5>
                                    </div>
                                    <div class="col-md-1">
                                        <h5>role</h5>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                                <div class="row overflow-y-scroll text-center border mt-2" style="height:400px">
                                    <?php foreach ($ketqua4 as $user) : ?>
                                        <div class="col-md-1">
                                            <p><?= $user['phone'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><?= $user['address'] ?></p>
                                        </div>
                                        <div class="col-md-2 overflow-y-hidden" style="height:100px">
                                            <p><?= $user['intro'] ?></p>
                                        </div>
                                        <div class="col-md-1 ">
                                            <p><img class="img-fluid" src="<?= $user['avatar'] ?>"></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><?= $user['balance'] ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><?= $user['payInfo'] ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><?= $user['userName'] ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p><?= $user['role'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <form method="POST" onsubmit="return confirmDelete();">
                                                <input type="submit" name="delete_user" class="" value="Xóa"><input type="hidden" name="id_user" value="<?= $user['userId'] ?>">
                                                <a href="fix_csdl/fix_user.php?id=<?= $user['userId'] ?>"><input type="button" value="Sửa"></a>
                                            </form>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </form>
                        </div>
                    </div>


                    <script>
                        $(document).ready(function() {
                            showSection("book_info");
                        });

                        function showSection(sectionId) {
                            $("[id$=_info]").attr("hidden", true);
                            $("#" + sectionId).attr("hidden", false);
                        }
                        $("#book_info_tbl").click(function() {
                            showSection("book_info");
                        });
                        $("#bookname_info_tbl").click(function() {
                            showSection("bookname_info");
                        });
                        $("#booktype_info_tbl").click(function() {
                            showSection("booktype_info");
                        });
                        $("#borrowcard_info_tbl").click(function() {
                            showSection("borrowcard_info");
                        });
                        $("#user_info_tbl").click(function() {
                            showSection("user_info");
                        });
                    </script>
                    <script>
                        function confirmDelete() {
                            return confirm("Bạn có chắc chắn muốn xóa?");
                        }
                    </script>
        </main>
        
    </body>

    </html>
<?php endif ?>
<?php if (!isset($_SESSION["userName"])) : ?>
    <main>
        <h1>Bạn chưa đăng nhập! <a href="login-register.php">Đăng nhập ngay</a></h1>
        <h1>Quay lại <a href="index.php?view=indexmain">Trang chủ</a></h1>
    </main>
<?php endif; ?>