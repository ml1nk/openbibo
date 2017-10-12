<?php
// For the Global search to delete the douple objects
function check_array($array,$word) {
$not_in_the_list=true;
for($i=0;$i<count($array);$i++)
 {
if($array[$i]==$word){$not_in_the_list=false;}
 }
return $not_in_the_list;
}