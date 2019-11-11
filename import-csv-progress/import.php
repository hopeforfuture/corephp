<?php
ob_start();
session_start();
include_once '../includes/dbconn.php';
header('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
set_time_limit(0);
ob_implicit_flush(1);
$upload_dir = '../uploads/';
if(isset($_SESSION['csv_file_name']))
{
	$file_data = fopen($upload_dir.$_SESSION['csv_file_name'], 'r');
	fgetcsv($file_data);
	
	//Truncate the original table
	$sql_truncate = "TRUNCATE TABLE users";
	$stmttruncate = $mysqli->prepare($sql_truncate);
	$stmttruncate->execute();
	$stmttruncate->close();
	
	while($row = fgetcsv($file_data))
	{
		$sql = "INSERT INTO users (first_name,last_name) VALUES(?,?)";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param('ss',$first_name,$last_name);
		$first_name = trim($row[0]);
		$last_name = trim($row[1]);
		$stmt->execute();
		$stmt->close();
		
		sleep(1);
		if(ob_get_level() > 0)
		{
			ob_end_flush();
		}
	}
	fclose($file_data);
	@unlink($upload_dir.$_SESSION['csv_file_name']);
	unset($_SESSION['csv_file_name']);
}
?>