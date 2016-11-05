<?php 
session_start();
	
     
?>
<!DOCTYPE html>
<html>
<head>


	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
	<link rel="stylesheet" href="css/alertify.core.css">
    <link rel="stylesheet" href="css/alertify.default.css">
    <script src="js/alertify.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.ui.datepicker-en.js"></script>

	<script type="text/javascript">
	

 
  
		$(document).ready(function(){
		 $.datepicker.setDefaults( $.datepicker.regional[ "en" ] );
		 $.datepicker.setDefaults({ dateFormat: 'mm/dd/yy'});
		    $("#txtFromDate, #txtFromDate1, #txtFromDate2, #txtFromDate3").datepicker({
		     
		        maxDate: "+365D",
		        numberOfMonths: 1,
		        onSelect: function(selected) {
		    	var date = $(this).datepicker('getDate');
		         if(date){
		            date.setDate(date.getDate());
		          }
		          $("#txtToDate").datepicker("option","minDate", date)
		          daysbetween();
		        }
		    });
		 
		    $("#txtToDate, #txtToDate1, #txtToDate2, #txtToDate3").datepicker({ 
		        maxDate:"+365D",
		        numberOfMonths: 1,
		        onSelect: function(selected) {
		           $("#txtFromDate").datepicker("option","maxDate", selected)
		           daysbetween();
		        }
		    });  
		 
		 $("#datepickerImage").click(function() { 
		    $("#txtFromDate").datepicker("show");
		  });
		 $("#datepickerImage1").click(function() { 
		    $("#txtToDate").datepicker("show");
		  });
		 
		 $('#btn_room_search_').click(function() {
		 		id = document.getElementById('facid').value;
		 		//alertify.error(id+" - ");
		 		
	 			type = document.getElementById('typefaci').value;
	 			usage = document.getElementById('typeuse').value;
	 			if(type=="none"){
	 				alertify.alert('Please Select Your Preferred Facility');
		  			return false;
		 		}else if(usage=="none"){
		 			alertify.alert('Please Select Your Preferred Stay');
			  		return false;
		 		}
			  	else if($('#txtFromDate').val()==""){
			  		alertify.alert('Please Enter Check-In Date');
			  		return false;
			 	}else if($('#txtToDate').val()==""){
			  		alertify.alert('Please Enter Check-Out Date');
			  		return false;
			  	}else if($('#reservation').val()==""){
			  		alertify.alert('Checking reservation...');
			  		return false;
			  	}else if($('#reservation').val()=="not"){
			  		alertify.alert('No available facilities for this reservation');
			  		return false;
			  	}else {
			  		return true;
			 	}
			});

			$('#btn_room_search_2').click(function() {
				//return false;
				var type = document.getElementById('typefaci').value;
	 			var usage = document.getElementById('typeuse').value;
		 		var addhrs = document.getElementById('txtAddHrs').value;
		 		var numpersons = document.getElementById('numpax').value;
		 		var occasion = document.getElementById('occasion').value;
		 		var cater = document.getElementById('cater').value;
		 		//alertify.error(type2+" - "+usage2);
		 		
		 		if(type=="none"){
		 			alertify.alert('Please Select Your Preferred Facility');
			  		return false;
		 		}else if(usage=="none"){
		 			alertify.alert('Please Select Your Preferred Stay');
			  		return false;
		 		}else if(numpersons==""){
		 			alertify.alert('Please Enter Number of Persons');
			  		return false;
		 		}else if(occasion=="none"){
		 			alertify.alert('Please Select Your Occasion');
			  		return false;
		 		}else if(cater=="none"){
		 			alertify.alert('Please Select If you Preferred a Catering');
			  		return false;
		 		}else if($('#txtFromDate').val()==""){
			  		alertify.alert('Please Enter Check-In Date');
			  		return false;
			  	}else if($('#txtTimeIn').val()==""){
			  		alertify.alert('Please Enter Time In');
			  		return false;
			  	}else if($('#txtTimeOut').val()==""){
			  		alertify.alert('Please Enter Time Out');
			  		return false;
			  	}else if($('#reservation').val()==""){
			  		alertify.alert('Checking reservation...');
			  		return false;
			  	}else if($('#reservation').val()=="not"){
			  		alertify.alert('No available facilities for this reservation');
			  		return false;
			  	}else {
			  		return true;
			 	}
			});
			
			$("#typefaci").change(function(){
				if($(this).val() == "Casa Leona 1"){
					$("#numpax").attr("max","1").attr("min","0");
				}
				else if($(this).val() == "Casa Leona 2"){
					$("#numpax").attr("max","2").attr("min","0");
				}
				else if($(this).val() == "La Leona Attic"){
					$("#numpax").attr("max","2").attr("min","0");
				}
			});
			 
			$("#numpax").change(function(){
				$("#xper").val($(this).val()*200);
			});
			
			
		});


		function daysbetween() {
			var id = document.getElementById('facid').value;
			var type = document.getElementById('typefaci').value;
			var stay = document.getElementById('typeuse').value;	
			var date1 = document.getElementById('txtFromDate').value;
			if(id==3){
				var date2 = "";
				var tin = document.getElementById('txtTimeIn').value;
				var tout = document.getElementById('txtTimeOut').value;
			}else{
				var tin = "";
				var tout = "";
				var date2 = document.getElementById('txtToDate').value;
			}
			//var result = date2.value-date1.value;
			//alertify.alert("Number of days stay: "+date1);
			$.ajax({
                type: "POST",
                url: "chkAvailable.php",
                data: "id="+id+"&name="+type+"&stay="+stay+"&cin="+date1+"&cout="+date2+"&tin="+tin+"&tout="+tout,
                cache: false,
                success: function(result){
                	//alertify.alert(result);
                	if(result=="ok"){
                		document.getElementById('reservation').value = "ok";
                		document.getElementById('restat').value = "Available";
                		document.getElementById('add_booking').style.display = "inline-block";
                	}else{
                		document.getElementById('reservation').value = "not";
                		document.getElementById('restat').value = "No Available";
                	}
                }
            });
		}

		
		</script>
	

	<style>
