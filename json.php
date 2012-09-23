<?php

function genArray($startDate,$endDate,$size){ // as result it looks like $arrayHandMande
	$genArray = array();
	$unixTimeStart = strtotime($startDate);
	$unixTimeEnd = strtotime($endDate);
	
	for ($i=0; $i < $size; $i++){
		$unixTimeRand = rand($unixTimeStart, $unixTimeEnd);
		$event = str_pad($i, 4, "0", STR_PAD_LEFT)." event";
		$genArray[$unixTimeRand] = $event;
	}	
	return $genArray;	
}

//handmade array
$arrayHandMade = array(
    "1348000628" => "event 0",
    "1348220628" => "event 1",
    "1348223000" => "event 2",
    "1348223001" => "event 3",
    "1348223002" => "event 4",
    "1348239800" =>  "event 5"

);

session_start();
if (!isset($_SESSION['useGenArray']))
$_SESSION['useGenArray'] = genArray("2012-09-19","2012-10-31",300);

if (isset($_REQUEST['needGenArray']))
$_SESSION['useGenArray'] = genArray("2012-09-19","2012-10-31",300);
	
if ((isset($_REQUEST['b'])) && (isset($_REQUEST['e'])))
	sendJSON($_SESSION['useGenArray']);
	
	
function sendJSON($array){	

	$beginTime = strtotime($_REQUEST['b']); 
	$endTime = strtotime($_REQUEST['e']); 
	$endTime += (24 * 60 * 60)-1; //Добавляем сутки минус секунда, чтобы в выборку попали события endtime дня

	$newArray = array();
	foreach ($array as $k => $v) {
		if (($k >= $beginTime) AND ($k <= $endTime)){		  
			$date = date("Y-m-d",$k);  
			$subarray = array($k,$date,$v); 			
		    $newArray[] = $subarray;
		 }			
	}
	unset($value); 
	sleep(1);
	  
	echo json_encode(($newArray));
}
?>
