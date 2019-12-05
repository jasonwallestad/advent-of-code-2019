<?php 

$answer = 0;

for ( $password = 147981; $password <= 691423; $password++ ) {
		
	$chars = str_split( $password ); 
	$dupes = array(); 
	$trips = array();
	
	for ( $i = 0; $i < count($chars); $i++ ) {

		if ( isset( $chars[$i+1] ) && $chars[$i] > $chars[$i+1] ) break; 
		
		if ( isset( $chars[$i+1] ) && $chars[$i] == $chars[$i+1] && !in_array($chars[$i], $trips)) $dupes[] = $chars[$i];
		
		if ( count( array_keys( $dupes, $chars[$i] ) ) > 1) { 
			$dupes = array_diff( $dupes, array( $chars[$i] ) ); 
			$trips[] = $chars[$i]; 
		}
		
		if ( !empty( $dupes ) && $i == count($chars) - 1) $answer++;
	}
	
}

echo "Star 2 Answer: $answer";