<?php
	$original = array(1,2,3,4,5,6,7,8,9,10);
	echo "<pre>";
	print_r($original);
	$sliced = array_splice($original, 0, 2);
	print_r($original);
	print_r($sliced);
?>