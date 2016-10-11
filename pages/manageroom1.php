
<!DOCTYPE html>
<html lang="en">
<script>
var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}
function enabletextbox(number)
{
	 document.getElementById('itemnumber'+ number).readOnly = false;
	 document.getElementById('savebutton').disabled = true;
	 document.getElementById('cancelbutton').disabled = true;

	 document.getElementById('itemnumber').value = "";
	 document.getElementById('itemname').value = "";
	 document.getElementById('itemqty').value = "";
	 document.getElementById('itemunit').value = "";
	 document.getElementById('itemdamagefee').value= "";
}

function editequipment(number)
{
	
	 document.getElementById('itemdamagefee'+ number).readOnly = false;
}


</script>
<?php require_once 'header.php'; ?>

<?php require_once 'DBconnect.php'; ?>
<?php

$activeequiptab = 0;
if(isset($_POST['savebutton']))
{
	$counter = $_POST['counter'];
	$roomselected = $_POST['selectedroomnumber'];
	$itemnum = $_POST['itemcode'];
	$itemname = $_POST['itemname'];
	$itemqty = $_POST['itemqty'];
	$itemunit = $_POST['itemunit'];
	$itemfee = $_POST['itemdamagefee'];

	$itemcode = current(explode("-", $itemnum));

	if (($pos = strpos($itemnum, "-")) !== FALSE) 
	{ 
    	$itemsubid = substr($itemnum, $pos+1); 

	}
	else
	{

		$itemsubid = 0;

	}

	$insertequip = mysql_query("INSERT INTO roominfo_table( Room_number , Item_number, Item_subid, Item_name, Item_quantity, Item_unitofmeasure, Item_damagefee) VALUES ('$roomselected','$itemcode','$itemsubid', '$itemname','$itemqty','$itemunit', '$itemfee') ");


	//$updatepurchase = mysql_query("INSERT INTO roominfo_table( Room_number , Item_number, Item_name, Item_quantity, Item_unitofmeasure, Item_damagefee) VALUES ('$roomselected','$itemnum','$itemname','$itemqty','$itemunit', '$itemfee') ");

	// get item code purchase sales invoice to inout status

	$stringstatus = 'Room Number '.$roomselected;
	
	$updateequipstatus = mysql_query("UPDATE `purchase_table` SET `purchase_status`='$stringstatus' WHERE `purchase_id`= '$itemcode' AND `purchase_subid`='$itemsubid'");

	$activeequiptab = 1;


}

if(isset($_POST['saveeditbutton']))
{
	$counter = $_POST['counter'];
	$roomselected = $_POST['selectedroomnumber'];
	$itemnum = $_POST['itemnumber'.$counter];
	$itemfee = $_POST['itemdamagefee'.$counter];
	//get item id
	$itemcode = current(explode("-", $itemnum));

	//get item sub id
	if (($pos = strpos($itemnum, "-")) !== FALSE) 
	{ 
    	$itemsubid = substr($itemnum, $pos+1); 

	}
	else
	{

		$itemsubid = 0;

	}

	$updateequip = mysql_query("UPDATE `roominfo_table` SET `Item_damagefee`='$itemfee' WHERE Room_number = '$roomselected' AND Item_number ='$itemcode' AND Item_subid= '$itemsubid' ");
	
	$activeequiptab = 1;


	
}

if(isset($_POST['removeitembutton']))
{

	 $counter = $_POST['itemlistcount'];
	$selectedroom = $_POST['removeroomnum'];
	$itemnum = $_POST['removeitem'.$counter];

	 $itemcode = current(explode("-", $itemnum));

	//get item sub id
	if (($pos = strpos($itemnum, "-")) !== FALSE) 
	{ 
    	$itemsubid = substr($itemnum, $pos+1); 

	}
	else
	{

		$itemsubid = 0;

	}

	$deleteequip = mysql_query("DELETE FROM `roominfo_table` WHERE Room_number = '$selectedroom' AND Item_number ='$itemcode' AND Item_subid= '$itemsubid' ");
	

	$updateequipstatus = mysql_query("UPDATE `purchase_table` SET `purchase_status`='OK' WHERE `purchase_id`= '$itemcode' AND `purchase_subid`='$itemsubid'");

	$activeequiptab = 1;


}

