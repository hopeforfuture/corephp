<?php
ob_start();
include_once '../includes/dbconn.php';

$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);
$records_no = $result->num_rows;
$result->close();
echo $records_no;
die;
?>