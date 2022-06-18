<?php
class Transcript{
    // 資料庫連線
    public $dbconnect;
    // 未來新增/更新 
    public $id;
    public $Name;
    public $Math;
    public $English;
    public $Chinese;

    public function __construct(){
        $db=new Database();
        $this->dbconnect=$db->getConnection();
    }
    
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
    // 3.根據url的id來讀取單筆要編輯得資料
    public function getOneStudent(){
        $sql="SELECT * FROM student WHERE id=:id";
        $getOneCity=$this->dbconnect->prepare($sql);
        $getOneCity->bindparam(":id",$this->id);
        $getOneCity->execute();
        $data=$getOneCity->fetch(PDO::FETCH_ASSOC);
        $this->Math=$data["math"];
        $this->English=$data["english"];
        $this->Chinese=$data["chinese"];
    }
    // 4.更新資料
    public function update(){
        $sql="UPDATE student
              SET math=:math,english=:english,chinese=:chinese WHERE id=:id";
        $updateData=$this->dbconnect->prepare($sql);
        $updateData->bindparam(":math",$this->Math);
        $updateData->bindparam(":english",$this->English);
        $updateData->bindparam(":chinese",$this->Chinese);
        $updateData->bindparam(":id",$this->id);
        return $updateData->execute();
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