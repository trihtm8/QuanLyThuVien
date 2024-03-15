<?php
use CT275_project\Bookname;
use CT275_project\tool\Borrow_keeper;
if(isset($_GET["finding"])) {
    $bookname = $_GET["bookname"];
    $author = $_GET["author"];
    $booknameArr = Bookname::getByFinding($bookname, $author);
}
else{
    $bookname = "";
    $author = "";
    $booknameArr = Bookname::getByFinding($bookname, $author);
}

if (!isset($_SESSION["userId"])) {
    $_SESSION["role"] = "guest";
}
?>
<main>
    <script>
        var globalvar=Array();
    </script>
        <div class="container" style="height: 590px;">
            <div id="finder">
                <p>Kết quả tìm kiếm cho:</p>
                <form class="form-inline">
                    <div class="form-group">
                        <p>Tên sách: <input type="text" placeholder="Tên sách" name="bookname" value="<?=htmlspecialchars($bookname)?>"></p>
                    </div>
                    <div class="form-group">
                        <p>Tác giả: <input type="text" placeholder="Tên tác giả" name="author" value="<?=htmlspecialchars($author)?>"></p>
                    </div>
                    <div class="form-group">
                        <p><button type="submit" name="finding">Tìm kiếm</button>
                        <input type="text" name="view" value="tableDB" hidden></p>
                    </div>
                </form>
                <p>Tổng cộng: <input type="number" id="count_row" style="width: 50px;" value="<?=htmlspecialchars(count($booknameArr))?>" disabled></input> kết quả</p>
            </div>
            <hr>
            <hr>
            <div>
                <form class="form-inline" method="get" id="get_books">
                    <div class="form-group">
                        <p>Đã chọn: <input type="number" id="sum_books" style="width: 50px;" value="<?=htmlspecialchars(Borrow_keeper::sum())?>" disabled></input> <button type="button" onclick="borowredirect()" <?php
                        if (!isset($_SESSION["userName"])){
                            echo'data-toggle="tooltip" title="Đăng nhập để mượn!" disabled';
                        }
                        ?>>Mượn</button></p>
                    </div>
                    <div class="form-group">
                        <p><button type="button" id="reset">Xóa lựa chọn</button></p>
                    </div>
                    <div class="form-group">
                        <span id="demo"></span>
                    </div>
                </form>
                <style>
                    .table-container {
                        height: 380px;
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
                <table class="table table-container">
                    <thead>
                        <tr>
                            <th>Tên sách</th>
                            <th>Tác giả</th>
                            <th>Nhà xuất bản</th>
                            <th>Thể loại</th>
                            <th>Số lượng còn lại</th>
                            <th>Đã chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($booknameArr as $bookname):?>
                        <tr>
                            <td><?=htmlspecialchars($bookname->getName())?></td>
                            <td><?=htmlspecialchars($bookname->getAuthor())?></td>
                            <td><?=htmlspecialchars($bookname->getPublishingCompany())?></td>
                            <td><?=htmlspecialchars($bookname->getTypeName())?></td>
                            <td class="max_value"><input type="number" value="<?=htmlspecialchars($bookname->getFreeQuantity())?>" style="width: 50px;" disabled></td>
                            <td class="change_cell">
                                <input type="number" class="count_book" style="width: 50px;" disabled></input>
                                <input type="text" class="nameId" value="<?=htmlspecialchars($bookname->getNameId())?>" hidden>
                                <button class="add"><i class="fa-solid fa-caret-up"></i></button>
                                <button class="remv"><i class="fa-solid fa-caret-down"></i></button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        <script>
                            function setglobalvar(value){
                                globalvar.push(value);
                            }
                            function updateCount(nameId)
                            {
                                const xhttp = new XMLHttpRequest();
                                xhttp.onload = function() {
                                    setglobalvar(this.responseText);
                                }
                                xhttp.open("GET", "ajax/keepcard.php?count="+nameId, false);
                                xhttp.send();
                            }
                            $(document).ready(function(){
                                i=0;
                                $(".count_book").each(function(){
                                    updateCount($(this).siblings(".nameId").val());
                                })
                                $(".count_book").each(function(){
                                    $(this).val(globalvar[i]);
                                    i++;
                                })
                                $("tr").each(function(index, element){
                                    if($(this).find(".max_value").find("input").val() == $(this).find(".change_cell").find(".count_book").val()){
                                        $(this).find(".change_cell").find(".add").attr("disabled", true);
                                    };
                                    if($(this).find(".change_cell").find(".count_book").val()==0){
                                        $(this).find(".change_cell").find(".remv").attr("disabled", true);
                                    }
                                });
                            });
                            function popall(){
                                const xhttp = new XMLHttpRequest();
                                xhttp.onload = function() {
                                    response = this.responseText.split("###")
                                    document.getElementById("demo").innerHTML = response[0];
                                    document.getElementById("sum_books").value = response[1];
                                }
                                xhttp.open("GET", "ajax/keepcard.php?popall=yes", true);
                                xhttp.send();
                            }
                            $("#reset").click(function(){
                                popall();
                                $(".count_book").val(0);
                                $(".remv").attr("disabled", true);
                            });
                            function keepcard(nameId){
                                const xhttp = new XMLHttpRequest();
                                xhttp.onload = function() {
                                    response = this.responseText.split("###")
                                    document.getElementById("demo").innerHTML = response[0];
                                    document.getElementById("sum_books").value = response[1];
                                }
                                xhttp.open("GET", "ajax/keepcard.php?keep="+nameId, true);
                                xhttp.send();
                            }
                            function popcard(nameId){
                                const xhttp = new XMLHttpRequest();
                                xhttp.onload = function() {
                                    response = this.responseText.split("###")
                                    document.getElementById("demo").innerHTML = response[0];
                                    document.getElementById("sum_books").value = response[1];
                                }
                                xhttp.open("GET", "ajax/keepcard.php?pop="+nameId, true);
                                xhttp.send();
                            }
                            $(".add").click(function(){
                                keepcard($(this).siblings(".nameId").val());
                                var newval = $(this).siblings(".count_book").val();
                                newval = parseInt(newval) + 1;
                                $(this).siblings(".count_book").val(newval);
                                var maxval = parseInt($(this).parent().siblings(".max_value").find("input").val());
                                if (newval == maxval){
                                    $(this).attr("disabled", true);
                                }
                                if (newval > 0){
                                    $(this).siblings(".remv").attr("disabled", false);
                                }
                            });
                            $(".remv").click(function(){
                                popcard($(this).siblings(".nameId").val());
                                var newval = $(this).siblings(".count_book").val();
                                newval = parseInt(newval) - 1;
                                $(this).siblings(".count_book").val(newval);
                                var maxval = parseInt($(this).parent().siblings(".max_value").find("input").val());
                                if (newval == 0){
                                    $(this).attr("disabled", true);
                                }
                                if (newval < maxval){
                                    $(this).siblings(".add").attr("disabled", false);
                                }
                            });
                        </script>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            function borowredirect(){
                window.location.href = "index.php?view=borrow";
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();
                });
            }
        </script>
    </main>