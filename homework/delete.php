<?php
include "./class/database.php";
include "./class/Transcript.php";
$transcript=new Transcript();
$transcript->id=$_GET["id"];
if($transcript->delete()){
    // 刪除成功就導回首頁
    // header("Location:index.php");
    // 前端JavaScript:跳出一個alert視窗，導回首頁
    // echo "<script>alert('刪除成功');
    //             window.location.href='index.php';
    //       </script>";
    echo 1;
}else{
    // 刪除失敗就提示
    // echo "<script>alert('刪除失敗');
    //         window.location.href='index.php';
    //       </script>";
    echo 0;
}
?>