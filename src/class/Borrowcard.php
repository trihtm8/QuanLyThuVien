<?php

namespace CT275_project;
use CT275_project\db\PDOFactory;
use CT275_project\tool\Borrow_keeper;
use CT275_project\tool\Err_helper;
use CT275_project\User;
use CT275_project\Bookname;
use PDO;

class Borrowcard{
    public bool $notError;
    public int $cardId;
    public ?Book $book;
    public User $user;
    public ?string $borrowDate;
    public ?string $deadLine;
    public ?string $form;
    public string $state;
    public function __construct(int $cardId){
        $this->cardId = $cardId;
        $this->notError = true;
    }
    public function checkDB() : Borrowcard | Err_helper 
    {
        if(isset($_SESSION["password"])){
            $PDOF = new PDOFactory();
            $PDOF->connect();
            if($PDOF->notError){
                $conn = $PDOF->conector();
                $stament = $conn->prepare("SELECT * FROM borrowcard WHERE cardId = ?");
                $stament->execute([$this->cardId]);
                if ($row = $stament->fetch(PDO::FETCH_ASSOC)){
                    $this->book = new Book($row["bookId"]);
                    $this->book->checkDB();
                    $this->user = new User($row["userId"]);
                    $this->user->checkDB($_SESSION["password"]);
                    $this->borrowDate=$row["borrowDate"];
                    $this->deadLine=$row["deadLine"];
                    $this->form=$row["form"];
                    $this->state=$row["state"];
                    return $this;
                }else{
                    $conn=null;
                    $PDOF = $PDOF->disconnect();
                    $Err = new Err_helper("Borrowcard", "no row return");
                    return $Err;
                }
            }else{
                $Err = new Err_helper("Borrowcard", "conection error");
                return $Err;
            }
        }else{
            $Err = new Err_helper("Borrowcard", "permission deny");
            return $Err;
        }
    }
    public function create($nameId): int
    {
        Borrow_keeper::init();
        $this->user = User::createByUserName($_SESSION["userName"]);
        $this->user->checkDB($_SESSION["password"]);
        $bn = new Bookname($nameId);
        $bn->checkDB();
        $this->book = $bn->getFreeBooks()[0];
        $PDOF = new PDOFactory();
        $PDOF->connect();
        $conn = $PDOF->conector();
        $stament = $conn->prepare("INSERT INTO borrowcard (bookId, userId, form) VALUES (?, ?, ?) ");
        $stament->execute([$this->book->getBookId(), $this->user->userId, Borrow_keeper::createdForm()]);
        if($stament->rowCount()==1){
            $stament = $conn->prepare("SELECT last_insert_id() as LID");
            $stament->execute();
            return $stament->fetch(PDO::FETCH_ASSOC)["LID"];
        }else{
            return -111;
        }
    }
    public function setDate($borrowDate, $deadLine){
        $PDOF = new PDOFactory();
        $PDOF->connect();
        $conn = $PDOF->conector();
        $stament = $conn->prepare("UPDATE borrowcard SET borrowDate = ?, deadLine = ?, state='borrow' WHERE cardId = ?");
        $stament->execute([$borrowDate, $deadLine, $this->cardId]);
        if ($stament->rowCount()==1){
            $this->checkDB();
            $stament2 = $conn->prepare("UPDATE book SET bookState = 'borrow' WHERE bookId = ?");
            $stament2->execute([$this->book->getBookId()]);
        }
    }
    public function getAll(): array
    {
        $a=[];
        $PDOF = new PDOFactory();
        $PDOF->connect();
        if($PDOF->notError){
            $thisuser = User::createByUserName($_SESSION["userName"]);
            $thisuser->checkDB($_SESSION["password"]);
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT cardId FROM borrowcard WHERE userId = ?");
            $stament->execute([$thisuser->userId]);
            while ($row=$stament->fetch(PDO::FETCH_ASSOC)){
                $brc = new Borrowcard($row["cardId"]);
                $brc->checkDB();
                $a[]=$brc;
            }
        }
        return $a;
    }
    public static function groupbyForm(array $borrowcards): array
    {
        $a=[];
        foreach ($borrowcards as $brc){
            if(!isset($a[$brc->form])){
                $a[$brc->form][0]=$brc;
            }else{
                $a[$brc->form][]=$brc;
            }
        }
        return $a;
    }
    public static function isReleased(array $borrowcards):array
    {
        $a=[];
        foreach($borrowcards as $brc){
            if ($brc->state=="released"){
                $a[]=$brc;
            }
        }
        return $a;
    }
    public function release(){
        $PDOF = new PDOFactory();
        $PDOF->connect();
        $conn = $PDOF->conector();
        $stament = $conn->prepare("UPDATE borrowcard SET state = ? WHERE cardId = ?");
        $stament->execute(["released", $this->cardId]);
        if ($stament->rowCount()==1){
            $stament2 = $conn->prepare("UPDATE book SET bookState = ? WHERE bookId = ?");
            $stament2->execute(["free", $this->book->getBookId()]);
            $this->user->update('balance', $this->user->balance + $this->book->getBookname()->getCost());
        }
    }
    public function adminGetAll():array
    {
        $a=[];
        $user = User::createByUserName($_SESSION["userName"]);
        $user->checkDB($_SESSION["password"]);
        if ($user->checkRole()=="admin"){
            $PDOF = new PDOFactory();
            $PDOF->connect();
            $conn = $PDOF->conector();
            $stament=$conn->prepare("SELECT * FROM borrowcard");
            $stament->execute();
            while ($row=$stament->fetch(PDO::FETCH_ASSOC)){
                $a[]=$row;
            }
        }
        return $a;
    }
}