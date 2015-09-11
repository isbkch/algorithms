<?php

/**
 * The implementations of the Levenshtein algorithm here is illustrative only. 
 * Applications will, in most cases, use implementations which use heap allocations sparingly, 
 * in particular when large lists of words are compared to each other.
 */

$res = lev('The quick brown fox', 'brown quick The fox');

function lev($first, $second) {
	$firstLength  = strlen($first);
	$secondLength = strlen($second);
	
	for($i=0; $i<=$firstLength; $i++) {
		$dist[$i][0] = $i;
	}
	
	for($j=0; $j<=$secondLength; $j++) {
		$dist[0][$j] = $j;
	}
	
	for($i=1; $i<=$firstLength; $i++) {
		for($j=1; $j<=$secondLength; $j++) {
			$c = ($first[$i-1] == $second[$j-1]) ? 0 : 1;
			$dist[$i][$j] = min($dist[$i-1][$j] + 1, $dist[$i][$j-1]+1, $dist[$i-1][$j-1]+$c);
		}
	}
	return $dist[$firstLength][$secondLength];
}