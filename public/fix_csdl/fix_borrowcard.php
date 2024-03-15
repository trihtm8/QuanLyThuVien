<?php
session_start();
include('../../prepare/src/dbconnect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM borrowcard WHERE cardId = ?";
$ketqua = $conn->prepare($sql);
$ketqua->execute([$id]);
$ketqua = $ketqua->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['fix_borrowcard'])) {
    $bookId  = $_POST['bookId '];
    $userId  = $_POST['userId '];
    $borrowDate = $_POST['borrowDate'];
    $deadLine = $_POST['deadLine'];
    $form = $_POST['form'];
    $state = $_POST['state'];
    $coverImg = $_POST['coverImg'];
    $sql = "CALL change_borrowcard( '$id','$bookId','$userId', '$borrowDate', '$deadLine', '$form', '$state', '$coverImg')";
    $ketqua = $conn->prepare($sql);
    $ketqua->execute();
    header("Location:../csdl.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng thông tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.min.css
" rel="stylesheet">
</head>

<body>
    <div class="">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">

                <div class="card mt-3">
                    <div class="card-header text-center" style="background-color:deepskyblue">
                        <h3>Chỉnh sửa</h3>
                    </div>

                    <div class="card-body" style="background-color:aliceblue">
                        <form id="signupForm" method="POST" class="form-horizontal" action="" onsubmit="return confirmFix();">

                            <!-- Vị trí cần tuyển -->
                            <div class="mb-3">
                                <label for="" class="form-label">BookId</label>
                                <input type="text" class="form-control" id="" name="bookId" value="<?= htmlspecialchars($ketqua['bookId']) ?>">
                            </div>

                            <!-- Tên công ty -->
                            <div class="mb-3">
                                <label for="" class="form-label">UserId</label>
                                <input type="text" class="form-control" id="" name="userId" value="<?= htmlspecialchars($ketqua['userId']) ?>">
                            </div>

                            <!-- Địa chỉ -->
                            <div class="mb-3">
                                <label for="" class="form-label">BorrowDate</label>
                                <input type="text" class="form-control" id="" name="borrowDate" value="<?= htmlspecialchars($ketqua['borrowDate']) ?>">
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">DeadLine</label>
                                <input type="text" class="form-control" id="" name="deadLine" value="<?= htmlspecialchars($ketqua['deadLine']) ?>">
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Form</label>
                                <input type="text" class="form-control" id="" name="form" value="<?= htmlspecialchars($ketqua['form']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">State</label>
                                <input type="text" class="form-control" id="" name="state" value="<?= htmlspecialchars($ketqua['state']) ?>">
                            </div>

                            <div class="">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-outline-info" name="fix_borrowcard" value="Sửa" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmFix() {
            return confirm("Bạn có chắc chắn muốn thay đổi?");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>