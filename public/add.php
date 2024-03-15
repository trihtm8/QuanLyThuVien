<?php if(isset($_SESSION["userName"])): ?>
<?php
session_start();
include('../prepare/src/dbconnect.php');

if (isset($_POST['addbook'])) {
    $name = $_POST['name'];
    $typeId = $_POST['typeId'];
    $author = $_POST['author'];
    $publishingCompany = $_POST['publishingCompany'];
    $shortIntro = $_POST['shortIntro'];
    $shortContent = $_POST['shortContent'];
    $coverImg = $_POST['coverImg'];
    $sql = "INSERT INTO bookname(name, typeId, author, publishingCompany, shortIntro, shortContent, coverImg) VALUE(?,?,?,?,?,?,?)";
    $ketqua = $conn->prepare($sql);
    $ketqua->execute([$name, $typeId, $author, $publishingCompany, $shortIntro, $shortContent, $coverImg]);
    header("Location:admin.php");
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
                        <h3>Thêm sách</h3>
                    </div>

                    <div class="card-body" style="background-color:aliceblue">
                        <form id="signupForm" method="POST" class="form-horizontal" action="">

                            <!-- Vị trí cần tuyển -->
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" id="" name="name">
                            </div>

                            <!-- Tên công ty -->
                            <div class="mb-3">
                                <label for="" class="form-label">Type ID</label>
                                <input type="text" class="form-control" id="" name="typeId">
                            </div>

                            <!-- Địa chỉ -->
                            <div class="mb-3">
                                <label for="" class="form-label">Author</label>
                                <input type="text" class="form-control" id="" name="author">
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Publishing Company</label>
                                <input type="text" class="form-control" id="" name="publishingCompany">
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Short Intro</label>
                                <input type="text" class="form-control" id="" name="shortIntro">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Short Content</label>
                                <input type="text" class="form-control" id="" name="shortContent">
                            </div>

                            <div class=" mb-3">
                                <label for="" class="form-label">Cover Image</label>
                                <input type="file"  id="" name="coverImg">
                            </div>

                            <div class="">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-outline-info" name="addbook">Đăng thông tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>
<?php endif; ?>