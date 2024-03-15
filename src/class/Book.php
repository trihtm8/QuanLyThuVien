<?php

namespace CT275_project;
use CT275_project\db\PDOFactory;
use CT275_project\tool\Err_helper;
use PDO;

class Book{
    public bool $notError;
    private int $bookId;
    private Bookname | Err_helper $Bname;
    private string $bookState;
    private string $cost;

    public function __construct(int $bookId){
        $this->notError = true;
        $this->bookId = $bookId;
    }
    public function getBookId(){
        return $this->bookId;
    }
    public function getBookname(){
        return $this->Bname;
    }
    public function checkDB(): Book | Err_helper 
    {
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $stament = $conn->prepare("SELECT * FROM book WHERE bookId = ?;");
            $stament->execute([$this->bookId]);
            if($row = $stament->fetch(PDO::FETCH_ASSOC)){
                $this->Bname = new Bookname($row["nameId"]);
                $this->Bname->checkDB();
                if($this->Bname->notError){
                    $this->bookState=$row["bookState"];
                    $PDOF = $PDOF->disconnect();
                    $conn = null;
                    return $this;
                }else{
                    $PDOF = $PDOF->disconnect();
                    $conn = null;
                    return $this->Bname;
                }
            }else{
                $Err = new Err_helper('Book','No book return');
                $PDOF = $PDOF->disconnect();
                $conn = null;
                return $Err;
            }
        }else{
            $conn=null;
            return $PDOF;
        }
    }
}