<?php 
	
$raw_data = explode("\n", file_get_contents('1.txt'));
$fuel_array = array(); 

foreach ($raw_data as $module) {
	$f = 0;
	while ($module > 0) {
		$module = floor($module/3) - 2;
		if ($module > 0) $f += $module;
	}
	$fuel_array[] = $f;
}

echo "Answer: " . array_sum($fuel_array);