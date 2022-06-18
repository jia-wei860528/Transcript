<?php
    include "./class/database.php";
    include "./class/Transcript.php";
    $transcript=new Transcript();
    $data=$transcript->getAllStudent();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1PX" >
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>數學</th>
            <th>英文</th>
            <th>中文</th>
            <th>刪除</th>
        </tr>    
        <?php foreach($data as $row):?>
            <tr>
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["name"]?></td>
                <td><?php echo $row["math"]?></td>
                <td><?php echo $row["english"]?></td>
                <td><?php echo $row["chinese"]?></td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id']?>">刪除</a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
    <a href="create.php">新增</a>
</body>
</html>