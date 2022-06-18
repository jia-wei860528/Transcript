<?php
    include "./layout/header.php";
    include "./class/database.php";
    include "./class/Transcript.php";
    // 新增成績單物件
    $transcript=new Transcript();
    // 取得transcript資料陣列
    $data=$transcript->getAllStudent();
?>
    <!-- Bootstrap容器 -->
    <div class="container my-5">
        <div class="row">
            <div class="col">
		        <!-- 表格元件 -->
                <table id="transcript-table" class="table table-striped table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">姓名</th>
                            <th scope="col">數學</th>
                            <th scope="col">英文</th>
                            <th scope="col">中文</th>
                            <th scope="col">編輯/刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $row):?>
                        <tr>
                            <td><?php echo $row["id"]?></td>
                            <td><?php echo $row["name"]?></td>
                            <td><?php echo $row["math"]?></td>
                            <td><?php echo $row["english"]?></td>
                            <td><?php echo $row["chinese"]?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-info" >
                                <i class="fas fa-edit"></i>
                                </a>
                                <!-- <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                </a> -->
                                <button class="btn btn-danger delete-btn"  delete-id="<?php echo $row["id"]?>">
                                <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include "./layout/footer.php";?>
<Script>
$(document).ready(function () {
    $('#transcript-table').DataTable();
    $("#transcript-table").on("click",".delete-btn",function(){
        $id = $(this).attr("delete-id");
        var confirmResult = confirm("確定要刪除嗎?");
        if(confirmResult){
            $.ajax({
                url:"delete.php",
                type:"GET",
                data:{
                    id:$id
                },
                success:function(data){
                    if(data == 1){
                        alert("刪除成功");
                        location.reload();
                    }else{
                        alert("刪除失敗");
                    }
                }
            });
        }
    });
});
</Script>
</body>
</html>