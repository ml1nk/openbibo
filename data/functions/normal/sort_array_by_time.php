<?php
function sort_array_by_time($wert_a, $wert_b) {


    $a = $wert_a["timestamp"];
    $b = $wert_b["timestamp"];
    
     if ($a == $b) {
          return 0;
    } 
     return ($a < $b) ? -1 : +1;


}