select {
			width: 25%;
			height: 27px;
			padding: 0 27px 0 16px;
			border: 1px solid #c9c9c9;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			-khtml-border-radius: 4px;
			border-radius: 4px;
			background: #fcfcfc;
			font-size: 13px;
			line-height: 27px;
			font-family: Arial;
		}

		.home_proc_sel{
			float: left;
			width: 180px;
			padding: 0 0 7px 0;
			}

		.home_proc_sel #txtRate input{
			width: 25px;
			height: 27px;
			padding: 0px 6px 0px 6px;
			border: 1px solid #c9c9c9;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			-khtml-border-radius: 4px;
			border-radius: 4px;
			background: #fcfcfc;
			font-size: 13px;
			line-height: 27px;
			font-family: Arial;
			    margin-right: 8px;
		}

		input:not([type=radio]),  textarea {
			 background: #ffffff;
			 border: 1px solid #ddd;
			 -moz-border-radius: 3px;
			 -webkit-border-radius: 3px;
			 border-radius: 3px;
			 outline: none;
			 padding: 3px;
			 width: 200px;
			 height: 18px;
		}

		select {
			 background: #ffffff;
			 border: 1px solid #ddd;
			 -moz-border-radius: 3px;
			 -webkit-border-radius: 3px;
			 border-radius: 3px;
			 outline: none;
			 padding: 3px;
			 width: 200px;
			 height: 24px;
		}

		input:focus {
			-moz-box-shadow:0px 0px 3px #aaa;
			-webkit-box-shadow:0px 0px 3px #aaa;
			box-shadow:0px 0px 3px #aaa;
			background-color:#FFFEEF;
		}

		p.submit {
			background:none;
			border:none;
			-moz-box-shadow:none;
			-webkit-box-shadow:none;
			box-shadow:none;
		}

		button {
			border:none;
			outline:none;
			-moz-border-radius: 10px;
			-webkit-border-radius: 10px;
			border-radius: 10px;
			color: #ffffff;
			display: block;
			cursor:pointer;
			margin: 0px auto;
			clear:both;
			padding: 4px 15px;
			text-shadow: 0 1px 1px #777;
			font-weight:bold;
			font-family:"Century Gothic", Helvetica, sans-serif;
			font-size:18px;
			-moz-box-shadow:0px 0px 3px #aaa;
			-webkit-box-shadow:0px 0px 3px #aaa;
			box-shadow:0px 0px 3px #aaa;
			background:#4797ED;
		}

		button:hover {
			background:#d8d8d8;
			color:#666;
			text-shadow:1px 1px 1px #fff;
		}

		#txtFromDate, #txtToDate, #typefaci, petsa {
			background-image:url(images/month.png); 
			background-repeat: no-repeat; 
			background-position: 2px 3px;
			background-size: 16px;
			text-indent:17px;
		}

		#typefaci {
			background-image:url(images/bedroom.png);
			background-repeat: no-repeat; 
			background-position: 2px 3px;
			background-size: 16px;
			text-indent:17px;
		}

		#typeuse {
			background-image:url(images/daynight.png);
			background-repeat: no-repeat; 
			background-position: 2px 3px;
			background-size: 24px;
			text-indent:17px;
		}

		#txtRate {
			background-image:url(images/peso.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:17px;
		}

		#txtAddHrs, #txtTimeIn, #txtTimeOut {
			background-image:url(images/addhours.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:18px;
		}

		#txtPersons {
			background-image:url(images/persons.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:17px;
		}

		#occasion {
			background-image:url(images/occasion.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:17px;
		}

		#cater {
			background-image:url(images/catering.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:17px;
		}
		
		table {
    border-collapse: collapse;
    width: 62%;
}

