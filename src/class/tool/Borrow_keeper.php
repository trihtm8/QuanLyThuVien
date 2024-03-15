<?php

namespace CT275_project\tool;
use CT275_project\Bookname;
use CT275_project\Borrowcard;

class Borrow_keeper{
    public static function init(){
        if(!isset($_SESSION["isInit"])){
            $_SESSION["borrow_keeper"]=array();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $_SESSION["timeInit"] = date('d-m-y h:i:s');
            $_SESSION["isInit"] = true;
        }
    }
    public static function keep($nameId){
        if($_SESSION["isInit"]){
            if(isset($_SESSION["borrow_keeper"][$nameId])){
                $_SESSION["borrow_keeper"][$nameId] += 1;
            }else{
                $_SESSION["borrow_keeper"][$nameId] = 1;
            }
        }
    }
    public static function pop($nameId){
        if(isset($_SESSION["borrow_keeper"][$nameId])){
            if($_SESSION["borrow_keeper"][$nameId] == 1){
                unset($_SESSION["borrow_keeper"][$nameId]);
            }elseif($_SESSION["borrow_keeper"][$nameId] > 1){
                $_SESSION["borrow_keeper"][$nameId] -= 1;
            }
        }
    }
    public static function popAll(){
        $_SESSION["borrow_keeper"]=array();
    }
    public static function createdForm(): string
    {
        return "CREATE ".$_SESSION["timeInit"];
    }
    public static function sum(){
        $sum = 0;
        if (isset($_SESSION["borrow_keeper"])){
            foreach($_SESSION["borrow_keeper"] as $quanlity){
                $sum += $quanlity;
            }
        }
        return $sum;
    }
    public static function sumcost(){
        $sum = 0;
        if(isset($_SESSION["borrow_keeper"])){
            foreach($_SESSION["borrow_keeper"] as $nameId => $quanlity){
                $bn = new Bookname($nameId);
                $bn->checkDB();
                $sum += $bn->getCost()*$quanlity;
            }
        }
        return $sum;
    }
    public static function borrow($borrowDate, $deadLine){
        $brc = new Borrowcard(-1);
        foreach ($_SESSION["borrow_keeper"] as $nameId => $quanlity){
            for ($i=0; $i<$quanlity; $i++){
                $brc=new Borrowcard($brc->create($nameId));
                $brc->checkDB();
                $brc->setDate($borrowDate, $deadLine);
            }
        }
        Borrow_keeper::destroy();
    }
    public static function destroy(){
        if($_SESSION["isInit"]){
            unset($_SESSION["borrow_keeper"]);
            unset($_SESSION["timeInit"]);
            unset($_SESSION["isInit"]);
        }
    }
}