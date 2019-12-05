<?php

$intcode = explode( ',', file_get_contents('5.txt') );
$input = 5;

$i = 0; 

while ( $opcode != 99 ) {	
	
		$opcode = $intcode[$i];
		
		if ( strlen( $opcode ) > 2 ) {
			
			list( $o1,$o2,$p1,$p2,$p3 ) = array_reverse( str_split( $opcode ) );
			$opcode = (int)( $o2.$o1 ); 
			
		} else {
			
			list( $p1,$p2,$p3 ) = 0;
			
		}
		
		if ( $p1 == 1 ) { $pd1 = $intcode[$i+1]; } else { $pd1 = $intcode[$intcode[$i+1]]; }
		if ( $p2 == 1 ) { $pd2 = $intcode[$i+2]; } else { $pd2 = $intcode[$intcode[$i+2]]; }
		
		$get1 = $intcode[$i+3];
		$get3 = $intcode[$i+3];
		
		switch( $opcode ) {
			
			case 99:
				break 2;
				
			case 1:
				$intcode[$get3] = $pd1 + $pd2;
				if ( $intcode[$i] == $i ) break; 
				$i += 4; 
				break;
				
			case 2:
				$intcode[$get3] = $pd1 * $pd2;
				if ( $intcode[$i] == $i ) break; 
				$i += 4;
				break;
				
			case 3:
				$intcode[$get1] = $input;
				if ( $intcode[$i] == $i ) break; 
				$i += 2;
				break;
				
			case 4:
				echo $pd1;
				$i += 2;
				break;
				
			case 5:
				if ($pd1 != 0) {
					$intcode[$i] = $pd2;
					$i = $pd2;
					break; 
				} 
				$i += 3;
				break;
				
			case 6:
				if ($pd1 == 0) {
					$intcode[$i] = $pd2;
					$i = $pd2;
					break; 
				}
				$i += 3;
				break;
				
			case 7:
				$intcode[$get3] = $pd1 < $pd2 ? 1 : 0;
				if ( $intcode[$i] == $i ) break; 
				$i += 4;
				break;
				
			case 8:
				$intcode[$get3] = $pd1 == $pd2 ? 1 : 0;
				if ( $intcode[$i] == $i ) break; 
				$i += 4;
				break;
				
			default:
				echo "Error";
				break 2;
		}
}