th, td {
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}
	</style>
</head>
	

<body>
	<div id="header">
		<div>
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="search.php">
				<input type="text" name="search" id="search" value="" required autocomplete="off">
				<input type="submit" id="searchBtn" value="">
			</form>
		</div>
		<div class="navigation" style="margin-top:-7px;">
			<ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="facility.php">Facilities</a>
                </li>
                <li>
                    <a href="slideshow.php" >Gallery</a>
                </li>
                <li>    
                    <a>Reservation</a>
                        <?php 
						
						
                    	//echo $_SESSION['login_type'];
                    	if(isset($_SESSION['login_type'])){
                    		if($_SESSION['login_type']=="customer"){
                    			echo "<ul>
					                        <li>
					                            <a href=\"reservations.php?name=".$_SESSION['login_user']."\">View Reservations</a>
					                        </li>
					                        <li>
					                            
					                        </li>
					                  </ul>";
	                    		}else if($_SESSION['login_type']=="FRONTDESK"){
	                    			echo "<ul>
	                    					<li>
					                            <a href=\"registerx.php\">Register New Clients</a>
					                        </li>
	                    					<li>
					                            <a href=\"customers-list.php\">Registered Clients</a>
					                        </li>
					                        <li>
					                            <a href=\"reservations-list.php\">View Reservations</a>
					                        </li>
					                        <li>
					                            
					                        </li>
					                  </ul>";
	                    		}
	                    	}else{
	                    		echo "<ul>
	                    		<li>
		                            <a href=\"registerx.php\">Register</a>
		                        </li>
		                        <li>
		                            <a href=\"customer.php\">Login</a>
		                        </li>
		                        <li>
		                            <a href=\"bookingevent.php\">Booking</a>
		                        </li></ul>";
	                    	}
	                    ?>
                </li>
                <li >
                    <a href="admin.php">Admin</a>
                    <?php 
                    	//echo $_SESSION['login_type'];
                    	if(isset($_SESSION['login_type'])){
                    		if($_SESSION['login_type']=="admin"){
                    			echo "<ul>
                    						<li>
					                            <a href=\"customers-list.php\">Registered Customers</a>
					                        </li>
					                        <li>
					                            <a href=\"reservations-list.php\">Reservations</a>
					                        </li>
					                        <li>
					                            <a href=\"payments-list.php\">Payments</a>
					                        </li>
											 <li>
					                            <a href=\"reports.php\">Reports</a>
					                        </li>
					                        <li>
					                            <a href=\"logout.php\">Logout</a>
					                        </li>
					                  </ul>";
                    		}
                    	}
                    ?>
                </li>
            </ul>
		</div>
	</div>
	
	<div id="body" style="margin-top:-4px;">
		<div class="body" style="align:center;height:790px;">
			<?php 
            	//echo $_SESSION['login_type'];
            	if(isset($_SESSION['login_type'])){
            		if($_SESSION['login_type']=="customer" || $_SESSION['login_type']=="FRONTDESK"){
            			if($_SESSION['login_type']=="customer"){
            				echo "
                				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [".$_SESSION['login_name']."]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
                			";
						}else{
							echo "
            				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [ FRONTDESK ]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
            			";
						}
            			
            		}
            	}
            ?>
			
	<ul>
		
		
			<font face="century gothic" color="#f3be4b" size="5">Reports </font>
		
	</ul>

