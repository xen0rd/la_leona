<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>

</head>

<body>

<?php if($_GET['id'] == 1) {?>
	<div class="container">
		<table id="AccountsDatatable" class="display">
			<thead>
				<tr>
					<th>Account Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
				</tr>
				<tr>
					<td>4</td>
					<td>5</td>
					<td>6</td>
				</tr>
				<tr>
					<td>7</td>
					<td>8</td>
					<td>9s</td>
				</tr>
				
			</tbody>
			</tbody>
		</table>
	</div>
	<script>
		$(document).ready(function(){
			$("#AccountsDatatable").DataTable();
		});
	</script>
<?php } ?>