<?php
$oops = get_millis();
 echo $oops;




function get_millis(){
  list($usec, $sec) = explode(' ', microtime());
  return (int) ((int) $sec * 1000 + ((float) $usec * 1000));
}


function get_millis2(){
list($usec, $sec) = explode(" ", microtime());
    return floor(((float)$usec + (float)$sec)*1000);
}
?>
