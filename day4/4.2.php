<?php 
	
$passwords = array();
for ( $i = 147981; $i <= 691423; $i++ ) $passwords[] = $i;

foreach ( $passwords as $k => $password ) {
	
	$chars = str_split( $password ); 
	$dupes = array(); 
	$trips = array();
	
	for ( $i = 0; $i < count($chars); $i++ ) {
		if ( isset( $chars[$i+1] ) && $chars[$i] > $chars[$i+1] ) { 
			unset($passwords[$k]); 
			break; 
		}
		if ( isset( $chars[$i+1] ) && $chars[$i] == $chars[$i+1] && !in_array($chars[$i], $trips)) {
			$dupes[] = $chars[$i];
		}
		if ( count( array_keys( $dupes, $chars[$i] ) ) > 1) { 
			$dupes = array_diff( $dupes, array( $chars[$i] ) ); 
			$trips[] = $chars[$i]; 
		}
	}
	if ( empty( $dupes ) ) { unset($passwords[$k]); }
	
}

echo "Star 2 Answer: " . count($passwords);