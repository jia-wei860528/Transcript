<?php
class Transcript{
    // 一丶屬性
    public $dbconnect;
    // 未來新增/更新 
    public $id;
    public $Name;
    public $Math;
    public $English;
    public $Chinese;

    // 二丶自動執行建構式
    public function __construct(){
        $db=new Database();
        $this->dbconnect=$db->getConnection();
    }
    // 三丶方法
    // 1.讀取所有表格資料
    public function getAllStudent(){
        $sql = "SELECT * FROM student";
        $getData = $this->dbconnect->prepare($sql);
        $getData->execute();
        $data=$getData->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    // 2.新增資料
    public function create(){
        $sql="INSERT INTO student (name,math,english,chinese)
              VALUES(:name,:math,:english,:chinese)";
        $addData=$this->dbconnect->prepare($sql);
        $addData->bindparam(":name",$this->Name);
        $addData->bindparam(":math",$this->Math);
        $addData->bindparam(":english",$this->English);
        $addData->bindparam(":chinese",$this->Chinese);
        return $addData->execute();
    }
    // 5.刪除資料
    public function delete(){
        $sql="DELETE FROM student WHERE id=:id";
        $deleteData=$this->dbconnect->prepare($sql);
        $deleteData->bindparam(":id",$this->id);
        return $deleteData->execute();
    }
}
?>