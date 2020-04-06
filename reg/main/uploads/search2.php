<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../../bd.php");


if(!empty($_POST["referal2"])){ //Принимаем данные

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal2"]))));
	$db_referal = mysqli_query($db,"SELECT * from firm WHERE firm COLLATE UTF8_GENERAL_CI LIKE '%$referal%' ORDER BY count DESC");
	
    

    while ($row = $db_referal -> fetch_array()) {
        echo "\n<li class='list-group-item'>".$row['firm']."</li>";
    }
}
?>
