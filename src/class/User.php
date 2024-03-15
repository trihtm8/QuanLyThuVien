<?php

namespace CT275_project;
use CT275_project\db\PDOFactory;
use CT275_project\tool\Err_helper;
use PDO;

class User{
    public bool $notError;
    public int $userId;
    public string $userName;
    private string $password;
    public string $fullName;
    public string $avatar;
    public string $phone;
    public string $address;
    public ?string $intro;
    public ?string $payInfo;
    public int $balance;
    public function __construct(int $userId){
        $this->notError = true;
        $this->userId = $userId;
    }

    public function checkRole(): string
    {
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        $conn = $PDOF->conector();
        $stament = $conn->prepare("SELECT role FROM user WHERE userId = ?");
        $stament->execute([$this->userId]);
        $stament->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stament->fetch();
        return $row["role"];
    }
    public function truePass(string $pass) : bool
    {
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            $statement = $conn->prepare("SELECT password FROM user WHERE userId = ?");
            $statement->execute([$this->userId]);
            if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $PDOF=$PDOF->disconnect();
                $conn=null;
                if ($row["password"] != $pass) {
                    return false;
                }
                else{
                    return true;
                }
            }else{
                $PDOF=$PDOF->disconnect();
                $conn=null;
                return false;
            }
        }else{
            $PDOF=$PDOF->disconnect();
            $conn=null;
            return false;
        }
    }
    public function checkDB(string $password): User | Err_helper
    {
        if ($this->truePass($password)) {
            $PDOF = new PDOFactory();
            $PDOF = $PDOF->connect();
            if ($PDOF->notError){
                $conn = $PDOF->conector();
                $statement = $conn->prepare("SELECT userName, fullName, phone, address, intro, avatar, payInfo, balance FROM user WHERE userId = ?");
                $statement->execute([$this->userId]);
                if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
                    $this->userName=$row["userName"];
                    $this->phone=$row["phone"];
                    $this->fullName=$row["fullName"];
                    $this->address=$row["address"];
                    $this->intro=$row["intro"];
                    if ($this->intro == null){
                        $this->intro == "";
                    }
                    $this->avatar=$row["avatar"];
                    $this->payInfo=$row["payInfo"];
                    if ($this->payInfo == null){
                        $this->payInfo == "";
                    }
                    $this->balance=$row["balance"];
                    $PDOF=$PDOF->disconnect();
                    $conn=null;
                    return $this;
                }else {
                    $PDOF=$PDOF->disconnect();
                    $conn=null;
                    $Err = new Err_helper("User", "No user finded");
                    return $Err;
                }
            }else{
                $conn=null;
                return $PDOF;
            }       
        }else{
            $Err = new Err_helper("User", "Password not matched");
            return $Err;
        }
        
    }

    public static function createByUserName($userName): User | Err_helper
    {
        $PDOF = new PDOFactory();
        $PDOF = $PDOF->connect();
        if ($PDOF->notError){
            $conn = $PDOF->conector();
            if ($conn!= null) {
                $stament = $conn->prepare("SELECT userId FROM user WHERE userName = ?");
                $stament->execute([$userName]);
                if ($stament->rowCount() > 0){
                    $u = new User($stament->fetch(PDO::FETCH_ASSOC)["userId"]);
                    $PDOF = $PDOF->disconnect();
                    $conn=null;
                    return $u;
                }
                else {
                    $PDOF = $PDOF->disconnect();
                    $conn=null;
                    $e = new Err_helper("User", "No row found");
                    return $e;
                }
            }else return $PDOF;
            
        }
        else{
            $conn = null;
            return $PDOF;
        }
    }
    public function update($target, $value): bool
    {
        $PDOF=new PDOFactory();
        $PDOF=$PDOF->connect();
        $conn=$PDOF->conector();
        $stament=$conn->prepare("UPDATE user SET ".$target." = ? WHERE userId = ?");
        $stament->execute([$value, $this->userId]);
        if ($stament->rowCount()==1){
            $this->checkDB($_SESSION["password"]);
            return true;
        }
        return false;
    }

    public function changePass($oldpass, $newpass): bool
    {
        if($this->truePass($oldpass)){
            $PDOF=new PDOFactory();
            $PDOF=$PDOF->connect();
            $conn=$PDOF->conector();
            $stament=$conn->prepare("UPDATE user SET password = ? WHERE userId = ?");
            $stament->execute([$newpass, $this->userId]);
            if($stament->rowCount()==1){
                $stament2=$conn->prepare("SELECT password FROM user WHERE userId = ?");
                $stament2->execute([$this->userId]);
                $row=$stament2->fetch(PDO::FETCH_ASSOC);
                $this->checkDB($row["password"]);
                $PDOF=$PDOF->disconnect();
                $conn=null;
                return true;
            }else{
                $PDOF=$PDOF->disconnect();
                $conn=null;
                return false;
            }
        }else{
            return false;
        }
    }
}