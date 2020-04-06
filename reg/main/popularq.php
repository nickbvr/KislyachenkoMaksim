<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../bd.php");
$id = $_POST['id'];

$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);








echo $row['popularq'];
?>
