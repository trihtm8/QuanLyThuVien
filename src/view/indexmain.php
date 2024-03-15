<?php 
use CT275_project\Bookname;
?>
<main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    <div class="container-fluid text-center">
                        <h1>ĐÁNG CHÚ Ý</h1>
                        <div class="row">
                            <?php foreach (Bookname::getNoteBooks() as $note): ?>
                            <div class="col-sm-4 text-center">
                                <img src="<?=htmlspecialchars($note->getCoverImg())?>" alt="Ảnh sách" style="width: 210px; height: 297px;">
                                <p><a href="index.php?view=book&nameId=<?=htmlspecialchars($note->getNameId())?>"><b><?=htmlspecialchars($note->getName())?></b></a></p>
                                <p>Tác giả: <a href="index.php?bookname=&author=<?=htmlspecialchars($note->getAuthor())?>&finding=&view=tableDB"><?=htmlspecialchars( $note->getAuthor() )?></a></p>
                                <p><?=htmlspecialchars($note->getShortIntro())?></p>

                            </div>
                            <?php endforeach ?>
                            
                        </div>
                    </div>
                    <div class="container-fluid text-center">
                        <h1 >Sách mới</h1>
                        <?php foreach (Bookname::getNewBooks() as $note): ?>
                            <div class="col-sm-4 text-center">
                                <img src="<?=htmlspecialchars($note->getCoverImg())?>" alt="Ảnh sách" style="width: 210px; height: 297px;">
                                <p><a href="index.php?view=book&nameId=<?=htmlspecialchars($note->getNameId())?>"><b><?=htmlspecialchars($note->getName())?></b></a></p>
                                <p>Tác giả: <a href="index.php?bookname=&author=<?=htmlspecialchars($note->getAuthor())?>&finding=&view=tableDB"><?=htmlspecialchars( $note->getAuthor() )?></a></p>
                                <p><?=htmlspecialchars($note->getShortIntro())?></p>

                            </div>
                            <?php endforeach ?>
                        
                    </div>              
                </div>
                <div class="col-sm-4 text-center">
                    <h1>Sách giáo khoa</h1>
                    <?php foreach (Bookname::getSGK() as $note): ?>
                            <?=htmlspecialchars($note->showRow())?>
                            <?php endforeach ?>
                    <!-- <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-4">
                            <img src="avatar.webp" alt="Ảnh sách kích thước nhỏ" style="width: 105px; height: 150px;">
                        </div>
                        <div class="col-sm-8">
                            <p><a href="/actionpage.php?book_id=AAAAA"><b>Sách AAAAAAAAAAA</b></a></p>
                            <p>Tác giả: <a href="/actionpage.php?author=Thần Sầu">Thần Sầu</a></p>
                            <p>Một đoạn mô tả ngắn cho sách AAAAAAAAAAAAAAAA</p>
                        </div>
                    </div> -->
                    
                </div>
            </div>
        </div>
    </main>