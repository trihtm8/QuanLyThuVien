<?php

namespace CT275_project;
use PDO;
use CT275_project\db\PDOFactory;
use CT275_project\tool\Err_helper;

class Bookname{
    public bool $notError;
    private int $nameId;
    private string $name;
    private int $typeId;
    private string $author;
    private string $publishingCompany;
    private string $shortIntro;
    private string $shortContent;
    private string $coverImg;
    private $dateUpdate;
    private int $cost;

    public function __construct(int $nameId){
        $this->notError = true;
        $this->nameId = $nameId;
    }

    public function getTypeName()
    {
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        $conn = $PDOF->conector();
        $stmt = $conn->prepare("SELECT name FROM bookType WHERE typeId = ?");
        $stmt->execute([$this->typeId]);
        $typeName = $stmt->fetch(PDO::FETCH_ASSOC);
        return $typeName["name"];
    }

    public function getNameId() {
        return $this->nameId;
    }
    public function getTypeId(){
        return $this->typeId;
    }
    public function getAuthor(){
        return $this->author;
    }

    public function getName(){
        return $this->name;
    }

    public function getContent(){
        return $this->shortContent;
    }

    public function getPublishingCompany(){
        return $this->publishingCompany;
    }

    public function getShortIntro(){
        return $this->shortIntro;
    }

