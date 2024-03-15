<?php
use CT275_project\Bookname;

// include(__DIR__ . "../../class/tool/Psr4AutoloaderClass.php");

// $loader = new Psr4AutoloaderClass();
// $loader->register();
// $loader->addNamespace("CT275_project", __DIR__ ."../../class");
if(isset($_GET["nameId"])) {
    $bookname = new Bookname($_GET["nameId"]);
    $bookname = $bookname->checkDB();
}

?>
<main>
        <div class="container-fluid">
            <div class="row" style="height: 600px;">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <div style="height: 400px;">
                                <img src="<?=htmlspecialchars($bookname->getCoverImg())?>" alt="Ảnh sách" style="width: 210px; height: 297px;">
                                <p><b><?=htmlspecialchars($bookname->getName())?></b></a></p>
                                <p>Tác giả: <a href="index.php?bookname=&author=<?=htmlspecialchars($bookname->getAuthor())?>&finding=&view=tableDB"><?=htmlspecialchars($bookname->getAuthor())?></a></p>
                                <p>Thể loại: <a href="index.php?view=type_of_book&typeId=<?=htmlspecialchars($bookname->getTypeId())?>"><?=htmlspecialchars($bookname->getTypeName())?></a></p>
                            </div>
                            <hr>
                            <div>
                                <button class="btn btn-default" id="review"><h3 style="margin: 5px;">Xem trước</h3></button>
                                <script>
                                    $("#review").click(function(){
                                        alert("Chức năng này đang được phát triển!");
                                    })
                                </script>
                            </div>
                            <hr>
                        </div>
                        <div class="col-sm-8">
                            <blockquote class="blockquote-reverse" style="height: 400px;">
                                <h3>Nội dung</h3>
                                <p><?=htmlspecialchars($bookname->getContent())?>
                                </p>
                                <footer class="bg-primary"><?=htmlspecialchars($bookname->getPublishingCompany())?></footer>
                            </blockquote>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <button class="btn btn-default" onclick="seethisbook()"><h3 style="margin: 5px;">Mượn quyển này</h3></button>
                                </div>
                                <div class="col-sm-8">
                                    <h3 style="margin: 5px; margin-top: 10px;">Số lượng còn lại: <?=htmlspecialchars($bookname->getFreeQuantity())?></h3>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center container-fluid">
                    <h3 class="bg-primary" style="padding: 10px;">Cùng tác giả</h3>
                    <?php 
                    $sampleAuthor = $bookname->sampleAuthor();
                    ?>
                    <div style="overflow-x: hidden; overflow-y: auto; height: 500px;">
                        <hr>
                        <?php foreach ($sampleAuthor as $sBookname): ?>
                        <?php $sBookname->showRow(); ?>
                        <hr>
                        <?php endforeach ?>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function seethisbook(){
                window.location.href = "http://ct275-project.localhost/index.php?bookname=<?=htmlspecialchars($bookname->getName())?>&author=&finding=&view=tableDB";
            }
        </script>
    </main>