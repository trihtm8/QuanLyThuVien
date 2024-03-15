<?php
use CT275_project\Borrowcard;
?>
<?php if(isset($_SESSION["userName"])): ?>
    <main>
        <style>
            #sidebar, #sidemain {
                border-style: double;
                height: 550px;
                text-align: center;
            }
            #sidemain{
                text-align: left;
            }
            #sidebar button{
                width: 300px;
                height: 40px;
            }
        </style>
        <script>
            function submitForm(formId){
                document.getElementById(formId).submit()
            }
        </script>
        <div class="container-fluid" style="padding: 20px;">
            <div class="row" style="height: 580px;">
                <div class="col-sm-3" id="sidebar">
                    <hr>
                    <h2>Trang cá nhân</h2>
                    <hr>
                    <button id="personal_info_btn">Thông tin cá nhân</button>
                    <hr>
                    <button id="borrowed_forms_btn">Sách đã mượn</button>
                    <hr>
                    <button id="account_info_btn">Thông tin tài khoản</button>
                    <hr>
                    <p><?=htmlspecialchars($user->balance)?></p>
                    <div id="addBalanceModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3>Nạp bao nhiêu?</h3>
                                </div>
                                <div class="modal-body">
                                    <form id="addBalanceForm" action="ajax/updateUser.php" method="post">
                                        <input type="number" name="addBalance">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="button" onclick="submitForm('addBalanceForm')">Upload</button>
                                    <button type="button" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" data-toggle="modal" data-target="#addBalanceModal">Nạp tài khoản</button>
                    <hr>
                </div>
                <div class="col-sm-9" id="sidemain">
                    <hr>
                    <div id="user_header" class="row">
                        <div class="col-sm-2 text-center">
                            <img src="<?=htmlspecialchars($user->avatar)?>" alt="Ảnh đại diện trên trang cá nhân" class="img-circle" style="height: 100px;">
                            <button style="margin-top: 5px;" type="button" data-toggle="modal" data-target="#coverImgModal">Thay đổi ảnh đại diện</button>
                        </div>
                        <div id="coverImgModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3>Upload ảnh đại diện</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form id="changeCoverImgForm" action="ajax/uploadAvatar.php" method="post" enctype="multipart/form-data">
                                            <input type="file" name="changeAvatar" id="changeCoverImg" accept="image/*">
                                            <input type="text" name="avtsubmit" value="avtsubmit" hidden>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="button" onclick="submitForm('changeCoverImgForm')">Upload</button>
                                        <button type="button" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 ">
                            <div style="height: 80px; overflow-y: auto; overflow-x: hidden;">
                                <p><?=htmlspecialchars($user->intro)?>
                                </p>
                                <div id="userIntroModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h3>Thay đổi user intro</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form id="changeUserIntroForm" action="ajax/updateUser.php" method="post">
                                                    <input type="text" name="changeTarget" value="intro" hidden>
                                                    <textarea name="changeValue" id="changeUserIntro" cols="70" rows="10"></textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="button" onclick="submitForm('changeUserIntroForm')">Upload</button>
                                                <button type="button" data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="userNameModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3>Thay đổi user name</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form id="changeUserNameForm" action="ajax/updateUser.php" method="post">
                                                <label for="changeUserName">Nhập user name mới</label>
                                                <input type="text" name="changeValue" id="changeUserName" required onkeyup="checkUS(this.value)">
                                                <span id="checkUserName"></span>
                                                <input type="text" name="changeTarget" value="userName" hidden>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="button" onclick="submitForm('changeUserNameForm')" id="changeUSSubmit">Upload</button>
                                            <button type="button" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2><?=htmlspecialchars($user->userName)?> <button type="button" data-toggle="modal" data-target="#userNameModal"><i class="fa-solid fa-pen-nib"></i></button></h2>
                        </div>
                        <div class="col-sm-2 text-center">
                            <button style="scale: 150%;" type="button" data-toggle="modal" data-target="#userIntroModal"><i class="fa-solid fa-pen-nib"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div id="personal_info" hidden>
                        <div class="form-horizontal">
                            <div class="row form-group">
                                <label class="control-label col-sm-2" for="Hoten">Họ tên:</label>
                                <div class="col-sm-8">
                                    <form action="ajax/updateUser.php" id="Hoten" method="post">
                                        <input type="text" class="form-control" value="<?=htmlspecialchars($user->fullName)?>" name="changeValue">
                                        <input type="text" name="changeTarget" value="fullName" hidden>
                                    </form>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" onclick="submitForm('Hoten')"><i class="fa-solid fa-check"></i></button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-sm-2" for="SDT">Số điện thoại:</label>
                                <div class="col-sm-8">
                                    <form action="ajax/updateUser.php" id="sdt" method="post">
                                        <input type="text" class="form-control" value="<?=htmlspecialchars($user->phone)?>" name="changeValue" onkeyup="checkPhone(this.value)">
                                        <span id="checkPhone"></span>
                                        <input type="text" name="changeTarget" value="phone" hidden>
                                    </form>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" onclick="submitForm('sdt')" id="changePhoneSubmit"><i class="fa-solid fa-check"></i></button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-sm-2" for="diaChi">Địa chỉ:</label>
                                <div class="col-sm-8">
                                    <form action="ajax/updateUser.php" id="diachi" method="post">
                                        <input type="text" class="form-control" value="<?=htmlspecialchars($user->address)?>" name="changeValue">
                                        <input type="text" name="changeTarget" value="address" hidden>
                                    </form>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" onclick="submitForm('diachi')"><i class="fa-solid fa-check"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="changePassModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3>Đổi mật khẩu</h3>
                                </div>
                                <div class="modal-body">
                                    <form id="changePassForm" action="ajax/updateUser.php" method="post">
                                        <label for="oldpass">Mật khẩu cũ</label>
                                        <input type="password" id="oldpass" name="oldpass">
                                        <br>
                                        <label for="newpass">Mật khẩu mới</label>
                                        <input type="password" id="newpass" name="newpass" onkeyup="validPass(this.value)">
                                        <span id="checkpass"></span>
                                        <br>
                                        <input type="text" id="changePass" name="changePass" value="yes" hidden>
                                        <button type="submit" id="changePassSubmit">Upload</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="account_info" hidden>
                        <div class="form-horizontal">
                            <div class="row form-group">
                                <label class="control-label col-sm-2" for="username">Username:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="username" value="<?=htmlspecialchars($user->userName)?>" disabled>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" data-toggle="modal" data-target="#userNameModal"><i class="fa-solid fa-pen-nib"></i></button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-sm-2" for="password">Mật khẩu:</label>
                                <div class="col-sm-2">
                                    <input type="password" value="" disabled>
                                </div>
                                <div class="col-sm-8">
                                    <button type="button" data-toggle="modal" data-target="#changePassModal">Đổi mật khẩu</button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-sm-2" for="deleteuser">Tài khoản:</label>
                                <div class="col-sm-10">
                                    <button type="button" onclick="alerthere('Chưa khả dụng!')">Xóa tài khoản</button>
                                </div>
                            </div>
                            <script>
                                function alerthere(str){
                                    alert(str);
                                    return false;
                                }
                            </script>
                            <hr>
                            <hr>
                            <div class="row form-group">
                                <label class="control-label col-sm-2" for="bankinfo">Thông tin ngân hàng:</label>
                                <div class="col-sm-8">
                                    <form action="ajax/updateUser.php" id="bankinfo" method="post">
                                        <input type="text" class="form-control" value="<?=htmlspecialchars($user->payInfo)?>" name="changeValue">
                                        <input type="text" name="changeTarget" value="payInfo" hidden>
                                    </form>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" onclick="submitForm('bankinfo')"><i class="fa-solid fa-check"></i></button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <style>
                        .table-container {
                            height: 230px;
                        }
                        table {
                            display: flex;
                            flex-flow: column;
                            height: 100%;
                            width: 100%;
                        }
                        table thead {
                            /* head takes the height it requires, 
                            and it's not scaled when table is resized */
                            flex: 0 0 auto;
                            width: calc(100% - 1.2em);
                        }
                        table tbody {
                            /* body takes all the remaining available space */
                            flex: 1 1 auto;
                            display: block;
                            overflow-y: scroll;
                        }
                        table tbody tr {
                            width: 100%;
                        }
                        table thead,
                        table tbody tr {
                            display: table;
                            table-layout: fixed;
                        }
                    </style>
                    <div id="borrowed_forms" hidden>
                        <table class="table table-container">
                            <thead>
                                <tr>
                                    <th>Mã form</th>
                                    <th>Ngày mượn</th>
                                    <th>Đến hẹn</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Phí trễ</th>
                                    <th>Trả</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $createbrc = new Borrowcard(-1);
                                $borrowcards = $createbrc->getAll();
                                $forms = Borrowcard::groupbyForm($borrowcards);
                                ?>
                                <?php foreach($forms as $form => $brcs): ?>
                                <tr>
                                    <td><div style="display: block; overflow-x: auto; width: 100px"><?=htmlspecialchars($form)?></div></td>
                                    <td><?=htmlspecialchars($brcs[0]->borrowDate)?></td>
                                    <td><?=htmlspecialchars($brcs[0]->deadLine)?></td>
                                    <td><?=htmlspecialchars(count($brcs))?></td>
                                    <td>đã trả: <?=htmlspecialchars(count(Borrowcard::isReleased($brcs)))?>/<?=htmlspecialchars(count($brcs))?></td>
                                    <td>Đang tính toán</td>
                                    <td><form action="ajax/release.php" method="get">
                                        <button type="submit" name="release" value="<?=htmlspecialchars($form)?>"
                                        <?php
                                        if(count(Borrowcard::isReleased($brcs))==count($brcs)){
                                            echo 'disabled';
                                        }
                                        ?>>Trả</button>
                                    </form></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3"><button style="width: 300px; height: 40px;">Tổng hợp</button></div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function(){
                            $("#personal_info").attr("hidden", false);
                        });
                        $("#personal_info_btn").click(function(){
                            $("#personal_info").attr("hidden", false);
                            $("#borrowed_forms").attr("hidden", true);
                            $("#account_info").attr("hidden", true);
                        });
                        $("#borrowed_forms_btn").click(function(){
                            $("#personal_info").attr("hidden", true);
                            $("#borrowed_forms").attr("hidden", false);
                            $("#account_info").attr("hidden", true);
                        })
                        $("#account_info_btn").click(function(){
                            $("#personal_info").attr("hidden", true);
                            $("#borrowed_forms").attr("hidden", true);
                            $("#account_info").attr("hidden", false);
                        })
                    </script>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#changePassSubmit").attr("disabled", true);
                $("#changeUSSubmit").attr("disabled", true);
            })
            function validPass(str){
                jQuery("#changePassSubmit").attr("disabled", true);
                if (str.length == 0){
                    document.getElementById("checkpass").innerHTML = "Vui lòng nhập vào trường này!";
                    return;
                }
                else if(str.length < 5) {
                    document.getElementById("checkpass").innerHTML = "Mật khẩu quá ngắn!";
                    return;
                }
                else if(str.length >= 5){
                    document.getElementById("checkpass").innerHTML = "Mật khẩu hợp lệ!";
                    jQuery("#changePassSubmit").attr("disabled", false);
                }
            }
            function checkUS(str) {
                $("#changeUSSubmit").attr("disabled", true);
                document.getElementById("checkUserName").innerHTML = "Đang kiểm tra!";
                if (str.length == 0) {
                    document.getElementById("checkUserName").innerHTML = "Vui lòng nhập vào trường này!";
                    return;
                } else {
                    const xmlhttp = new XMLHttpRequest();
                    xmlhttp.onload = function() {
                        let response = this.responseText;
                        let valid = response.split("###");
                        document.getElementById("checkUserName").innerHTML = valid[0];
                        if(valid[1]=="OK"){
                            $("#changeUSSubmit").attr("disabled", false);
                        }
                    }
                    xmlhttp.open("GET", "ajax/checkUserName.php?q=" + str);
                    xmlhttp.send();
                }
            };
            function checkPhone(str){
                $("#changePhoneSubmit").attr("disabled", true);
                if (str.length == 0) {;
                    document.getElementById("checkPhone").innerHTML = "Vui lòng nhập vào trường này!";
                    return;
                }else{
                    const xmlhttp = new XMLHttpRequest();
                    xmlhttp.onload = function() {
                        let response = this.responseText;
                        let valid = response.split("###");
                        document.getElementById("checkPhone").innerHTML = valid[0];
                        if(valid[1]=="OK"){
                            $("#changePhoneSubmit").attr("disabled", false);
                        }
                    }
                    xmlhttp.open("GET", "ajax/checkPhone.php?q=" + str);
                    xmlhttp.send();
                }
            };
        </script>
    </main>
<?php endif ?>
<?php if(!isset($_SESSION["userName"])): ?>
    <main>
        <h1>Bạn chưa đăng nhập! <a href="login-register.php">Đăng nhập ngay</a></h1>
        <h1>Quay lại <a href="index.php?view=indexmain">Trang chủ</a></h1>
    </main>
<?php endif; ?>