    public function getCoverImg(){
        return $this->coverImg;
    }
    public function getCost(){
        return $this->cost;
    }
    public function getByName(string $name): int
    {
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError) {
            $conn = $PDOF->conector();
            $stmt = $conn->prepare("SELECT nameId FROM bookname WHERE name = ? LIMIT 1");
            $stmt->execute([$name]);
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $PDOF->disconnect();
                $conn = null;
                return (int) $row["nameId"];
            }
        }
        $PDOF->disconnect();
        return -111;
    }

    public function checkDB(): Bookname | Err_helper
    {
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT * FROM bookname WHERE nameId = ?");
            $stament->execute([$this->nameId]);
            $stament->setFetchMode(PDO::FETCH_ASSOC);
            if ($row = $stament->fetch()){
                $this->name = $row["name"];
                $this->typeId = $row["typeId"];
                $this->author = $row["author"];
                $this->publishingCompany = $row["publishingCompany"];
                $this->shortIntro = $row["shortIntro"];
                $this->shortContent = $row["shortContent"];
                $this->coverImg = $row["coverImg"];
                $this->dateUpdate = $row["dateUpdate"];
                $this->cost=$row["cost"];
            }else{
                $Err = new Err_helper('Bookname','No bookname return');
                $PDOF = $PDOF->disconnect();
                $conn = null;
                return $Err;
            }
        }else{
            return $PDOF;
        }
        $PDOF = $PDOF->disconnect();
        return $this;
    }

    public function getFreeBooks() : array
    {
        $a = [];
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT bookId FROM book WHERE nameId = ? AND bookState = 'free'");
            $stament->execute([$this->nameId]);
            while ($row = $stament->fetch()) {
                $b = new Book($row["bookId"]);
                $b->checkDB();
                $a[] = $b;
            }
        }
        $PDOF = $PDOF->disconnect();
        $conn = null;
        return $a;
    }
    public function getFreeQuantity(): int
    {
        return count($this->getFreeBooks());
    }

    public static function getAll() : array
    {
        $a = [];
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT nameId FROM bookname;");
            $stament->execute();
            while ($row = $stament->fetch()){
                $bn = new Bookname($row["nameId"]);
                $bn = $bn->checkDB();
                if ($bn->notError){
                    $a[] = $bn;
                };
            }
        }
        return $a;
    }

    public static function getAlltype() : array
    {
        $a=[];
        foreach (Bookname::getAll() as $BN) {
            if (!in_array($BN->typeId, $a, false)){
                $a[] = $BN->typeId;                
            }
        }
        return $a;
    }

    public function sampleAuthor() : array
    {
        $a = [];
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT nameId FROM bookname WHERE author=?;");
            $stament->execute([$this->author]);
            while ($row = $stament->fetch()){
                $bn = new Bookname($row["nameId"]);
                $bn = $bn->checkDB();
                if ($bn->notError){
                    $a[] = $bn;
                };
            }
        }
        return $a;
    }

    public static function getNoteBooks() : array
    {
        $a = [];
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT nameId, COUNT(bookId) as soluong FROM book GROUP BY nameId ORDER BY soluong DESC LIMIT 3;");
            $stament->execute();
            while ($row = $stament->fetch()) {
                $b = new Bookname($row["nameId"]);
                $b->checkDB();
                $a[] = $b;
            }
        }
        $PDOF = $PDOF->disconnect();
        $conn = null;
        return $a;
    }

    public static function getNewBooks() : array
    {
        $a = [];
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT * FROM bookname ORDER BY dateUpdate DESC LIMIT 3;");
            $stament->execute();
            while ($row = $stament->fetch()) {
                $b = new Bookname($row["nameId"]);
                $b->checkDB();
                $a[] = $b;
            }
        }
        $PDOF = $PDOF->disconnect();
        $conn = null;
        return $a;
    }

    public static function getSGK() : array
    {
        $a = [];
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT * FROM bookname WHERE typeId=11;");
            $stament->execute();
            while ($row = $stament->fetch()) {
                $b = new Bookname($row["nameId"]);
                $b->checkDB();
                $a[] = $b;
            }
        }
        $PDOF = $PDOF->disconnect();
        $conn = null;
        return $a;
    }
    public static function getByType(int $typeId) : array
    {
        $a = [];
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT * FROM bookname WHERE typeId=?;");
            $stament->execute([$typeId]);
            while ($row = $stament->fetch()) {
                $b = new Bookname($row["nameId"]);
                $b->checkDB();
                $a[] = $b;
            }
        }
        $PDOF = $PDOF->disconnect();
        $conn = null;
        return $a;
    }

    public static function getNewByType(int $typeId) : array
    {
        $a = [];
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT * FROM bookname WHERE typeId=? ORDER BY dateUpdate DESC LIMIT 5;");
            $stament->execute([$typeId]);
            while ($row = $stament->fetch()) {
                $b = new Bookname($row["nameId"]);
                $b->checkDB();
                $a[] = $b;
            }
        }
        $PDOF = $PDOF->disconnect();
        $conn = null;
        return $a;
    }
    
    public static function getTypeNameByNameId($nameId) : string{
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        $conn = $PDOF->conector();
        $stament = $conn->prepare("SELECT name FROM booktype WHERE typeId=? ;");
        $stament->execute([$nameId]);
        if($row=$stament->fetch()){
            return $row["name"];
        }
        return "";
    }


    public static function getByFinding($bookname, $author) : array{
        $a = [];
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        $conn = $PDOF->conector();
        $stament = $conn->prepare("SELECT * FROM bookname WHERE name like ? and author like ?;");
        $bookname = "%" . $bookname . "%";
        $author  = "%" . $author . "%";
        $stament->execute([$bookname, $author]);
        while ( $row = $stament->fetch() ){
            $newBN = new Bookname($row["nameId"]);
            $newBN->checkDB();
            $a[] = $newBN;
        }          
        return $a;
    }

    public function showRow(){
        echo'<div class="row" style="margin-top: 20px;">
        <div class="col-sm-4">
            <img src=';
        
        echo $this->coverImg;
        
        echo   ' " alt="Ảnh sách kích thước nhỏ" style="width: 105px; height: 150px;">
        </div>
        <div class="col-sm-8">
            <p><a href="';
        echo 'index.php?view=book&nameId=';
        echo $this->nameId;
        echo '"><b>';
        echo $this->name;
        echo'</b></a></p>
            <p>Tác giả: <a href="index.php?bookname=&author=';
        echo $this->getAuthor();
        echo'&finding=&view=tableDB">';
        echo $this->author;
        echo '</a></p>
            <p>';
        echo $this->shortIntro;
        echo '</p>
        </div>
        </div>';
    }
}