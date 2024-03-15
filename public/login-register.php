<?php
    session_start();
    include("../src/model/loadclass.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Đăng ký</title>
    <script>
        validRegister = new Array(4);
        validRegister[0] = "ER"; //user name
        validRegister[1] = "ER"; //phone
        validRegister[2] = "ER"; //pass
        validRegister[3] = "ER"; //repass
        validRegisterDec =new Array(4);
        validRegisterDec[0] = "none"; //user name
        validRegisterDec[1] = "none"; //phone
        validRegisterDec[2] = "none"; //pass
        validRegisterDec[3] = "none"; //repass
        validLoginDec = new Array(2);
        validLoginDec[0] = "ERR";
        validLoginDec[1] = "ERR";
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b265370c1b.js" crossorigin="anonymous"></script>
</head>

   
          
    <div class="py-4 text-center h5">
        <a class="login link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Đăng nhập</a>
        <a class="register ms-2 link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Đăng ký</a>
    </div>
    <div class="col-md-4 offset-md-4">
        <div class="text-star">
            <a href="index.php?view=indexmain">Ghé qua trang chủ</a>
        </div>

        <div class="dangnhap border" >
            <div class="card">
                <div class="card-header text-center position-relative" style="background-color:deepskyblue">

                    <h3>Đăng nhập</h3>
                </div>
                <div class="card-body" style="background-color:aliceblue">
                    <form id="loginForm" method="POST" class="form-horizontal" action="index.php?view=indexmain" >

                        <div class="mb-3">
                            <label for="" class="form-label"><i class="fa-solid fa-user text-success"></i>Tên tài khoản</label>
                            <input type="text" class="form-control" id="userNameLogin" name="tenTK" onkeyup="findUserName(this.value)">
                            <span id="findUserName"></span>
                        </div>



                        <div class="mb-3">
                            <label for="" class="form-label"><i class="fa-solid fa-lock text-success"></i>Mật khẩu</label>
                            <input type="password" id="passLogin" class="form-control" name="matKhau">
                        </div>

                        <div class="d-grid">
                            <span id="checkLogin"></span>
                            <button type="Button" class="btn btn-outline-info" name="dangnhap" onclick="checkLogin()">Đăng nhập</button>          
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="dangky border" style="background-color:aliceblue">
            <div class="card">
                <div class="card-header text-center position-relative" style="background-color:deepskyblue">

                    <h3>Đăng ký</h3>
                </div>
                <div class="card-body" style="background-color:aliceblue">
                    <form id="signupForm" method="POST" class="form-horizontal" action="ajax/registersm.php" autocomplete="off">

                        <div class="mb-3">
                            <label for="" class="form-label"><i class="fa-solid fa-user text-success"></i>Tên tài khoản</label>
                            <input type="text" class="form-control" name="tenTK" onkeyup="checkUS(this.value)">
                            <span id="checkUserName"></span>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label"><i class="fa-solid fa-mobile-screen-button text-success"></i>Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" onkeyup="checkPhone(this.value)">
                            <span id="checkPhone"></span>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label"><i class="fa-solid fa-lock text-success"></i>Mật khẩu</label>
                            <input type="password" class="form-control" name="matKhau" id="passRegInput" onkeyup="validPass(this.value)">
                            <span id="validPass"></span>
                        </div>

                        <div class="mb-3">
                            <label for=""><i class="fa-solid fa-lock text-success"></i>Nhập lại mật khẩu</label>
                            <input type="password" id="confirm_password" name="nhaplaiMatkhau"
                                class="form-control" required>
                            <span id="matchPass"></span>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-outline-info" name="dangky" id="dangkyBtn">Đăng ký</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        jQuery.validator.addMethod("exactlength", function(value, element, param) {
            return this.optional(element) || value.length == param;
        });
        jQuery.validator.addMethod( "notExistsUserName", function(value, element){
            return this.optional(element) || (validRegisterDec[0] != "User name đã tồn tại!");
        }, "Hãy nhập username khác!")
        jQuery.validator.addMethod( "notExistsPhone", function(value, element){
            return this.optional(element) || (validRegisterDec[1] != "Số điện thoại này đã tồn tại!");
        }, "Hãy nhập số điện thoại khác!")
        jQuery.validator.addMethod("existsUserName", function(value, element){
            return this.optional(element) || (validLoginDec[0] == "OK");
        }, "Kiểm tra lại username của bạn!");
        $(document).ready(function() {
            $('#signupForm').validate({
                rules: {
                    tenTK: {
                        required: true,
                        minlength: 5,
                        notExistsUserName: true
                    },
                    sdt: {
                        required: true,
                        exactlength: 10,
                        notExistsPhone: true
                    },
                    matKhau: {
                        required: true,
                        minlength: 5,
                    },
                    nhaplaiMatkhau: {
                        required: true,
                        equalTo: "#passRegInput"
                    }
                },
                messages: {
                    tenTK: {
                        required: 'Bạn chưa nhập tên',
                        minlength: 'Tên phải có ít nhất 5 ký tự'
                    },
                    sdt: {
                        required: 'Bạn chưa nhập số điện thoại',
                        exactlength: 'Số diện thoại có 10 ký tự'
                    },
                    matKhau: {
                        required: 'Bạn chưa nhập mật khẩu',
                        minlength: 'Mật khẩu phải có ít nhất 5 ký tự'
                    },
                    nhaplaiMatkhau: {
                        required: 'Bạn chưa xác nhận mật khẩu',
                        equalTo: 'Mật khẩu không khớp'
                    }
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    if (element.prop('type') === 'checkbox') {
                        error.insertAfter(element.siblings('label'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element)
                        .addClass('is-invalid')
                        .removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element)
                        .addClass('is-valid')
                        .removeClass('is-invalid');
                },
            });
        });

        $(document).ready(function() {
            $('#loginForm').validate({
                rules: {
                    tenTK: {
                        required: true,
                        minlength: 5,
                        existsUserName: true
                    },
                    matKhau: {
                        required: true
                    },
                },
                messages: {
                    tenTK: {
                        required: 'Bạn chưa nhập tên',
                        minlength: 'Tên phải có ít nhất 5 ký tự'
                    },
                    matKhau: {
                        required: 'Bạn chưa nhập mật khẩu',
                    },
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    if (element.prop('type') === 'checkbox') {
                        error.insertAfter(element.siblings('label'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element)
                        .addClass('is-invalid')
                        .removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element)
                        .addClass('is-valid')
                        .removeClass('is-invalid');
                },
            });
        });
    </script>
    <script>
        function findUserName(str){
            if (str.length == 0) {
                validLoginDec[0] = "ER";
                document.getElementById("findUserName").innerHTML = "Vui lòng nhập vào trường này!";
                return;
            }else {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    let response = this.responseText;
                    
                    if (response == "User name đã tồn tại!###ER"){
                        document.getElementById("findUserName").innerHTML = "OK";
                        validLoginDec[0] = "OK";
                    }
                    else {
                        validLoginDec[0] = "ER";
                        document.getElementById("findUserName").innerHTML = "Chúng tôi không tìm thấy user name của bạn <button type=\"button\" onclick=\"changeViewToRegister()\">Đăng ký</button>";
                    }
                }
                xmlhttp.open("GET","ajax/checkUserName.php?q=" + str);
                xmlhttp.send();
            }
        }
        
        function checkLogin(){
            if (validLoginDec[0] != "ER"){
                pass =document.getElementById("passLogin").value;
                username = document.getElementById("userNameLogin").value;
                document.getElementById("checkLogin").innerHTML = "Đang xử lý..."
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    let response = this.responseText;
                    console.log(response);
                    if (response == "OK"){
                        document.getElementById("loginForm").submit();
                    }
                    else {
                        console.log(response);
                        document.getElementById("checkLogin").innerHTML = "Mật khẩu hoặc tài khoản sai!"
                    }
                }
                encodePass = btoa(pass);
                xmlhttp.open("GET", "ajax/checkLogin.php?username=" + username + "&encodePass=" + encodePass);
                xmlhttp.send();
            }
            else {
               document.getElementById("checkLogin").innerHTML = "Vui lòng kiểm tra thông tin đăng nhập."; 
            }         
        }
        function checkUS(str) {
            if (str.length == 0) {
                document.getElementById("checkUserName").innerHTML = "Vui lòng nhập vào trường này!";
                return;
            } else {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    let response = this.responseText;
                    let valid = response.split("###");
                    validRegisterDec[0] =valid[0];
                    validRegister[0] = valid[1];
                    document.getElementById("checkUserName").innerHTML = valid[0];
                }
                xmlhttp.open("GET", "ajax/checkUserName.php?q=" + str);
                xmlhttp.send();
            }
        };
        function checkPhone(str){
            if (str.length == 0) {;
                document.getElementById("checkPhone").innerHTML = "Vui lòng nhập vào trường này!";
                return;
            }else{
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    let response = this.responseText;
                    let valid = response.split("###");
                    validRegisterDec[1] = valid[0];
                    validRegister[1] = valid[1];
                    document.getElementById("checkPhone").innerHTML = valid[0];
                }
                xmlhttp.open("GET", "ajax/checkPhone.php?q=" + str);
                xmlhttp.send();
            }
        };
        function validPass(str){
            if (str.length == 0){
                document.getElementById("validPass").innerHTML = "Vui lòng nhập vào trường này!";
                return;
            }
            else if(str.length < 5) {
                document.getElementById("validPass").innerHTML = "Mật khẩu quá ngắn!";
                return;
            }
            else if(str.length >= 5){
                document.getElementById("validPass").innerHTML = "Mật khẩu hợp lệ!";
            }
        };
        function matchPass(str){
            if (str.length == 0){
                document.getElementById("matchPass").innerHTML = "Vui lòng nhập vào trường này!";
                return;
            }else if (document.getElementById("passRegInput").value != str){
                document.getElementById("matchPass").innerHTML = "Mật khẩu bạn xác nhận không chính xác!";
                return;
            }else if (document.getElementById("passRegInput").value == str){
                document.getElementById("matchPass").innerHTML = "Bạn đã xác nhận đúng mật khẩu!";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        let dangky = document.querySelector(".register");
        let dangnhap = document.querySelector(".login");
        let noidungdky = document.querySelector(".dangky");
        noidungdky.style.display = "none";
        dangnhap.addEventListener("click", function() {
            let noidungdky = document.querySelector(".dangky");
            let noidungdnhap = document.querySelector(".dangnhap");
            noidungdky.style.display = "none";
            noidungdnhap.style.display = "block";
        });
        dangky.addEventListener("click", function() {
            let noidungdky = document.querySelector(".dangky");
            let noidungdnhap = document.querySelector(".dangnhap");
            noidungdky.style.display = "block";
            noidungdnhap.style.display = "none";
        });
        function changeViewToRegister(){
            let noidungdky = document.querySelector(".dangky");
            let noidungdnhap = document.querySelector(".dangnhap");
            noidungdky.style.display = "block";
            noidungdnhap.style.display = "none";
        }
    </script>
</body>
</html>