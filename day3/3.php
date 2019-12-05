<?php
	
$raw_data = explode("\n", file_get_contents('3.txt'));
$grid = array(); global $grid;

$wire1 = explode(",", $raw_data[0]);
$wire2 = explode(",", $raw_data[1]);

map_path($wire1,1);
map_path($wire2,2);


function map_path($wire,$id) {
	
	global $grid; $c = 0; $r = 0; $d = 0;
	
	foreach ($wire as $point) {
		
		$dir = $point[0]; 
		$dist = substr($point, 1); 
		
		for ( $i = 0; $i < $dist; $i++ ) {
			
			switch($dir) {
				case "R":
					$c++;
					break;
				case "L":
					$c--;
					break;
				case "U":
					$r++;
					break;
				case "D":
					$r--;
					break;
			}
			
			$d++;
			$grid[$c][$r][$id] = $d;
				
		}

	}
	
}

foreach ($grid as $c => $cv) {
	foreach ($cv as $r => $rv) {
		if (isset($grid[$c][$r][1]) && isset($grid[$c][$r][2])) {
			$time = $grid[$c][$r][1] + $grid[$c][$r][2];
			$dist = abs($c) + abs($r);
			if (!isset($d_answer) || $dist < $d_answer) $d_answer = $dist;
			if (!isset($t_answer) || $time < $t_answer) $t_answer = $time;
		}
	}
}

echo "Shortest Distance: $d_answer<br />";
echo "Shortest Time: $t_answer";

