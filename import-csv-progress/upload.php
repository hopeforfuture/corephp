<?php
ob_start();
session_start();
include_once '../includes/dbconn.php';
if(!empty($_POST))
{
	$error = '';
	$total_line = '';
	$upload_dir = '../uploads/';
	
	if(!empty($_FILES['file']['name']))
	{
		$filename = $_FILES['file']['name'];
		$fileinfo = pathinfo($filename);
		$ext = strtolower($fileinfo['extension']);
		
		if($ext == 'csv')
		{
			//Process csv upload
			$newfilename = time().".".$ext;
			$uploadfilename = $upload_dir.$newfilename;
			
			if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfilename))
			{
				$_SESSION['csv_file_name'] = $newfilename;
				$file_content = file($uploadfilename,FILE_SKIP_EMPTY_LINES);
				$total_line = count($file_content);
			}
		}
		else
		{
			$error = 'Only CSV file format is allowed';
		}
	}
	else
	{
		$error = 'Please select a file.';
	}
	
	if($error != '')
	{
		$output = array(
			'error' => $error
		);
	}
	else
	{
		$output = array(
			'success' => true,
			'total_line' => ($total_line - 1)
		);
	}
	
	echo json_encode($output);
	die;
}
?>