<div class="container" >
<br>
  <table class="table table-bordered" align="center" style="position: absolute;">
    <tbody >
	
	   <tr >
        <td width="200px"><font face="century gothic" color="black" size="4"> Sales </font> <td>
			<th  > From: <input id="txtFromDate" name="check_in" style="width:130px" type="text" readonly="readonly" AUTOCOMPLETE=OFF onfocusout="daysbetween();" > </th>
			<th > To: <input id="txtToDate" name="check_out" style="width:130px" type="text" readonly="readonly" AUTOCOMPLETE=OFF onfocusout="daysbetween();" ></th>
					  <th></th>		
        
      <th> <a target="_blank" href="javascript:document.location.href='sales.report.php?datein=' + document.getElementById('txtFromDate').value +'&dateout=' + document.getElementById('txtToDate').value" ><button type="button"  style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></th>
</tr>
     
         <tr >
        <td width="200px"><font face="century gothic" color="black" size="4"> List of Checked-In </font> <td>
			<th  > From: <input id="txtFromDate1"  name="check_in" style="width:130px" type="text" readonly="readonly" AUTOCOMPLETE=OFF onfocusout="daysbetween();" > </th>
			<th > To: <input id="txtToDate1" name="check_out" style="width:130px" type="text" readonly="readonly" AUTOCOMPLETE=OFF onfocusout="daysbetween();" ></th>
					  <th></th>		
        
      <th> <a target="_blank" href="javascript:document.location.href='checkedin.report.php?datein=' + document.getElementById('txtFromDate1').value +'&dateout=' + document.getElementById('txtToDate1').value" ><button type="button"  style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></th>
</tr>
         <tr >
        <td width="200px"><font face="century gothic" color="black" size="4"> List of Checked-Out </font> <td>
			<th  > From: <input id="txtFromDate2" name="check_in" style="width:130px" type="text" readonly="readonly" AUTOCOMPLETE=OFF onfocusout="daysbetween();" > </th>
			<th > To: <input id="txtToDate2" name="check_out" style="width:130px" type="text" readonly="readonly" AUTOCOMPLETE=OFF onfocusout="daysbetween();" ></th>
					  <th></th>		
        
      <th> <a target="_blank" href="javascript:document.location.href='checkedout.report.php?datein=' + document.getElementById('txtFromDate2').value +'&dateout=' + document.getElementById('txtToDate2').value" ><button type="button"  style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></th>
</tr>
         <tr >
        <td width="200px"><font face="century gothic" color="black" size="4"> List of Cancelled </font> <td>
			<th  > From: <input id="txtFromDate3" name="check_in" style="width:130px" type="text" readonly="readonly" AUTOCOMPLETE=OFF onfocusout="daysbetween();" > </th>
			<th > To: <input id="txtToDate3" name="check_out" style="width:130px" type="text" readonly="readonly" AUTOCOMPLETE=OFF onfocusout="daysbetween();" ></th>
					  <th></th>		
        
      <th> <a target="_blank" href="javascript:document.location.href='cancelled.report.php?datein=' + document.getElementById('txtFromDate3').value +'&dateout=' + document.getElementById('txtToDate3').value" ><button type="button"  style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></th>
</tr>
       <tr>
        <td><label> </label></td>
		 <td></td>
		    <td></td>
			  <td></td>
			  <td></td>
        <td><a href="report.notapplied.php"><button type="button" style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></td>
       
      </tr>
      
    </tbody>
  </table>
</div>

</body>
</html>

<script>
function printdoc(pageloc)
{
var sOption="toolbar=no,location=no,menubar=no,width=900px,height=800px,left=400";
var winprint=window.open(pageloc,"Print",sOption);  

winprint.focus();                                  
}
</script>

      <?
      include '../theme/footer.php';
      
      ?>
      
     

