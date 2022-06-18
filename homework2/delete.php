<?php
include "./class/database.php";
include "./class/Transcript.php";
$transcript=new Transcript();
$transcript->id=$_GET["id"];
if($transcript->delete()){
  header("Location:index.php");
}else{
  header("Location:index.php");
}
?>