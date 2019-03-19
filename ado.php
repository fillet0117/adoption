<?php
require("login_sql.php");
$name = $_POST['name'];
$address = $_POST['address'];
$phone_num = $_POST['phone_num'];
$animal_id = $_POST['animal_id'];
$adoption_id = $_POST['ado_id'];

$qu = "INSERT INTO `adoption`(`name`, `address`, `phone`, `animal_id`, `adoption_id`) VALUES ('$name','$address','$phone_num','$animal_id','$adoption_id')";

mysql_query($qu) or die(mysql_error());
echo "insert success";

?>