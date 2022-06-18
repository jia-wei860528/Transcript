<?php
include "./layout/header.php";
include "./class/database.php";
include "./class/Transcript.php";
$transcript=new Transcript();
$transcript->id=$_GET["id"];
$transcript->getOneStudent();
if(isset($_POST["submit"])){
    $transcript->Math=$_POST["math"];
    $transcript->English=$_POST["english"];
    $transcript->Chinese=$_POST["chinese"];
}
?>
<!-- 表單元件 -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-xs-12">
                <!-- 表單元件 -->
                <form action="edit.php?id=<?php echo $_GET['id']?>" method="post">
                    <!-- 數學 -->
                    <div class="form-group">
                        <label for="math">數學</label>
                        <input type="text" class="form-control" name="math" id="math" value="<?php echo $transcript->Math?>">
                    </div>
                    <!-- 英文 -->
                    <div class="form-group">
                        <label for="english">英文</label>
                        <input type="text" class="form-control" name="english" id="english" value="<?php echo $transcript->English?>">
                    </div>
                    <!-- 中文 -->
                    <div class="form-group">
                        <label for="chinese">中文</label>
                        <input type="text" class="form-control" name="chinese" id="chinese" value="<?php echo $transcript->Chinese?>">
                    </div>
                    <!-- 送出按鈕 -->
                    <button type="submit" name="submit" class="btn btn-info">送出</button>
                    <a href="./index.php" class="btn btn-outline-success">回首頁</a>
                </form>
                <?php
                // 如果有點下送出按鈕
                if(isset($_POST["submit"])){
                    if($transcript->update()){
                        echo '<div class="alert alert-success" role="alert">
                                更新成功
                              </div>';
                    }else{
                        // 顯示更新失敗
                        echo '<div class="alert alert-success" role="alert">
                                更新失敗
                              </div>';
                    }
                }
                ?>
        </div>
    </div>
</div>