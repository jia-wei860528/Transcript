<?php
include "./layout/header.php";
include "./class/database.php";
include "./class/Transcript.php";
$transcript=new Transcript();
?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-xs-12">
                <form action="create.php" method="post">
                    <!-- 學生名 -->
                    <div class="form-group">
                        <label for="name">姓名</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <!-- 數學 -->
                    <div class="form-group">
                        <label for="math">數學</label>
                        <input type="text" class="form-control" name="math" id="math">
                    </div>
                    <!-- 英文 -->
                    <div class="form-group">
                        <label for="english">英文</label>
                        <input type="text" class="form-control" name="english" id="english">
                    </div>
                    <!-- 中文 -->
                    <div class="form-group">
                        <label for="chinese">中文</label>
                        <input type="text" class="form-control" name="chinese" id="chinese">
                    </div>
                    <!-- 送出按鈕 -->
                    <button type="submit" name="submit" class="btn btn-info">送出</button>
                    <a href="./index.php" class="btn btn-outline-success">回首頁</a>
                </form>
                <?php
                // 檢查是否有按下送出按鈕
                if(isset($_POST["submit"])){
                    $transcript->Name=$_POST["name"];
                    $transcript->Math=$_POST["math"];
                    $transcript->English=$_POST["english"];
                    $transcript->Chinese=$_POST["chinese"];
                    if($transcript->create()){
                        echo "<div class='alert alert-dark' role='alert'>
                        新增成功
                            </div>";
                    }else{
                        echo "<div class='alert alert-dark' role='alert'>
                        新增失敗
                            </div>";
                    }
                }
                ?>
        </div>
    </div>
</div>