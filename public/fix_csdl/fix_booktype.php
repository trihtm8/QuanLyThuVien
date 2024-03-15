<?php
session_start();
include('../../prepare/src/dbconnect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM booktype WHERE typeId = ?";
$ketqua = $conn->prepare($sql);
$ketqua->execute([$id]);
$ketqua = $ketqua->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['fix_booktype'])) {
    $name = $_POST['name'];
    $decription     = $_POST['decription'];
    $sql = "CALL change_booktype( '$id','$name','$decription')";
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
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" id="" name="name" value="<?= htmlspecialchars($ketqua['name']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Decription</label>
                                <input type="text" class="form-control" id="" name="decription" value="<?= htmlspecialchars($ketqua['decription']) ?>">
                            </div>

                            <div class="">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-outline-info" name="fix_booktype" value="Sửa" />
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