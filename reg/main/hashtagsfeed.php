<?php
include("../reg/bd.php");
$id = $_POST['id'];
$queryus = mysqli_query($db,"SELECT * FROM users WHERE id='$id'");
$rowus = mysqli_fetch_array($queryus, MYSQLI_ASSOC);
$hastold = $rowus['hashtags'];
$hashold = split('&&&',$hashold);
$countold = count($hashold);
$arraysort = array();
for($i=0;$i<$countold;$i++){
	$help = split(',',$hashold[$i]);
	$hashold[$help[0]] = $help[1];
	$arraysort[$i] = $help[1];
	unset($hashold[$i]);
}
function quicksort ($array, $l=0, $r=0) {
    if($r === 0) $r = count($array)-1;
    $i = $l;
    $j = $r;
    $x = $array[($l + $r) / 2];
    do {
        while ($array[$i] < $x) $i++;
        while ($array[$j] > $x) $j--;
        if ($i <= $j) {
            if ($array[$i] > $array[$j])
                list($array[$i], $array[$j]) = array($array[$j], $array[$i]);
            $i++;
            $j--;
        }
    } while ($i <= $j);
    if ($i < $r) quicksort ($array, $i, $r);
    if ($j > $l) quicksort ($array, $l, $j);
}
quicksort($arraysort);
$k = 0;
$countsort = count($arraysort);
for($g=0;$g<$countsort;$g++){
	$helpnew = array_search($arraysort[$g],$hashold);
	$query = mysqli_query($db,"SELECT * FROM $helpnew ORDER BY popular DESC");
	$querywatch = mysqli_query($db,"SELECT * FROM users WHERE id='$id'");
	$rowwatch = mysqli_fetch_array($querywatch, MYSQLI_ASSOC);
	$arraywatch = split('&&&',$rowwatch['watched']);
	$count = count($arraywatch);
	$i=0;
	$help = 0;
	$array = array();
	while(($row = $query->fetch_assoc()) != FALSE || $k<5){
		for($j=0;$j<$count;$j++){
			if($row['id']==$arraywatch[$j]){
				$k = rand(0, 15);
				if($k==1){
					$help = 0;
				}else{
					$help = 1;
				}
			}
		}
		if($help==1){
			$help=0;
		}else{
			$array[$i] = $row['id'];
			$i++;
		}
	}
}
for($g=0;$g<$countsort;$g++){
	$helpnew = array_search($arraysort[$g],$hashold);
	$query = mysqli_query($db,"SELECT * FROM $helpnew ORDER BY popular DESC");
	$querywatch = mysqli_query($db,"SELECT * FROM users WHERE id='$id'");
	$rowwatch = mysqli_fetch_array($querywatch, MYSQLI_ASSOC);
	$arraywatch = split('&&&',$rowwatch['watched']);
	$count = count($arraywatch);
	$i=0;
	$help = 0;
	$array = array();
	while(($row = $query->fetch_assoc()) != FALSE || $k<5){
		for($j=0;$j<$count;$j++){
			if($row['id']==$arraywatch[$j]){
				$k = rand(0, 15);
				if($k==1){
					$help = 0;
				}else{
					$help = 1;
				}
			}
		}
		if($help==1){
			$help=0;
		}else{
			$array[$i] = $row['id'];
			$i++;
		}
	}
}



$query = mysqli_query($db,"SELECT * FROM popular ORDER BY popular DESC");
$querywatch = mysqli_query($db,"SELECT * FROM users WHERE id='$id'");
$rowwatch = mysqli_fetch_array($querywatch, MYSQLI_ASSOC);
$arraywatch = split('&&&',$rowwatch['watched']);
$count = count($arraywatch);
$i=0;
$help = 0;
$array = array();
while(($row = $query->fetch_assoc()) != FALSE || $i<51){
	for($j=0;$j<$count;$j++){
		if($row['id']==$arraywatch[$j]){
			$k = rand(0, 15);
			if($k==1){
				$help = 0;
			}else{
				$help = 1;
			}
		}
	}
	if($help==1){
		$help=0;
	}else{
		$array[$i] = $row['id'];
		$i++;
	}
}
echo $array;
?>

