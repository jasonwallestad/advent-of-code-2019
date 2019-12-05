<?php 
	
$range = array();
for ($i = 147981; $i <= 691423; $i++ ) $range[] = $i;



// limit possibilities by removing any descending digits
$possibilities = array();
foreach ($range as $password) {
	
	$chars = str_split($password);
	for ( $i = 0; $i < count($chars); $i++ ) {
		
		if ($i < count($chars) - 1 && $chars[$i] > $chars[$i+1]) break;
		if ($i == count($chars) - 2) $possibilities[] = $password;
		
	}
	
}

// make sure our possibilities have at least one pair
$duplicates = array("00","11","22","33","44","55","66","77","88","99");
$star1_answer = array();
foreach ($possibilities as $possibility) {
	foreach ($duplicates as $duplicate)	{
		if (strpos($possibility, $duplicate) !== false) {
			$star1_answer[] = $possibility;
		    break;
		}
	}
}

echo "Star 1 Answer: " . count($star1_answer) . '<br />';

// make sure that the duplicate number isn't matched by any other digits and allow for multiple duplicates in an answer
$star2_answer = array();
foreach ($star1_answer as $password) {
	
	$temp = array();

	foreach ($duplicates as $duplicate)	{
		if (strpos($password, $duplicate) !== false) $temp[] = $duplicate;
	}

	foreach ($temp as $dupe) {
		$letter = $dupe[0];
		if (substr_count($password, $letter) == 2) {
			$star2_answer[] = $password;
			break;
		}
	}

}

echo "Star 2 Answer: " . count($star2_answer);