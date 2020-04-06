<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../../bd.php");


if(!empty($_POST["referal"])){ //Принимаем данные

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));
	$db_referal = mysqli_query($db,"SELECT * from hashtags WHERE hashtag COLLATE UTF8_GENERAL_CI LIKE '%$referal%' ORDER BY count DESC");
	
    

    while ($row = $db_referal -> fetch_array()) {
        echo "\n<li class='list-group-item'>".$row['hashtag']."</li>";
    }
}
?>
