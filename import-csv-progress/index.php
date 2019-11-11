<!DOCTYPE html>
<html>
	<head>
		<title>Import CSV file data with in PHP progress bar using ajax</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</head>
	<body>
		  <br />
		  <br />
		  <div class="container">
			   <h3 align="center">Import CSV File Data with Progress Bar in PHP using Ajax</h3>
			   <br />
			   <div class="panel panel-default">
					<div class="panel-heading">
					 <h3 class="panel-title">Import CSV File Data</h3>
					</div>
					<div class="panel-body">
					   <span id="message"></span>
					   <form id="sample_form" method="POST" enctype="multipart/form-data" class="form-horizontal">
							<div class="form-group">
							 <label class="col-md-4 control-label">Select CSV File</label>
							 <input type="file" name="file" id="file" />
							</div>
							<div class="form-group" align="center">
							 <input type="hidden" name="hidden_field" value="1" />
							 <input type="submit" name="import" id="import" class="btn btn-info" value="Import" />
							</div>
					   </form>
					   <div class="form-group" id="process" style="display:none;">
							<div class="progress">
								 <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
								   <span id="process_data">0</span> - <span id="total_data">0</span>
								 </div>
							</div>
					   </div>
				  </div>
			   </div>
		  </div>
	</body>
</html>

<script>
	$(document).ready(function() {
		
		var clear_timer;
		
		$("#sample_form").on("submit", function(event) {
			event.preventDefault();
			$("#message").html('');
			$.ajax({
				url: "upload.php",
				type: "POST",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				cache: false,
				processData: false,
				beforeSend:function() {
					$("#import").attr('disabled', true);
					$("#import").val('Importing');
				},
				success: function(data) {
					if(data.success) {
						$('#total_data').text(data.total_line);
						console.log("Total line: " + data.total_line);
						start_import();
						clear_timer = setInterval(get_import_data, 2000);
					}
					else if(data.error) {
						$("#message").html('<div class="alert alert-danger">' + data.error + '</div>');
						$("#import").removeAttr('disabled');
						$("#import").val('Import');
					}
					
				}
			});
		});
		
		function start_import()
		{
			$("#process").css('display', 'block');
			$.ajax({
				url: "import.php",
				success: function() {
					
				}
			});
		}
		
		function get_import_data()
		{
			$.ajax({
				url: "process.php",
				success: function(data) {
					var total_data = Number($("#total_data").text());
					var data_inserted = Number(data);
					console.log(data_inserted + "@" + total_data);
					var width = Math.round((data_inserted/total_data)*100);
					$('#process_data').text(data);
					$('.progress-bar').css('width', width + '%');
					
					if(width >= 100)
					{
					  clearInterval(clear_timer);
					  $('#process').css('display', 'none');
					  $('#file').val('');
					  $('#message').html('<div class="alert alert-success">Data Successfully Imported</div>');
					  $('#import').removeAttr('disabled');
					  $('#import').val('Import');
					}
				}
			});
		}
	});
</script>