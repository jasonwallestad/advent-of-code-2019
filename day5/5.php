<?php
	
$intcode = explode(',', file_get_contents('5.txt'));

$input = 5;

echo "Input: $input<br />";

foreach ($intcode as $k => $opcode) {
	
	if ( isset($skip_until) && $k < $skip_until ) continue;
	
	$rerun = true;

	while ( $rerun == true ) {
		
		$opcode = $intcode[$k];
		
		if (strlen($opcode) > 2) {
			$code_builder = array_reverse(str_split($opcode));
			$opcode = $code_builder[1].$code_builder[0]; $opcode = (int)$opcode;
			$p1 = $code_builder[2]; if ($p1 == "") $p1 = 0;
			$p2 = $code_builder[3]; if ($p2 == "") $p2 = 0;
			$p3 = $code_builder[4]; if ($p3 == "") $p3 = 0;
		} else {
			$p1 = 0;
			$p2 = 0;
			$p3 = 0;
		}
		
		if ($p1 == 0) { $pd1 = $intcode[$intcode[$k+1]]; } else { $pd1 = $intcode[$k+1]; }
		if ($p2 == 0) { $pd2 = $intcode[$intcode[$k+2]]; } else { $pd2 = $intcode[$k+2]; }

		$rerun = false;
		
		switch( $opcode ) {
			
			case 99:
				break 3;
				
			case 1:
				$intcode[$intcode[$k+3]] = $pd1 + $pd2;
				if ( $intcode[$k] == $k ) { 
					$rerun = true; 
					break; 
				} else {
					$skip_until = $k + 4;
					break;
				}
				
			case 2:
				$intcode[$intcode[$k+3]] = $pd1 * $pd2;
				if ( $intcode[$k] == $k ) { 
					$rerun = true; 
					break; 
				} else {
					$skip_until = $k + 4;
					break;
				}
				
			case 3:
				$intcode[$intcode[$k+1]] = $input;
				if ( $intcode[$k] == $k ) { 
					$rerun = true; 
					break; 
				} else {
					$skip_until = $k + 2;
					break;
				}
				
			case 4:
				echo $pd1 . '<br />';
				$skip_until = $k + 2;
				break;
				
			case 5:
				if ($pd1 != 0) {
					$intcode[$k] = $pd2;
					$skip_until = $pd2;
					break; 
				} else {
					$skip_until = $k + 3;
					break;
				}
				
			case 6:
				if ($pd1 == 0) {
					$intcode[$k] = $pd2;
					$skip_until = $pd2;
					break; 
				} else {
					$skip_until = $k + 3;
					break;
				}
				
			case 7:
				if ($pd1 < $pd2) { 
					$intcode[$intcode[$k+3]] = 1; 
				} else { 
					$intcode[$intcode[$k+3]] = 0; 
				}
				if ( $intcode[$k] == $k ) { 
					$rerun = true; 
					break; 
				} else {
					$skip_until = $k + 4;
					break;
				}
				
			case 8:
				if ($pd1 == $pd2) { 
					$intcode[$intcode[$k+3]] = 1; 
				} else { 
					$intcode[$intcode[$k+3]] = 0; 
				}
				if ( $intcode[$k] == $k ) { 
					$rerun = true; 
					break; 
				} else {
					$skip_until = $k + 4;
					break;
				}
				
			default:
				echo "Error";
				break 2;
		}
	}
}

