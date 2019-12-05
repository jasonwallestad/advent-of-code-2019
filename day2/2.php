<?php

for ( $noun = 0; $noun < 100; $noun++ ) {
	
	for ( $verb = 0; $verb < 100; $verb++ ) {

		$intcode = explode(',', file_get_contents('2.txt'));
		
		$intcode[1] = $noun;
		$intcode[2] = $verb;

		foreach ($intcode as $k => $opcode) {
			if ( $k % 4 != 0 ) continue;
			if ( $opcode == 99 ) break;
			if ( $opcode == 1 ) {
				$intcode[$intcode[$k+3]] = $intcode[$intcode[$k+1]] + $intcode[$intcode[$k+2]];
			} else if ( $opcode == 2 ) {
				$intcode[$intcode[$k+3]] = $intcode[$intcode[$k+1]] * $intcode[$intcode[$k+2]];
			} else {
				break;
			}
		}
		
		if ( $intcode[0] == 19690720 ) { 
			echo "Noun: $noun; Verb: $verb; Star 2 Answer: " . (100 * $noun + $verb);
			die();
		}

	}

}