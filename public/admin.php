

<?php
session_start();
if(isset($_SESSION["role"]) && $_SESSION["role"]=="admin"){
include('../prepare/src/dbconnect.php');
$ketqua=[];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['find_book'])) {
        $book = $_GET['book'];
        $author = $_GET['author'];
        $type = $_GET['type'];
        $adu=$_GET['type'];
        $sql = "SELECT n.nameId,n.name, n.author, n.publishingCompany, t.name as namecate FROM bookname n join booktype t on t.typeId= n.typeId where n.name like ? and n.author like ? and t.typeId like ? ";
        $ketqua = $conn->prepare($sql);
        $ketqua->execute(["%$book%","%$author%","%$type%"]);
        $ketqua = $ketqua->fetchAll(PDO::FETCH_ASSOC);
    }
}else{
$sql = "SELECT * from bookname";
$ketqua = $conn->prepare($sql);
$ketqua->execute();
$ketqua = $ketqua->fetch(PDO::FETCH_ASSOC);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['change'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM bookname where nameID=?";
        $ketqua = $conn->prepare($sql);
        $ketqua->execute([$id]);
        header("Location:admin.php");
    }
};
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/b265370c1b.js" crossorigin="anonymous"></script>
    <script>
        function showResult(str) {

        }
    </script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}
        
        /* Set gray background color and 100% height */
        .sidenav {
          background-color: #f1f1f1;
          height: 100%;
        }
        
        /* Set black background color, white text and some padding */
        footer {
          background-color: #555;
          color: white;
          padding: 15px;
        }
        
        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
          .sidenav {
            height: auto;
            padding: 15px;
          }
          .row.content {height: auto;} 
        }
      </style>
</head>
<body>
    <main>
        <div class="container" style="height: 590px;">
            <div id="finder" class="mt-3">
                
                <form class="form-inline" method="GET">                   
                <input type="text" name="book" placeholder="Tên sách">                    
                <input type="text" name="author" placeholder="Tên tác giả">  
                <?php 
                $sql = "SELECT * from booktype";
                $ketqua1 = $conn->prepare($sql);
                $ketqua1->execute();
                $ketqua1 = $ketqua1->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <select name="type" id="">
                    <option value="">Không chọn</option>
                    <?php foreach ($ketqua1 as $row1){ 
                        if($row1['typeId'] == $adu){ $adu=0;?>
                    <option selected value="<?=htmlspecialchars( $row1['typeId'])?>"><?=htmlspecialchars( $row1['name'])?></option>
                    <?php }else{?>
                    <option value="<?=htmlspecialchars( $row1['typeId'])?>"><?=htmlspecialchars( $row1['name'])?></option>

                    <?php }}?>
                </select>
                <button type="submit" name="find_book">Tìm kiếm</button>
                </form>
                
            </div>
            <hr>
            <a href="add.php"><input type="button" value="Thêm"></a>
            <a href="index.php"><input type="button" value="Quay về trang chủ"></a>
            <a href="csdl.php"><input type="button" value="CSDL"></a>
            <hr>
            <div>
                
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
                            <th>Tên</th>
                            <th>Tác giả</th>
                            <th>Nhà xuất bản</th>
                            <th>Thể loại</th>
                            <th>Thay đổi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($ketqua as $book) : ?>
                        <tr>
                            <td><?=htmlspecialchars( $book['name']) ?></td>
                            <td><?=htmlspecialchars( $book['author']) ?></td>
                            <td><?=htmlspecialchars( $book['publishingCompany'] )?></td>
                            <td><?=htmlspecialchars( $book['namecate']) ?></td>
                            <td>
                            <form method="POST">
                                <input type="submit" name="change" class="" value="Xóa"><input type="hidden" name="id" value="<?=htmlspecialchars( $book['nameId']) ?>">
                                <a href="fix.php?id=<?=htmlspecialchars( $book['nameId'] )?>"><input type="button" value="Sửa"></a>
                            </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        <script>
                            $(document).ready(function(){
                                $(".count_book").val(0);
                                $("#sum_books").val(0);
                                $(".remv").attr("disabled", true);
                            });
                            $("#reset").click(function(){
                                $(".count_book").val(0);
                                $("#sum_books").val(0);
                                $(".remv").attr("disabled", true);
                            });
                            $(".add").click(function(){
                                var newval = $(this).siblings(".count_book").val();
                                newval = parseInt(newval) + 1;
                                $(this).siblings(".count_book").val(newval);
                                var newsum = $("#sum_books").val();
                                newsum = parseInt(newsum) + 1;
                                $("#sum_books").val(newsum);
                                var maxval = parseInt($(this).parent().siblings(".max_value").find("input").val());
                                if (newval == maxval){
                                    $(this).attr("disabled", true);
                                }
                                if (newval > 0){
                                    $(this).siblings(".remv").attr("disabled", false);
                                }
                            });
                            $(".remv").click(function(){
                                var newval = $(this).siblings(".count_book").val();
                                newval = parseInt(newval) - 1;
                                $(this).siblings(".count_book").val(newval);
                                var newsum = $("#sum_books").val();
                                newsum = parseInt(newsum) - 1;
                                $("#sum_books").val(newsum);
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
    </main>
</body>
</html>
<?php }?>