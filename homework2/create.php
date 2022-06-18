<?php
include "./class/database.php";
include "./class/Transcript.php";
$transcript=new Transcript();
?>
<a href="index.php">回首頁</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post">
        <label for="name">姓名</label>
        <input type="text" name="name" id="name">
        <br>
        <br>
        <label for="math">數學</label>
        <input type="text" name="math" id="math">
        <br>
        <br>
        <label for="english">英文</label>
        <input type="text" name="english" id="english">
        <br>
        <br>
        <label for="chinese">中文</label>
        <input type="text" name="chinese" id="chinese">
        <br>
        <br>
        <button type="submit" name="submit" id="submit">送出</button>
    </form>
    <?php
    if(isset($_POST["submit"])){
        $transcript->Name=$_POST["name"];
        $transcript->Math=$_POST["math"];
        $transcript->English=$_POST["english"];
        $transcript->Chinese=$_POST["chinese"];
        if($transcript->create()){
            echo "新增成功";
        }else{
            echo "新增失敗";
        }
    }
    ?>
</body>
</html>