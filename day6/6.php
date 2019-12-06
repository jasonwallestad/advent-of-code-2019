<?php
	
$instructions = explode("\n", file_get_contents('6.txt'));
$map = array(); $planet_values = array();

foreach ( $instructions as $instruction ) {
	$rules = explode(")", $instruction);
	list($sun,$planet) = $rules;
	$map[$planet] = $sun;
}

foreach ( $map as $planet => $sun ) {
	$planet_values[] = count( find_com( $planet, $map ) );
}
	
echo "Star 1 Answer: " . array_sum( $planet_values ) . '<br />';
	
$you = find_com( "YOU", $map);
$santa = find_com( "SAN", $map);
	
echo "Star 2 Answer: " . ( count( array_diff( $you, $santa ) ) + count( array_diff( $santa, $you ) ) );

function find_com( $find, $map ) {
	$path = array();
	while ( $find != "COM") {
		$find = $map[$find];
		$path[] = $find;
	}
	return $path;
}