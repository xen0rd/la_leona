<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	
	
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>

</head>

<body>
<?php include "header.php"; ?>

<div class="header">
	<?php 
		if(isset($_SESSION['reserve'])){
			$_SESSION['reserve']=0;
			unset($_SESSION['reserve']);
		}else{
			$_SESSION['reserve']=0;
			unset($_SESSION['reserve']);
		}
		if(isset($_SESSION['set_reservation'])){
			unset($_SESSION['set_reservation']);
		}
		//echo $_SESSION['login_type'];
		if(isset($_SESSION['login_type'])){
			if($_SESSION['login_type']=="customer"){
				echo "
					<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [".$_SESSION['login_name']."]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
				";
			}else if($_SESSION['login_type']=="FRONTDESK"){
				echo "
				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [ FRONTDESK ]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
			";
			}
		}
	?>
	<ul>
		<li>
			<div>

			</div>
		</li>
		<li>
			<label ><font face="century gothic" color="#f3be4b" size="4">Facilities Details </label></font>
		</li>
	</ul>
	
</div>

<?php if($_GET['id'] == 1) {?>
	<div class="container">
		<button class="btn btn-success" style="margin-bottom:20px;" data-toggle="modal" data-target="#casaModal"><i class="glyphicon glyphicon-plus"></i> Add item</button>
			
		<table id="CasaDatatables" class="display">
			<thead>
				<tr>
					<th>ID</th>
					<th>Code</th>
					<th>Name</th>
					<th>Remarks</th>
					<th>Quantity</th>
					<th>Amount</th>
					<th>Ordered Items</th>
					<th>Available Items</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

<?php } ?>

<?php if($_GET['id'] == 2) {?>
	<div class="container">
		<button class="btn btn-success" style="margin-bottom:20px;" data-toggle="modal" data-target="#cabanasModal"><i class="glyphicon glyphicon-plus"></i> Add item</button>
		
		<table id="CabanasDatatables" class="display">
			<thead>
				<tr>
					<th>ID</th>
					<th>Code</th>
					<th>Name</th>
					<th>Remarks</th>
					<th>Quantity</th>
					<th>Amount</th>
					<th>Ordered Items</th>
					<th>Available Items</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

<?php } ?>

<?php if($_GET['id'] == 3) {?>
	<div class="container">
		<button class="btn btn-success" style="margin-bottom:20px;" data-toggle="modal" data-target="#functionModal"><i class="glyphicon glyphicon-plus"></i> Add item</button>
			
		<table id="FunctionDatatables" class="display">
			<thead>
				<tr>
					<th>ID</th>
					<th>Code</th>
					<th>Name</th>
					<th>Remarks</th>
					<th>Quantity</th>
					<th>Amount</th>
					<th>Ordered Items</th>
					<th>Available Items</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

<?php } ?>


<div id="casaModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Casa Leona Item</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="../ajax/insertCasaInventory.php">
					<div class="form-group">
						<label for="itemCode" class="label label-primary">Item Code</label>
						<input type="text" class="form-control" name="itemCode" id="itemCode">
					</div>
					<div class="form-group">
						<label for="itemName" class="label label-primary">Item Name</label>
						<input type="text" class="form-control" name="itemName" id="itemName">
					</div>
					<div class="form-group">
						<label for="itemRemarks" class="label label-primary">Remarks</label>
						<input type="text" class="form-control" name="itemRemarks" id="itemRemarks">
					</div>
					<div class="form-group">
						<label for="itemQuantity" class="label label-primary">Quantity</label>
						<input type="text" class="form-control" name="itemQuantity" id="itemQuantity">
					</div>
					<div class="form-group">
						<label for="itemPrice" class="label label-primary">Price</label>
						<input type="text" class="form-control" name="itemPrice" id="itemPrice">
					</div>
					<input type="hidden" name="facilityId" value="1">
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Add</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="cabanasModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Cabanas & Mezzanine Item</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="../ajax/insertCabanasInventory.php">
					<div class="form-group">
						<label for="itemCode" class="label label-primary">Item Code</label>
						<input type="text" class="form-control" name="itemCode" id="itemCode">
					</div>
					<div class="form-group">
						<label for="itemName" class="label label-primary">Item Name</label>
						<input type="text" class="form-control" name="itemName" id="itemName">
					</div>
					<div class="form-group">
						<label for="itemRemarks" class="label label-primary">Remarks</label>
						<input type="text" class="form-control" name="itemRemarks" id="itemRemarks">
					</div>
					<div class="form-group">
						<label for="itemQuantity" class="label label-primary">Quantity</label>
						<input type="text" class="form-control" name="itemQuantity" id="itemQuantity">
					</div>
					<div class="form-group">
						<label for="itemPrice" class="label label-primary">Price</label>
						<input type="text" class="form-control" name="itemPrice" id="itemPrice">
					</div>
					<input type="hidden" name="facilityId" value="2">
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Add</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="functionModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Function Hall Item</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="../ajax/insertFunctionInventory.php">
					<div class="form-group">
						<label for="itemCode" class="label label-primary">Item Code</label>
						<input type="text" class="form-control" name="itemCode" id="itemCode">
					</div>
					<div class="form-group">
						<label for="itemName" class="label label-primary">Item Name</label>
						<input type="text" class="form-control" name="itemName" id="itemName">
					</div>
					<div class="form-group">
						<label for="itemRemarks" class="label label-primary">Remarks</label>
						<input type="text" class="form-control" name="itemRemarks" id="itemRemarks">
					</div>
					<div class="form-group">
						<label for="itemQuantity" class="label label-primary">Quantity</label>
						<input type="text" class="form-control" name="itemQuantity" id="itemQuantity">
					</div>
					<div class="form-group">
						<label for="itemPrice" class="label label-primary">Price</label>
						<input type="text" class="form-control" name="itemPrice" id="itemPrice">
					</div>
					<input type="hidden" name="facilityId" value="3">
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Add</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>



