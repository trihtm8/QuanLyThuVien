<?php
session_start();
include('../../prepare/src/dbconnect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE userId =?";
$ketqua = $conn->prepare($sql);
$ketqua->execute([$id]);
$ketqua = $ketqua->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['fix_user'])) {
    $password = $_POST['password'];
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $intro = $_POST['intro'];
    
    $balance = $_POST['balance'];
    $payInfo = $_POST['payInfo'];
    $userName = $_POST['userName'];
    $role = $_POST['role'];
    $sql = "CALL change_user( '$id','$password','$fullName', '$phone', '$address', '$intro', '/img/defavatar.webp', '$balance', '$payInfo', '$userName', '$role')";
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
                                <label for="" class="form-label">Password</label>
                                <input type="text" class="form-control" id="" name="password" value="<?= htmlspecialchars($ketqua['password']) ?>">
                            </div>

                            <!-- Tên công ty -->
                            <div class="mb-3">
                                <label for="" class="form-label">FullName</label>
                                <input type="text" class="form-control" id="" name="fullName" value="<?= htmlspecialchars($ketqua['fullName']) ?>">
                            </div>

                            <!-- Địa chỉ -->
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="" name="phone" value="<?= htmlspecialchars($ketqua['phone']) ?>">
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" class="form-control" id="" name="address" value="<?= htmlspecialchars($ketqua['address']) ?>">
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Intro</label>
                                <input type="text" class="form-control" id="" name="intro" value="<?= htmlspecialchars($ketqua['intro']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Avatar</label>
                                <input type="text" class="form-control" id="" name="avatar" value="<?= htmlspecialchars($ketqua['avatar']) ?>">
                                <input type="file" class="form-control" id="" name="avatar">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Balance</label>
                                <input type="text" class="form-control" id="" name="balance" value="<?= htmlspecialchars($ketqua['balance']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">PayInfo</label>
                                <input type="text" class="form-control" id="" name="payInfo" value="<?= htmlspecialchars($ketqua['payInfo']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">UserName</label>
                                <input type="text" class="form-control" id="" name="userName" value="<?= htmlspecialchars($ketqua['userName']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Role</label>
                                <input type="text" class="form-control" id="" name="role" value="<?= htmlspecialchars($ketqua['role']) ?>">
                            </div>

                            <div class="">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-outline-info" name="fix_user" value="Sửa" />
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