<?php


//handmade array
$array = array(
    "1348000628" => "event 0",
    "1348220628" => "event 1",
    "1348223000" => "event 2",
    "1348223001" => "event 3",
    "1348223002" => "event 4",
    "1348239800" => "event 5",

);
 
//$beginTime = 0;
//$endTime = 93482998000;

 $beginTime = strtotime($_REQUEST['b']); 
 $endTime = strtotime($_REQUEST['e']); 

$newArray = array();
foreach ($array as $k => $v) {
    if (($k > $beginTime) AND ($k < $endTime)){
      array_push($newArray,$v);   
     }
    	
}
unset($value); 
  
 echo json_encode(($newArray));


?>