if(isset($_POST['editroominfo']))
{
		$roomnumedited = $_POST['roomnum'];
		$roomtypeedited = $_POST['roomcode'];
		$roomnameedited = $_POST['roomtype'];
		$roomdescedited = $_POST['roomdesc'];
		$roompriceedited = $_POST['roomprice'];
		$roomguestedited = $_POST['roomguest'];
		$roomdetailsedited = $_POST['roomdetails'];

		$updateroom = "UPDATE `room_table` SET `Room_code`='$roomnameedited',
		`Room_type`='$roomtypeedited',`Room_rate`='$roompriceedited',
		`Room_pax`='$roomguestedited',`Room_details`='$roomdetailsedited' WHERE Room_number='$roomnumedited' ";

			if(!mysql_query($updateroom))
											{
					die('Error:' .mysql_error());
					}
					else
					{

					}



}




?>


			<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						
						<div class="page-header">
							<h1>
								Room Management
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->
						<form action="manageroom.php" method="post">
						Search room number: <select name="roomnums">
						<?php

						$searchroom = mysql_query("SELECT Room_number, Room_type FROM room_table ");
						while($row = mysql_fetch_array($searchroom))
						{
							$roomnumber = $row['Room_number'];
							$roomname = $row['Room_type'];
						?>
									  <option value="<?php echo $roomnumber?>"><?php echo $roomnumber."-".$roomname;?></option>
							<?php

						}

							?>		  
									</select>
									<button type="submit" name="searchroom" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
									<hr>
								</form>
									<?php
									if(isset($_POST['searchroom'])|| isset($_POST['searcinventory']))
									{
										$selectedroom = $_POST['roomnums'];
										$activeequiptab=1;

										$displayprofilepic = mysql_query("SELECT * from photoroom_table WHERE Room_number = '$selectedroom' AND photo_status='Profile'");
										while($profile = mysql_fetch_array($displayprofilepic))
										{
										$imagefilename = $profile['imagefile'];
										}

										$displayroom = mysql_query("SELECT DISTINCT * FROM room_table WHERE Room_number = '$selectedroom' ");
										while($row = mysql_fetch_array($displayroom))
										{
											$roomtype = $row['Room_type'];
											$roomrate = $row['Room_rate'];
											$roompax = $row['Room_pax'];
											$roomcode = $row['Room_code'];
											$roomdetails = $row['Room_details'];
									?>

						<div class="">
									<div id="user-profile-2" class="user-profile">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-18">
												<li <?php if($activeequiptab==0) {?>class="active"<?php }?>>
													<a data-toggle="tab" href="#home">
														<i class="green ace-icon fa fa-building-o bigger-120"></i>
														Info
													</a>
												</li>

												<li <?php if($activeequiptab==1) {?>class="active"<?php }?>>
													<a data-toggle="tab" href="#feed">
														<i class="orange ace-icon fa fa-reorder bigger-120"></i>
														Equipment
													</a>
												</li>
												<li <?php if($activeequiptab==0) {?>class="active"<?php }?>>
													<a data-toggle="tab" href="#supplies">
														<i class="yellow ace-icon fa fa-photo bigger-120"></i>
														Web Photos
													</a>
												</li>
												
											</ul>

											<div class="tab-content no-border padding-24">
												<div id="home" class="tab-pane <?php if($activeequiptab==0) {?> in active <?php }?>">
													<div class="row">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<img width="200px" height="180px" alt="Room Image" id="roomimage" src="../uploadedpicture/<?php echo $imagefilename;?>">
															</span>

															<div class="space space-4"></div>

													
														</div>

														<div class="col-xs-12 col-sm-9">
															<h4 class="blue">
																<span class="middle"><?php echo $roomtype?> <a data-id="viewid" data-toggle="modal" href="#roomeditmodal" class="fa fa-edit primary"></a></span>

																
															</h4>

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name"> Room Number </div>

																	<div class="profile-info-value">
																		<span><?php echo $selectedroom;?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Type </div>

																	<div class="profile-info-value">
																	
																		<span><?php echo $roomtype;?></span>
																		
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Rate </div>

																	<div class="profile-info-value">
																		<span><?php echo $roomrate;?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Max Guest </div>

																	<div class="profile-info-value">
																		<span><?php echo $roompax;?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Room Details</div>

																	<div class="profile-info-value">
																		<span><?php echo $roomdetails;?></span>
																	</div>
																</div>
															</div>

															

														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space-20"></div>

													
												</div><!-- /#home -->


											<div id="supplies" class="tab-pane <?php if($activeequiptab==0) {?> in active <?php }?>">
													<div class="row">

														<form enctype="multipart/form-data" action="uploadphoto.php" method="post" onsubmit="return Validate(this);">
					
						<p><label for="file">Upload Image</label> <input type="file" name="file" id="file" required></p>
						<input type="hidden" name="roomnumber" value="<?php echo $selectedroom;?>">
						<p><input class="btn btn-primary" type="submit" name="btn_upload" value="Upload"></p>
						
						</form>
														<hr>
														<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<ul class="ace-thumbnails clearfix">
									

									<?php
									$displayimages = mysql_query("SELECT * FROM `photoroom_table` WHERE `Room_number`='$selectedroom'");
									if(!mysql_num_rows($displayimages))
									{
										?>
										<div class="alert alert-info">
											No Images Found
										</div>

										<?php
									}
									else
									{
										while($row = mysql_fetch_array($displayimages))
										{
											?>
											<li>
											<a href="../uploadedpicture/<?php echo $row['imagefile'];?>" data-rel="colorbox" class="cboxElement">
												<img width="150" height="150" alt="150x150" src="../uploadedpicture/<?php echo $row['imagefile'];?>">
												<div class="text">
													<div class="inner">Web Photo</div>
												</div>
											</a>

											<div class="tools tools-bottom">
												
												<a href="#">
													<form action="querypicture.php" method="post">
													<button type="submit" class="btn btn-white btn-primary btn-sm" name="profilepic" value="<?php echo $row['imagefile'];?>"><i class="ace-icon fa fa-photo"></i></button>
													<input type="hidden" name="picroomnumber" value="<?php echo $selectedroom;?>">
													</form>
													</a>

												<a href="#">
													<form action="querypicture.php" method="post">
													<button type="submit" class="btn btn-white btn-danger btn-sm" name="deletepic" value="<?php echo $row['imagefile'];?>"><i class="ace-icon fa fa-times red"></i></button>
													<input type="hidden" name="deleteroomnumber" value="<?php echo $selectedroom;?>">
													</form>
												</a>
											</div>
										</li>
											<?php

										}
									
									}
									?>
									
										
									</ul>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div>

													</div><!-- /.row -->

													<div class="space-20"></div>

													
											</div>		
									<!--////////////////////////////////////////////////////////////////-->
								<div class="modal fade" id="roomeditmodal" role="dialog">
							   
								<div class="modal-dialog">
								<form action="manageroom.php" method="post">
								  <!-- Modal content-->
								  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal">&times;</button>
										  <h4 class="modal-title"><label> Edit Room Details | Room Number <?php echo $selectedroom;?></label></h4>
										</div>
										<div class="modal-body">
										 
											<div class="row">
												<form method="post" action="manageroom.php">
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Room Number</label>
										<div class="col-sm-9">
											
												<input type="text" id="roomnum" name="roomnum" value="<?php echo $selectedroom;?>" onkeypress="return isNumberKey(e);" readOnly>
											
										</div>
						</div>
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Room Name</label>
										<div class="col-sm-9">
											
												<input type="text"  id="roomcode" name="roomcode"  value="<?php echo $roomtype;?>" onkeypress="return alphaOnly(event);" required>
											
										</div>
						</div>
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Room Type</label>
										<div class="col-sm-9">
											
												<input type="text"  id="roomtype" name="roomtype" value="<?php echo $roomcode;?>"  onkeypress="return alphaOnly(event);" required>
											
										</div>
						</div>
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Room Rate</label>
										<div class="col-sm-9">
											
												<input type="text"  id="roomprice" name="roomprice" value="<?php echo $roomrate;?>"  onkeypress="return isNumberKey(event);" required>
											
										</div>
						</div>
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Max Guest</label>
										<div class="col-sm-9">
											
												<input type="number"  id="roomguest" name="roomguest" min="1" max="10" value="<?php echo $roompax;?>" onkeypress="return isNumberKey(event);" required>
											
										</div>
						</div>
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Room Details</label>
										<div class="col-sm-9">
											
											<textarea style="resize:none" name="roomdetails" value="<?php echo $roomdetails;?>" cols="30" rows="5" required></textarea>
											
										</div>
						</div>
					
						</form>

											
										</div>

										</div>
										<div class="modal-footer">
										  <button type="submit" name="editroominfo" class="btn btn-primary" >Edit</button>
										  <input type="hidden" name="searchroom" id="searchroom" value="1">
										  <input type="hidden" name="roomnums" id="roomnums" value="<?php echo $selectedroom?>">
										  
										</div> 
								  </div>
								  	</form>
								</div>
								
							  </div>
							  <!--jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj-->

												<div id="feed" class="tab-pane <?php if($activeequiptab==1) {?> in active <?php }?> ">
													<div class="row">
														<div class="col-xs-12">


										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th></th>
													<th>Item Number</th>
													<th>Item name</th>
													<th>Quantity</th>
													<th>Unit</th>
													<th>Damage fee</th>
													<th></th>
												</tr>
											</thead>

												<tbody>
										<?php
													if(isset($_POST['searcinventory']))
													{

														$itemid =$_POST['itemnumber'];
															//get data before dash
														$first = current(explode("-", $itemid));

																if (($pos = strpos($itemid, "-")) !== FALSE) 
																{ 
															    	$itemsubid = substr($itemid, $pos+1); 

																}
																else
																{

																	$itemsubid = 0;

																}

													echo $itemsubid;
														
														$searchtable = mysql_query("SELECT * FROM purchase_table WHERE purchase_id='$first' AND purchase_subid='$itemsubid'");
														
														if(!mysql_num_rows($searchtable))
						   								{
													   			?>
											   					<div class="alert alert-danger">
											   						No Result Found
											   					</div>

											   					<?php
													   			
													   	}
													   else
													   {
														while($row = mysql_fetch_array($searchtable))
											   			{
											   				$itemidsearch = $row['purchase_id']."-".$row['purchase_subid'];
											   				$status = $row['purchase_status'];
											   				
											   				if($status!='OK')
											   				{
											   					?>
													   					<div class="alert alert-danger">
													   						This Item is currently <?php echo $status;?>
													   					</div>

													   					<?php
													   					break;

											   				}
											   				else
											   				{
											   					if($itemidsearch == $itemid)
													   				{
													   					$showitemid = $itemid;
													   					$showname = $row['purchase_name'];
													   					$showunit = $row['purchase_unit'];
													   					$enablesave =1;
													   					break;
													   				}
													   				else
													   				{

													   				}
											   				}
													   				
													   				
											   			}

											   		}
											   		
													}

													?>
										<form action="manageroom.php" method="post">
												<tr>
													<td><button type="button" onclick="enabletextbox('<?php echo $counter;?>')"class="btn btn-xs btn-primary">
																<i class="ace-icon fa fa-plus-circle bigger-120"></i>
															</button></td>
													<td><input type="text" id="itemnumber" name="itemnumber" value="<?php echo $showitemid;?>" readonly>
														<button type="submit" id="searcinventory" name="searcinventory" class="btn btn-minier btn-success">
																<i class="ace-icon fa fa-check bigger-120"></i>
															</button> 
													<input type="hidden" name="roomnums" value="<?php echo $selectedroom;?>">
													</td>
										</form>
												<form action="manageroom.php" method="post">	
													<td><input type="text" id="itemname" name="itemname" value="<?php echo $showname;?>" readOnly></td>
													<td><input type="number" id ="itemqty" name="itemqty" value="1"  readOnly></td>
													<td><input type="text" id="itemunit" name="itemunit" value="<?php echo $showunit;?>" readOnly>
														<input type="hidden" id="itemcode" name="itemcode" value="<?php echo $itemidsearch;?>">
															</td>
													<td><input type="number" id ="itemdamagefee" name="itemdamagefee" value="<?php echo $row['Item_damagefee'];?>" required></td>
													
													<input type="hidden" name="counter" id="counter" value="<?php echo $counter;?>">
													<input type="hidden" name="selectedroomnumber"  id="selectedroomnumber" value="<?php echo $selectedroom;?>">
													<input type="hidden" name="searchroom" id="searchroom" value="1">
													<input type="hidden" name="roomnums"  id="roomnums" value="<?php echo $selectedroom;?>">
													<td>
														<div class="hidden-sm hidden-xs btn-group">
															
															<button type="submit" id="savebutton" name="savebutton" class="btn btn-xs btn-success" <?php if(isset($enablesave)){}else{ echo 'disabled';}?>>
																<i class="ace-icon fa fa-save bigger-120"></i>
															</button>
														</form>
															

															<button id="cancelbutton" name="cancelbutton" class="btn btn-xs btn-danger"  <?php if(isset($enable)){}else{ echo 'disabled';}?>>
																<i class="ace-icon fa fa-ban bigger-120"></i>
															</button>

														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
																		</a>
																	</li>
																	<li>
																		<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-ban bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>

											<?php

										}
										
										$counter = 0;
										$displayequipments = mysql_query("SELECT DISTINCT * FROM roominfo_table WHERE Room_number = '$selectedroom' ");
										
										if(!mysql_num_rows($displayequipments))
											{


											}	

											else
											{			
												while($row = mysql_fetch_array($displayequipments))
												{



												?>
										
												<form action="manageroom.php" method="post">
												<tr>
													<td></td>
													<td><input type="text" id="itemnumber<?php echo $counter;?>" name="itemnumber<?php echo $counter;?>" value="<?php echo $row['Item_number']."-".$row['Item_subid'];?>" readonly></td>
													<td><input type="text" id="itemname<?php echo $counter;?>" name="itemname<?php echo $counter;?>" value="<?php echo $row['Item_name'];?>" readonly></td>
													<td><input type="number" id ="itemqty<?php echo $counter;?>" name="itemqty<?php echo $counter;?>" value="<?php echo $row['Item_quantity'];?>" readonly></td>
													<td><input type="text" id="itemunit<?php echo $counter;?>" name="itemunit<?php echo $counter;?>"value="<?php echo $row['Item_unitofmeasure'];?>"  disabled="true">
														
														</td>
													<td><input type="number" id ="itemdamagefee<?php echo $counter;?>" name="itemdamagefee<?php echo $counter;?>" value="<?php echo $row['Item_damagefee'];?>" readonly></td>
													<input type="hidden" name="counter" id="counter" value="<?php echo $counter;?>">
													<input type="hidden" name="selectedroomnumber"  id="selectedroomnumber" value="<?php echo $selectedroom;?>">
													<input type="hidden" name="searchroom" id="searchroom" value="1">
													<input type="hidden" name="roomnums"  id="roomnums" value="<?php echo $selectedroom;?>">
													<td>
														<div class="hidden-sm hidden-xs btn-group">
															
															<button type="submit" id="saveeditbutton" name="saveeditbutton" class="btn btn-xs btn-success">
																<i class="ace-icon fa fa-save bigger-120"></i>
															</button>
														</form>
															<button type="button" onclick="editequipment('<?php echo $counter;?>')"id="editbutton" name="editbutton" class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</button>
															<form method="post" action="manageroom.php">
															<button type="submit" name="removeitembutton" id="removeitems" class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-times bigger-120"></i>
																</button>
																<input type="hidden" name="removeroomnum" name="removeroomnum" value="<?php echo $selectedroom;?>">
																<input type="hidden" id="removeitem<?php echo $counter;?>" name="removeitem<?php echo $counter;?>" value="<?php echo $row['Item_number']."-".$row['Item_subid'];?>">
																<input type="hidden" name="itemlistcount" id="itemlistcount" value="<?php echo $counter;?>">
																<input type="hidden" name="roomnums" value="<?php echo $selectedroom;?>">
																<input type="hidden" name="searchroom" id="searchroom" value="1">
															</form>
														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>


												<?php
												$counter++;
											}

											}

											?>
											

											<?php
											
											}
												?>

											</tbody>
										</table>
									</div>

											
																
															</div>

														
																</div>

																
															</div>

															
														</div><!-- /.col -->

														
													</div><!-- /.row -->

													
													
												</div><!-- /#feed -->

												
												
											</div>
										</div>
									</div>
								</div>
								<?php
									
							
						

								?>
							</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			

<?php require_once 'footer.php'; ?>