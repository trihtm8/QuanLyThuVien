<?php
session_start();
include('../../prepare/src/dbconnect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM book WHERE bookId = ?";
$kq = $conn->prepare($sql);
$kq->execute([$id]);
$ketqua = $kq->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['fix_book'])) {
    $bookState = $_POST['bookState'];
    $sql = "CALL change_book( '$id', '$bookState','abc')";
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

                            <div class="mb-3">
                                <label for="" class="form-label">BookState</label>
                                <input type="text" class="form-control" id="" name="bookState" value="<?= htmlspecialchars($ketqua['bookState']) ?>">
                            </div>

                            <div class="">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-outline-info" name="fix_book" value="Sửa" />
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