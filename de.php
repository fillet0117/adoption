<?php
require("login_sql.php");
$animal_id = $_POST['animal_id'];
$sql = "delete from stray_animal where animal_id='$animal_id'";
$re = mysql_query($sql) or die(mysql_error());
echo "delete success";

?>