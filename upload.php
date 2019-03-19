<?php
    
//取得上傳檔案資訊
$filename=$_FILES['image']['name'];
$tmpname=$_FILES['image']['tmp_name'];
$filetype=$_FILES['image']['type'];
$filesize=$_FILES['image']['size'];    
$file=NULL;

if(isset($_FILES['image']['error'])){    
    if($_FILES['image']['error']==0){                                    
        $instr = fopen($tmpname,"rb" );
        $file = addslashes(fread($instr,filesize($tmpname)));        
    }
}

//新增圖片到資料庫
require("login_sql.php");
$animal = $_POST['animal'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$color = $_POST['color'];
$size = $_POST['size'];
$ligation = $_POST['ligation'];
$acco = $_POST['acco'];
$chip = $_POST['chip'];
$animal_id = $_POST['id'];

$sql="insert into imagedb(id,image)values('$animal_id','$file')";

$qu = "INSERT INTO `stray_animal`(`animal`, `age`, `gender`, `color`, `size`, `ligation`, `acco`, `animal_id`) VALUES ('$animal','$age','$gender','$color','$size','$ligation','$acco','$animal_id')";

mysql_query($sql) or die(mysql_error());
mysql_query($qu) or die(mysql_error());


echo "insert success";



?>