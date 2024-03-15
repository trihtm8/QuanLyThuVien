<?php
use CT275_project\Bookname;
use CT275_project\tool\Borrow_keeper;
Borrow_keeper::init();

?>
<?php if(isset($_SESSION["isInit"]) && count($_SESSION["borrow_keeper"])>0): ?>
<main>
        <style>
            .form-horizontal .form-group{
            margin-top: 50px;
        }
        </style>
        <div class="container" style="height: 600px;">
            <div class="row">
                <div class="col-sm-5">
                    <div class="bg-primary text-center"><h3 style="padding: 5px;">Danh sách mượn</h3></div>                  
                    <div>
                        <h4>Tổng số: <?=htmlspecialchars(Borrow_keeper::sum())?></h4>
                    </div>
                    <hr>
                    <div style="overflow-x: hidden; overflow-y: auto; height: 450px;">
                    <?php foreach($_SESSION["borrow_keeper"] as $nameId=>$quanlity): ?>
                        <?php
                        $bookname = new Bookname($nameId);
                        $bookname->checkDB();
                        ?>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-sm-4">
                                <img src="<?=htmlspecialchars($bookname->getCoverImg())?>" alt="Ảnh sách kích thước nhỏ" style="width: 105px; height: 150px;">
                            </div>
                            <div class="col-sm-8">
                                <p><a href="index.php?view=book&nameId=<?=htmlspecialchars($bookname->getNameId())?>"><b><?=htmlspecialchars($bookname->getName())?></b></a></p>
                                <p>Tác giả: <a href="index.php?bookname=&author=<?=htmlspecialchars($bookname->getAuthor())?>&finding=&view=tableDB"><?=htmlspecialchars($bookname->getAuthor())?></a></p>
                                <p>Số lượng: <?=htmlspecialchars($quanlity)?></p>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach;?>
                    </div>
                </div>
                <div class="col-sm-7">
                    <h3>Mã form: <?=htmlspecialchars(Borrow_keeper::createdForm())?></h3>
                    <hr>
                    <hr>
                    <form class="form-horizontal" action="ajax/borrowsm.php" style="height: 400px;" method="get">
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="ngayMuon">Ngày mượn:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="ngayMuon" name="borrowDate" style="width: 450px;">
                            </div>
                        </div>                            
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="hanTra">Ngày hẹn trả:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="hanTra" name="deadLine" style="width: 450px;">
                            </div>
                        </div>
                        <script>
                            function getDefaultDate(){
                                var now = new Date();
                                var day = ("0" + now.getDate()).slice(-2);
                                var month = ("0" + (now.getMonth() + 1)).slice(-2);
                                var today = now.getFullYear()+"-"+(month)+"-"+(day);
                                return today;
                            }
                            Date.prototype.addDays = function(days) {
                                var date = new Date(this.valueOf());
                                date.setDate(date.getDate() + days);
                                return date;
                            }
                            function toValidString(day){
                                var dayString = day.toLocaleDateString("vi-VN");
                                var dARR = dayString.split("/");
                                returnString = dARR[2].concat("-", dARR[1].concat("-", dARR[0]));
                                return returnString;
                            }
                            $(document).ready(function(){ 
                                $("#ngayMuon").val( getDefaultDate());
                                $("#ngayMuon").attr("min", getDefaultDate());
                                $("#hanTra").val(getDefaultDate());
                                $("#hanTra").attr("min", getDefaultDate());
                            });
                            document.getElementById("ngayMuon").onchange = function(){setHanTra()};
                            function setHanTra(){
                                var ngaymuon = document.getElementById("ngayMuon");
                                var hantra = document.getElementById("hanTra");
                                hantra.value = ngaymuon.value;
                                hantra.setAttribute("min", ngaymuon.value);
                                console.log(ngaymuon.value);
                                var maxhantraTodate = new Date(ngaymuon.value);
                                maxhantraTodate = maxhantraTodate.addDays(14);
                                maxhantraTostring = toValidString(maxhantraTodate);
                                hantra.setAttribute("max", maxhantraTodate)
                            }
                        </script>                      
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label><input type="checkbox"> Đồng ý với 
                                        <a onclick="alerthere()">Quy tắc của chúng tôi</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" name="borrow">Xác nhận mượn <?=htmlspecialchars(Borrow_keeper::sum())?> quyển sách này</button>
                            </div>
                        </div>
                        <?php 
                        
                        ?>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <p>Phí mượn (được hoàn lại khi trả): <?=htmlspecialchars(Borrow_keeper::sumcost())?> đồng</p>
                                <p>Phí trễ hạn: <?=htmlspecialchars(Borrow_keeper::sumcost()/10)?> đồng/ngày</p>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <hr>
                </div>
            </div>
        </div>
        <script>
            function alerthere(){
                alert("Đang soạn thảo!");
            }
        </script>
</main>
<?php else: ?>
<main>
    <h1>Chưa có quyển sách nào được chọn!<a href="index.php?view=indexmain">Quay lại trang chủ</a></h1>
</main>
<?php endif; ?>