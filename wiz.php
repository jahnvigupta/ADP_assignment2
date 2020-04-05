<?php

// Read JSON file
$json = file_get_contents('/opt/lampp/htdocs/wizard.json');

//Decode JSON
$data = json_decode($json,true);
//counting length of data array.
$arrlen=count($data);

//Print data
foreach ($data as $key => $value) {
	print_r($value["name"]);
	echo "'s wand is ";
	print_r($value["wand"][0]["wood"]);
	echo ", ";
	print_r($value["wand"][0]["length"]);
	echo ", with a ";
	print_r($value["wand"][0]["core"]);
	echo " core."."<br>";
}

?>