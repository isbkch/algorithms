<?php

/**
 * splitting the array recursively until has max two elements
 * merging and sorting recursively until sorted array is built
 */


function merge_sort(&$arrayToSort)
{
    if (sizeof($arrayToSort) <= 1) {
        return $arrayToSort;
    }
  
    // split our input array into two halves
    
    // left...
    $leftHalf  = array_slice($arrayToSort, 0, (int)(count($arrayToSort)/2));
    // right...
    $rightHalf = array_slice($arrayToSort, (int)(count($arrayToSort)/2));
  
    // RECURSION
    // split the two halves into their respective halves...
    $leftHalf  = merge_sort($leftHalf);
    $rightHalf = merge_sort($rightHalf);

    $returnArray = merge($leftHalf, $rightHalf);

    return $returnArray;
}
 
  
function merge(&$left, &$right)
{
    $result = array();
  
    // while both arrays have something in them
    while (count($left)>0 && count($right)>0) {
        if ($left[0] <= $right[0]) {
            array_push($result, array_shift($left));
        }
        else {
            array_push($result, array_shift($right));
        }
    }

    // This becames necessary as one of the arrays
    // can become empty before the other
    array_splice($result, count($result), 0, $left); 
    array_splice($result, count($result), 0, $right);

    return $result;
}