<?php include "footer.php"; ?>
<script>
	$(document).ready(function(){
		$("#CasaDatatables").DataTable();
		$("#CabanasDatatables").DataTable();
		$("#FunctionDatatables").DataTable();
		
		$.ajax({
			url : window.location.protocol+"//"+window.location.host+"/la_leona/ajax/fetchCasaInventory.php",
			beforeSend : function(){
				console.log("fetching Casa Inventory. . .");
			},
			success : function(data){
				var obj = $.parseJSON(data);
				var obj = $.parseJSON(data);
				$('#CasaDatatables').DataTable().destroy();
				$("#CasaDatatables>tbody").empty();
				for(var i=0; i<obj.length; i++){
					$("#CasaDatatables>tbody").append("<tr>"+
														"<td>"+obj[i].ID+"</td>"+
														"<td>"+obj[i].CODE+"</td>"+
														"<td>"+obj[i].NAME+"</td>"+
														"<td>"+obj[i].REMARKS+"</td>"+
														"<td>"+obj[i].TOTAL_QUANTITY+"</td>"+
														"<td>"+obj[i].FEE+"</td>"+
														"<td>"+obj[i].ORDERED_QUANTITY+"</td>"+
														"<td>"+obj[i].AVAILABLE_QUANTITY+"</td>"+
														"<td>"+(obj[i].STATUS == 'AVAILABLE' ? '<label class="label label-success">AVAILABLE</label>' : obj[i].STATUS == 'NOT AVAILABLE' ? '<label class="label label-default">NOT AVAILABLE</label>' : '<label class="label label-danger">DAMAGED</label>')+"</td>"+
														"</tr>");
				}
				$("#CasaDatatables").DataTable();
				console.log("Casa Inventory successfully fetched!");
			}
		});
		
		$.ajax({
			url : window.location.protocol+"//"+window.location.host+"/la_leona/ajax/fetchCabanasInventory.php",
			beforeSend : function(){
				console.log("fetching Cabanas Inventory. . .");
			},
			success : function(data){
				var obj = $.parseJSON(data);
				var obj = $.parseJSON(data);
				$('#CabanasDatatables').DataTable().destroy();
				$("#CabanasDatatables>tbody").empty();
				for(var i=0; i<obj.length; i++){
					$("#CabanasDatatables>tbody").append("<tr>"+
														"<td>"+obj[i].ID+"</td>"+
														"<td>"+obj[i].CODE+"</td>"+
														"<td>"+obj[i].NAME+"</td>"+
														"<td>"+obj[i].REMARKS+"</td>"+
														"<td>"+obj[i].TOTAL_QUANTITY+"</td>"+
														"<td>"+obj[i].FEE+"</td>"+
														"<td>"+obj[i].ORDERED_QUANTITY+"</td>"+
														"<td>"+obj[i].AVAILABLE_QUANTITY+"</td>"+
														"<td>"+(obj[i].STATUS == 'AVAILABLE' ? '<label class="label label-success">AVAILABLE</label>' : obj[i].STATUS == 'NOT AVAILABLE' ? '<label class="label label-default">NOT AVAILABLE</label>' : '<label class="label label-danger">DAMAGED</label>')+"</td>"+
														"</tr>");
				}
				$("#CabanasDatatables").DataTable();
				console.log("Cabanas Inventory successfully fetched!");
			}
		});
		
		$.ajax({
			url : window.location.protocol+"//"+window.location.host+"/la_leona/ajax/fetchFunctionInventory.php",
			beforeSend : function(){
				console.log("fetching Function Inventory. . .");
			},
			success : function(data){
				var obj = $.parseJSON(data);
				var obj = $.parseJSON(data);
				$('#FunctionDatatables').DataTable().destroy();
				$("#FunctionDatatables>tbody").empty();
				for(var i=0; i<obj.length; i++){
					$("#FunctionDatatables>tbody").append("<tr>"+
														"<td>"+obj[i].ID+"</td>"+
														"<td>"+obj[i].CODE+"</td>"+
														"<td>"+obj[i].NAME+"</td>"+
														"<td>"+obj[i].REMARKS+"</td>"+
														"<td>"+obj[i].TOTAL_QUANTITY+"</td>"+
														"<td>"+obj[i].FEE+"</td>"+
														"<td>"+obj[i].ORDERED_QUANTITY+"</td>"+
														"<td>"+obj[i].AVAILABLE_QUANTITY+"</td>"+
														"<td>"+(obj[i].STATUS == 'AVAILABLE' ? '<label class="label label-success">AVAILABLE</label>' : obj[i].STATUS == 'NOT AVAILABLE' ? '<label class="label label-default">NOT AVAILABLE</label>' : '<label class="label label-danger">DAMAGED</label>')+"</td>"+
														"</tr>");
				}
				$("#FunctionDatatables").DataTable();
				console.log("Function Inventory successfully fetched!");
			}
		});
		
		
	});
</script>
</body>