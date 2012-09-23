<?php


function genArray($startDate,$endDate,$size){
	$genArray = array();
	$unixTimeStart = strtotime($startDate);
	$unixTimeEnd = strtotime($endDate);
	
	for ($i=0; $i < $size; $i++){
		$unixTimeRand = rand($unixTimeStart, $unixTimeEnd);
		$event = $i." event";
		$genArray[$unixTimeRand] = $event;
	}
	return $genArray;
	
}

//handmade array
$array9 = array(
    "1348000628" => "event 0",
    "1348220628" => "event 1",
    "1348223000" => "event 2",
    "1348223001" => "event 3",
    "1348223002" => "event 4",
    "1348239800" =>  "event 5"

);

//$array = genArray("2012-09-19","2012-09-31",100);
//echo "eeee";
//print_r($array4);
// print_r($array);
 
//$beginTime = 0;
//$endTime = 93482998000;

session_start();
if (!isset($_SESSION['useGenArray']))
$_SESSION['useGenArray'] = genArray("2012-08-19","2012-10-31",100);

if (isset($_REQUEST['needGenArray']))
$_SESSION['useGenArray'] = genArray("2012-08-19","2012-10-31",100);
	
if ((isset($_REQUEST['b'])) && (isset($_REQUEST['e'])))
	sendJSON($_SESSION['useGenArray']);
	
//session_destroy();	
function sendJSON($array){	

	$beginTime = strtotime($_REQUEST['b']); 
	$endTime = strtotime($_REQUEST['e']); 

	$newArray = array();
	foreach ($array as $k => $v) {
		if (($k >= $beginTime) AND ($k <= $endTime)){
		  //array_push($newArray,$v); 
			$date = date("Y-m-d",$k);  
			$subarray = array($k,$date,$v);
			//array_push($newArray,$subarray);
		   $newArray[] = $subarray;
		 }			
	}
	unset($value); 
	  
	echo json_encode(($newArray));
}
?>
