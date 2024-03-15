<?php 
use CT275_project\Bookname;
if(isset($_GET["typeId"])) {
    $booknameArr = Bookname::getByType($_GET["typeId"]);
}
?>
<main>
        <div class="container-fluid">
            <div  class="row text-center container-fluid">
                <div class="col-sm-12">
                    <h1><?=htmlspecialchars(Bookname::getTypeNameByNameId($_GET['typeId']))?></h1>
                </div>
                <div class="col-sm-8">
                    <div class="bg-primary container-fluid">
                        <h2>Hiện có</h2>
                    </div>
                    <div style="overflow-x: hidden; overflow-y: auto; height: 500px;">
                        <hr>
                        <?php foreach($booknameArr as $bookname):?>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-sm-4">
                                <img src="<?=htmlspecialchars($bookname->getCoverImg())?>" alt="Ảnh sách kích thước nhỏ" style="width: 105px; height: 150px;">
                            </div>
                            <div class="col-sm-8">
                                <p><a href="index.php?view=book&nameId=<?=htmlspecialchars($bookname->getNameId())?>"><b><?=htmlspecialchars($bookname->getName())?></b></a></p>
                                <p>Tác giả: <a href="index.php?view=type_of_book&typeId=<?=htmlspecialchars($bookname->getTypeId())?>"><?=htmlspecialchars($bookname->getAuthor())?></a></p>
                                <p><?=htmlspecialchars($bookname->getShortIntro())?></p>
                                
                            </div>
                        </div>
                        
                        <hr>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="bg-primary container-fluid">
                        <h2>Mới thêm</h2>
                    </div>
                    <div style="overflow-x: hidden; overflow-y: auto; height: 500px;">
                        <hr>
                        <?php foreach(Bookname::getNewByType($_GET['typeId']) as $bookname): ?>
                        <?=htmlspecialchars($bookname->showRow())?>

                        <hr>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
        </div>
    </main>