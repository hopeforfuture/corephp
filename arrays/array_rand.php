<?php
$arr = array();
$arr = range(0,200);
/*echo "<pre>";
print_r($arr);
echo "</pre>";*/
$key = array_rand($arr);
echo $arr[$key];
?>