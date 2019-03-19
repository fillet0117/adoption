<?php
    
    //從資料庫取得圖片
    require("login_sql.php");
    $id = $_GET['id'];         
    $sql=sprintf("select * from imageDB where id='$id'");
            
    $result=mysql_query($sql);        
    
    //顯示圖片
    if($row=mysql_fetch_assoc($result)){    
        header("Content-type: image/jpeg");     
        print $row['image'];
    }
    
    //mysql_close($conn);
?>