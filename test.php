<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    .jumbotron{
        position: relative;
        top: 20px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <table class="table table-striped">
<?php
require('login_sql.php');
if(@$_GET['num'] != ''){
    $num = $_GET['num'];
}
if(@$_GET['male'] != null){
    $male = 1;
}
else{
    $male = 0;
}
if(@$_GET['female'] != null){
    $female = 1;
}
else{
    $female = 0;
}
$age = $_GET['age'];
$color = $_GET['color'];
$size = $_GET['size'];

if(@$_GET['num'] != ''){
    $cont = "select count(*) from stray_animal where animal_id='$num'";
    $re = mysql_query($cont) or die(mysql_error());
    $result = mysql_fetch_array($re);
    if($result[0] == 0){
        echo "此筆資料不存在";
    }
    else{ //顯示對應編號的所有資料
        $sql = "select * from stray_animal where animal_id='$num'";
        $re = mysql_query($sql) or die(mysql_error());
        $result = mysql_fetch_array($re);
        ?>
        <tbody>
           <tr>
             <td>年齡:</td>
             <td><?php echo $result[1]; ?></td>
           </tr>
            <tr>
             <td>性別:</td>
             <td><?php echo $result[2]; ?></td>
           </tr>
            <tr>
             <td>毛色:</td>
             <td><?php echo $result[3]; ?></td>
           </tr>
            <tr>
             <td>體型:</td>
             <td><?php echo $result[4]; ?></td>
           </tr>
            <tr>
             <td>絕育:</td>
             <td><?php echo $result[5]; ?></td>
           </tr>
            <tr>
             <td>備註:</td>
             <td><?php echo $result[6]; ?></td>
           </tr>
            <tr>
             <td>晶片編號:</td>
             <td><?php echo $result[7]; ?></td>
           </tr>
            <tr>
             <td>動物編號: </td>
             <td><?php echo $result[8]; ?></td>
           </tr>
            <tr>
                <td>圖片: </td>
             <td><?php echo "<a href=testimage.php?id=$result[8]>點我</a>"?></td>
           </tr>
            <tr style="Blue">
                <td></td>
           </tr>
        <!--echo "年齡: ".$result[1];
        echo "性別: ".$result[2];
        echo "毛色: ".$result[3];
        echo "體型: ".$result[4];
        echo "絕育: ".$result[5];
        echo "備註: ".$result[6];
        echo "晶片編號: ".$result[7];
        echo "動物編號: ".$result[8];
        echo "<a href=testimage.php?id=$result[8]>圖片</a>";
        echo "<p></p>";-->
<?php
    }
}
elseif(@$_GET['num'] == ''){
    $animal = $age[1];
    if($age == "YD"){
        $age_db = '幼犬';
    }
    elseif($age == "DD"){
        $age_db = '成犬';
    }
    elseif($age == 'YC'){
        $age_db = '幼貓';
    }
    elseif($age == 'DC'){
        $age_db = '成貓';
    }
    if($size == 'blawhite'){
        $size_db = '迷你型(3公斤以下)';
    }
    elseif($size == 'ti'){
        $size_db = '小型(3-13公斤)';
    }
    elseif($size == 'coffee'){
        $size_db = '中型(13-23公斤)';
    }
    elseif($size == 'other'){
        $size_db = '大型(23公斤以上)';
    }
    #echo $age_db,$size_db,$color;
    //color != 其他
    if($color != 'other'){
        $count = "select count(*) from stray_animal where color='$color'";
        $re = mysql_query($count) or die(mysql_error());
        $result = mysql_fetch_array($re);
        if($result[0] == 0){
            echo "無此資料";
        }
        else{  //如果有此顏色的話
            if(($male==0 and $female==0) or ($male==1 and $female==1)){
                $sql = "select * from stray_animal where color='$color' and animal='$animal' and age='$age_db' and size='$size_db'";
                $re = mysql_query($sql) or die("mysql male/female error");
                while(($result = mysql_fetch_array($re)) != null){?>
                    <tr>
             <td>年齡:</td>
             <td><?php echo $result[1]; ?></td>
           </tr>
            <tr>
             <td>性別:</td>
             <td><?php echo $result[2]; ?></td>
           </tr>
            <tr>
             <td>毛色:</td>
             <td><?php echo $result[3]; ?></td>
           </tr>
            <tr>
             <td>體型:</td>
             <td><?php echo $result[4]; ?></td>
           </tr>
            <tr>
             <td>絕育:</td>
             <td><?php echo $result[5]; ?></td>
           </tr>
            <tr>
             <td>備註:</td>
             <td><?php echo $result[6]; ?></td>
           </tr>
            <tr>
             <td>晶片編號:</td>
             <td><?php echo $result[7]; ?></td>
           </tr>
            <tr>
             <td>動物編號: </td>
             <td><?php echo $result[8]; ?></td>
           </tr>
            <tr>
                <td>圖片: </td>
             <td><?php echo "<a href=testimage.php?id=$result[8]>點我</a>"?></td>
           </tr>
            <tr style="Blue">
                <td></td>
           </tr>
                    <!--echo "年齡: ".$result[1];
                    echo "性別: ".$result[2];
                    echo "毛色: ".$result[3];
                    echo "體型: ".$result[4];
                    echo "絕育: ".$result[5];
                    echo "備註: ".$result[6];
                    echo "晶片編號: ".$result[7];
                    echo "動物編號: ".$result[8];
                    echo "<a href=testimage.php?id=$result[8]>圖片</a>";
                    echo "<p></p>";-->
            <?php
                }
            }
            elseif($male==1 and $female==0){
                $count = "select count(*) from stray_animal where color='$color' and animal='$animal' and age='$age_db' and size='$size_db' and gender='公'";
                $re = mysql_query($count) or die(mysql_error());
                $result = mysql_fetch_array($re);
                if($result[0] == 0){
                    echo "無此資料";
                }
                else{
                    $sql = "select * from stray_animal where color='$color' and animal='$animal' and age='$age_db' and size='$size_db' and gender='公'";
                    $re = mysql_query($sql) or die(mysql_error());
                    while(($result = mysql_fetch_array($re)) != null){?>
                       <!-- echo "年齡: ".$result[1];
                        echo "性別: ".$result[2];
                        echo "毛色: ".$result[3];
                        echo "體型: ".$result[4];
                        echo "絕育: ".$result[5];
                        echo "備註: ".$result[6];
                        echo "晶片編號: ".$result[7];
                        echo "動物編號: ".$result[8];
                        echo "<a href=testimage.php?id=$result[8]>圖片</a>";
                        echo "<p></p>";-->
            <tr>
             <td>年齡:</td>
             <td><?php echo $result[1]; ?></td>
           </tr>
            <tr>
             <td>性別:</td>
             <td><?php echo $result[2]; ?></td>
           </tr>
            <tr>
             <td>毛色:</td>
             <td><?php echo $result[3]; ?></td>
           </tr>
            <tr>
             <td>體型:</td>
             <td><?php echo $result[4]; ?></td>
           </tr>
            <tr>
             <td>絕育:</td>
             <td><?php echo $result[5]; ?></td>
           </tr>
            <tr>
             <td>備註:</td>
             <td><?php echo $result[6]; ?></td>
           </tr>
            <tr>
             <td>晶片編號:</td>
             <td><?php echo $result[7]; ?></td>
           </tr>
            <tr>
             <td>動物編號: </td>
             <td><?php echo $result[8]; ?></td>
           </tr>
            <tr>
                <td>圖片: </td>
             <td><?php echo "<a href=testimage.php?id=$result[8]>點我</a>"?></td>
           </tr>
            <tr style="Blue">
                <td></td>
           </tr>
            <?php
                    }
                }
            }
            else{
                $count = "select count(*) from stray_animal where color='$color' and animal='$animal' and age='$age_db' and size='$size_db' and gender='母'";
                $re = mysql_query($count) or die(mysql_error());
                $result = mysql_fetch_array($re);
                if($result[0] == 0){
                    echo "無此資料";
                }
                else{
                    $sql = "select * from stray_animal where color='$color' and animal='$animal' and age='$age_db' and size='$size_db' and gender='母'";
                    $re = mysql_query($sql) or die(mysql_error());
                    while(($result = mysql_fetch_array($re)) != null){?>
                        <!--echo "年齡: ".$result[1];
                        echo "性別: ".$result[2];
                        echo "毛色: ".$result[3];
                        echo "體型: ".$result[4];
                        echo "絕育: ".$result[5];
                        echo "備註: ".$result[6];
                        echo "晶片編號: ".$result[7];
                        echo "動物編號: ".$result[8];
                        echo "<a href=testimage.php?id=$result[8]>圖片</a>";
                        echo "<p></p>";-->
            <tr>
             <td>年齡:</td>
             <td><?php echo $result[1]; ?></td>
           </tr>
            <tr>
             <td>性別:</td>
             <td><?php echo $result[2]; ?></td>
           </tr>
            <tr>
             <td>毛色:</td>
             <td><?php echo $result[3]; ?></td>
           </tr>
            <tr>
             <td>體型:</td>
             <td><?php echo $result[4]; ?></td>
           </tr>
            <tr>
             <td>絕育:</td>
             <td><?php echo $result[5]; ?></td>
           </tr>
            <tr>
             <td>備註:</td>
             <td><?php echo $result[6]; ?></td>
           </tr>
            <tr>
             <td>晶片編號:</td>
             <td><?php echo $result[7]; ?></td>
           </tr>
            <tr>
             <td>動物編號: </td>
             <td><?php echo $result[8]; ?></td>
           </tr>
            <tr>
            <td>圖片: </td>
             <td><?php echo "<a href=testimage.php?id=$result[8]>點我</a>"?></td>
           </tr>
            <tr style="Blue">
                <td></td>
           </tr>
            <?php
                    }
                }
            }
            
        }
    }
    elseif($color == 'other'){
        #echo "123";
        if(($male==0 and $female==0) or ($male==1 and $female==1)){
            #echo "456";
            $sql = "select * from stray_animal where animal='$animal' and age='$age_db' and size='$size_db'";
            $re = mysql_query($sql) or die(mysql_error());
            while(($result = mysql_fetch_array($re)) != null){?>
                <!--echo "年齡: ".$result[1];
                echo "性別: ".$result[2];
                echo "毛色: ".$result[3];
                echo "體型: ".$result[4];
                echo "絕育: ".$result[5];
                echo "備註: ".$result[6];
                echo "晶片編號: ".$result[7];
                echo "動物編號: ".$result[8];
                echo "<a href=testimage.php?id=$result[8]>圖片</a>";
                echo "<p></p>";-->
            <tr>
             <td>年齡:</td>
             <td><?php echo $result[1]; ?></td>
           </tr>
            <tr>
             <td>性別:</td>
             <td><?php echo $result[2]; ?></td>
           </tr>
            <tr>
             <td>毛色:</td>
             <td><?php echo $result[3]; ?></td>
           </tr>
            <tr>
             <td>體型:</td>
             <td><?php echo $result[4]; ?></td>
           </tr>
            <tr>
             <td>絕育:</td>
             <td><?php echo $result[5]; ?></td>
           </tr>
            <tr>
             <td>備註:</td>
             <td><?php echo $result[6]; ?></td>
           </tr>
            <tr>
             <td>晶片編號:</td>
             <td><?php echo $result[7]; ?></td>
           </tr>
            <tr>
             <td>動物編號: </td>
             <td><?php echo $result[8]; ?></td>
           </tr>
            <tr>
             <td>圖片: </td>
             <td><?php echo "<a href=testimage.php?id=$result[8]>點我</a>"?></td>
           </tr>
            <tr style="Blue">
                <td></td>
           </tr>
            <?php
            }
        }
        elseif($male==1 and $female==0){
            $count = "select count(*) from stray_animal where animal='$animal' and age='$age_db' and size='$size_db' and gender='公'";
            $re = mysql_query($count) or die(mysql_error());
            $result = mysql_fetch_array($re);
            if($result[0] == 0){
                echo "無此資料";
            }
            else{
                $sql = "select * from stray_animal where animal='$animal' and age='$age_db' and size='$size_db' and gender='公'";
                $re = mysql_query($sql) or die(mysql_error());
                while(($result = mysql_fetch_array($re)) != null){?>
                    <!--echo "年齡: ".$result[1];
                    echo "性別: ".$result[2];
                    echo "毛色: ".$result[3];
                    echo "體型: ".$result[4];
                    echo "絕育: ".$result[5];
                    echo "備註: ".$result[6];
                    echo "晶片編號: ".$result[7];
                    echo "動物編號: ".$result[8];
                    echo "<a href=testimage.php?id=$result[8]>圖片</a>";
                    echo "<p></p>";-->
            <tr>
             <td>年齡:</td>
             <td><?php echo $result[1]; ?></td>
           </tr>
            <tr>
             <td>性別:</td>
             <td><?php echo $result[2]; ?></td>
           </tr>
            <tr>
             <td>毛色:</td>
             <td><?php echo $result[3]; ?></td>
           </tr>
            <tr>
             <td>體型:</td>
             <td><?php echo $result[4]; ?></td>
           </tr>
            <tr>
             <td>絕育:</td>
             <td><?php echo $result[5]; ?></td>
           </tr>
            <tr>
             <td>備註:</td>
             <td><?php echo $result[6]; ?></td>
           </tr>
            <tr>
             <td>晶片編號:</td>
             <td><?php echo $result[7]; ?></td>
           </tr>
            <tr>
             <td>動物編號: </td>
             <td><?php echo $result[8]; ?></td>
           </tr>
            <tr>
             <td>圖片: </td>
             <td><?php echo "<a href=testimage.php?id=$result[8]>點我</a>"?></td>
           </tr>
            <tr style="Blue">
                <td></td>
           </tr>
            <?php
                }
            }
        }
        else{
            $count = "select count(*) from stray_animal where animal='$animal' and age='$age_db' and size='$size_db' and gender='母'";
            $re = mysql_query($count) or die(mysql_error());
            $result = mysql_fetch_array($re);
            if($result[0] == 0){
                echo "無此資料";
            }
            else{
                $sql = "select * from stray_animal where animal='$animal' and age='$age_db' and size='$size_db' and gender='母'";
                $re = mysql_query($sql) or die(mysql_error());
                while(($result = mysql_fetch_array($re)) != null){?>
                    <!--echo "年齡: ".$result[1];
                    echo "性別: ".$result[2];
                    echo "毛色: ".$result[3];
                    echo "體型: ".$result[4];
                    echo "絕育: ".$result[5];
                    echo "備註: ".$result[6];
                    echo "晶片編號: ".$result[7];
                    echo "動物編號: ".$result[8];
                    echo "<a href=testimage.php?id=$result[8]>圖片</a>";
                    echo "<p></p>";-->
            <tr>
             <td>年齡:</td>
             <td><?php echo $result[1]; ?></td>
           </tr>
            <tr>
             <td>性別:</td>
             <td><?php echo $result[2]; ?></td>
           </tr>
            <tr>
             <td>毛色:</td>
             <td><?php echo $result[3]; ?></td>
           </tr>
            <tr>
             <td>體型:</td>
             <td><?php echo $result[4]; ?></td>
           </tr>
            <tr>
             <td>絕育:</td>
             <td><?php echo $result[5]; ?></td>
           </tr>
            <tr>
             <td>備註:</td>
             <td><?php echo $result[6]; ?></td>
           </tr>
            <tr>
             <td>晶片編號:</td>
             <td><?php echo $result[7]; ?></td>
           </tr>
            <tr>
             <td>動物編號: </td>
             <td><?php echo $result[8]; ?></td>
           </tr>
            <tr>
             <td>圖片: </td>
             <td><?php echo "<a href=testimage.php?id=$result[8]>點我</a>"?></td>
           </tr>
            <tr style="Blue">
                <td></td>
           </tr>
            <?php
                }
            }
        }
    }
}



?>
            </tbody>
        </table>
    </div>
    </div>
    </body>
</html>