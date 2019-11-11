<?php
$arr = array();
$arr = range(0,200);
shuffle($arr);
$element = current($arr);
echo $element;
?>