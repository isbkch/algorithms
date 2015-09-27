<?php
/*
 * Implementation of the binary search algorithm. 
 * Check article http://globatelier.com/notation-big-o-guide-du-debutant/ for more details
 */

function fast_in_array($elem, $array){
   $top = sizeof($array) -1;
   $bot = 0;

   while($top >= $bot)
   {
      $p = floor(($top + $bot) / 2);
      if ($array[$p] < $elem) $bot = $p + 1;
      elseif ($array[$p] > $elem) $top = $p - 1;
      else return TRUE;
   }
    
   return FALSE;
}