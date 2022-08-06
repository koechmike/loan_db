<script type="text/javascript">
		$(document).ready(function()
        {
			$("#countyId").change(function(){
				// console.log("test");
				var countyId = $("#countyId").val();
				$.ajax({
					url: 'include/data.php',
					method: 'post',
					data: 'countyId=' + countyId
				}).done(function(subcountyId){
					console.log(subcountyId);
					subcountyId = JSON.parse(subcountyId);
					$('#subcountyId').empty();
					subcountyId.forEach(function(subcountyId){
						$('#subcountyId').append('<option value="'+subcountyId.subcountyId+'">' + subcountyId.subcounty + '</option>')
					})
				})
			})
		})
</script>
<script type="text/javascript">
		$(document).ready(function()
        {
			$("#subcountyId").change(function(){
				var subcountyId = $("#subcountyId").val();
				$.ajax({
					url: 'include/data.php',
					method: 'post',
					data: 'subcountyId=' + subcountyId
				}).done(function(wardId){
					console.log(wardId);
					wardId = JSON.parse(wardId);
					$('#wardId').empty();
					wardId.forEach(function(wardId){
						$('#wardId').append('<option value="'+wardId.wardId+'">' + wardId.ward + '</option>')
					})
				})
			})
		})
</script>
<div class="row">       	
	<section class="content">     
		<?php echo '<div class="alert alert-warning fade in" >
			  		<a href = "#" class = "close" data-dismiss= "alert"> &times;</a>
  					<strong>Please Note that&nbsp;</strong> &nbsp;&nbsp;You Must Tick All Added Checkbox Before Clicking on update button below
					</div>'?>
	    <div class="box box-success">
            <div class="box-body">
              	<div class="table-responsive">
             		<div class="box-body">
			 			<div class="col-md-14">
             				<div class="nav-tabs-custom">
             					<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Personal Information</a></li>
									<li ><a href="#tab_2" data-toggle="tab">Financial Information</a></li>
									<li><a href="#tab_3" data-toggle="tab">Attachment</a></li>
              					</ul>
             					<div class="tab-content">
             						<div class="tab-pane" id="tab_1">
										<?php
										$id = $_GET['id'];
										$select = mysqli_query($link, "SELECT * FROM loan.borrowers as b inner join subcounty as s on b.subcounty = s.subcountyId inner join ward as w on b.ward = w.wardId WHERE id = '$id'") or die (mysqli_error($link));
										while($row = mysqli_fetch_array($select))
										{   
										?>              
										<form class="form-horizontal" method="post" enctype="multipart/form-data">
             								<div class="box-body">				
			 									<div class="row">	
													<div class="col-md-8">	
														<fieldset style="width:100%">	
															<legend>Personal Information</legend> 
															<div class="col-md-6">			
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-6">
																		<label for="" class="control-label" style="color:#009900">Borrower ID</label>
																	</div>
																	<div class="col-md-6">
																		<input value="<?php echo $row['id'];?>" name="borrorwerId" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Borrower ID" readonly >
																	</div>
																</div>
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-8">
																			<label for="" class="control-label" style="color:#009900">Salutations</label>
																	</div>
																	<div class="col-sm-4">
																	<select name="sid" id="sid" class="form-control" required>
																						<option value="">Select a salutation&hellip;</option>
																						<?php
																							$b = mysqli_query($link, "SELECT * FROM salutations") or die (mysqli_error($link));
																							while($b_res = mysqli_fetch_array($b))
																						{         
																						?>
																						<option <?php echo $b_res['sid'] == $row['salutation'] ? "selected" : null; ?> value="<?php echo $b_res['sid'] ?>"><?php echo $b_res['sinitials']   ?></option>
																						<?php } ?>
																					</select>                
																	</div>
																</div>
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-6">
																		<label for="" class="control-label" style="color:#009900">First Name</label>
																	</div>
																	<div class="col-md-6">
																		<input name="fname" value="<?php echo $row['fname'];?>" type="text" class="form-control" placeholder="First Name" required>
																	</div>
																</div>
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-6">
																		<label for="" class="control-label" style="color:#009900">Surname</label>
																	</div>
																	<div class="col-md-6">
																		<input  value="<?php echo $row['lname'];?>" name="lname" type="text" class="form-control" placeholder="Surname" required>
																	</div>
																</div>
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-6">
																		<label for="" class="control-label" style="color:#009900">Date of Birth</label>
																	</div>
																	<div class="col-md-6">
																		<input type="date" value="<?php echo $row['dob'];?>" max="<?php echo $newtime ?>" name="dob" type="text" class="form-control" placeholder="Date of Birth">
																	</div>
																</div>	
															</div>
															<div class="col-md-6">
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-6">
																		<label for="" class="control-label" style="color:#009900">ID Number</label>
																	</div>
																	<div class="col-md-6">
																		<input name="idNumber" value="<?php echo $row['idNumber'];?>" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="ID Number" required>
																	</div>
																</div>
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-6">
																		<label for="" class="control-label" style="color:#009900">Marital Status</label>
																	</div>
																	<div class="col-sm-6">
																		<select name="maritalStatus" value="<?php echo $row['maritalStatus'];?>"  class="form-control" required>
																			<option value="">Select an option&hellip;</option>
																			<option <?php echo 1 == $row['maritalStatus'] ? "selected" : null; ?> value="1">Single</option>
																			<option <?php echo 2 == $row['maritalStatus'] ? "selected" : null; ?> value="2">Married</option>
																			<option <?php echo 3 == $row['maritalStatus'] ? "selected" : null; ?> value="3">Divorced</option>
																		</select>                 
																	</div>
																</div>
															</div>
														</fieldset>	
													</div>
													<div class="col-md-4">
														<fieldset style="width:270px">
															<div class="col-md-12">	
																<legend>Address</legend> 
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-4">
																		<label for="" class="control-label" style="color:#009900">Address 1</label>
																	</div>
																	<div class="col-md-8">
																		<input name="address1" value="<?php echo $row['addrs1'];?>" type="text" class="form-control" placeholder="Address" required>
																	</div>
																</div>
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-4">
																		<label for="" class="control-label" style="color:#009900">Address 2</label>
																	</div>
																	<div class="col-md-8">
																		<input name="address2" value="<?php echo $row['addrs2'];?>" type="text" class="form-control" placeholder="Adress">
																	</div>
																</div>
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-4">
																			<label for="" class="control-label" style="color:#009900">County</label>
																	</div>
																	<div class="col-sm-8">
																	<select name="countyId" id="countyId" class="form-control" required>
																			<option value="">Select a county&hellip;</option>
																			<?php
																				$b = mysqli_query($link, "SELECT * FROM counties") or die (mysqli_error($link));
																				while($b_res = mysqli_fetch_array($b))
																			{         
																			?>
																			<option <?php echo $b_res['id'] == $row['countyId'] ? "selected" : null; ?> value="<?php echo $b_res['id'] ?>"><?php echo $b_res['county_name']   ?></option>
																			<?php } ?>
																		</select>                
																	</div>
																</div>
																<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-5">
																		<label for="" class="control-label" style="color:#009900">Sub-county</label>
																	</div>
																	<div class="col-md-7">
																		<select name="subcountyId" id="subcountyId" class="form-control" required>
																			<option selected value="<?php echo $row['subcountyId'] ?>"><?php echo $row['subcounty']   ?></option>
																		</select> 
																	</div>
																</div>
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-4">
																		<label for="" class="control-label" style="color:#009900">Ward</label>
																	</div>
																	<div class="col-sm-8">
																		<select name="wardId" id="wardId" class="form-control" required>
																			<option selected value="<?php echo $row['wardId'] ?>"><?php echo $row['ward']   ?></option>
																		</select>
																	</div>
																</div>
															</div>
														</fieldset>
													</div>
												</div>
												</br>
												<div class="row">
													<div class="col-md-4">
														<fieldset style="width:270px">	
															<legend>Other Information</legend> 
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-5">
																		<label for="" class="control-label" style="color:#009900">Proffession</label>
																</div>
																<div class="col-sm-7">
																<select name="pid" id="pid" class="form-control" required>
																					<option value="">Select a proffession&hellip;</option>
																					<?php
																						$b = mysqli_query($link, "SELECT * FROM proffession") or die (mysqli_error($link));
																						while($b_res = mysqli_fetch_array($b))
																					{         
																					?>
																					<option <?php echo $b_res['pid'] == $row['proffession'] ? "selected" : null; ?> value="<?php echo $b_res['pid'] ?>"><?php echo $b_res['pname']   ?></option>
																					<?php } ?>
																				</select>                
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class=" control-label" style="color:#009900">KRA Pin</label>
																</div>
																<div class="col-md-6">
																	<input name="krapin" value="<?php echo $row['krapin'];?>" type="text" class="form-control" placeholder="KRA Pin" >
																</div>
															</div>
														</fieldset>
													</div>
													<div class="col-md-4">
														<fieldset style="width:270px">	
															<legend>Contact</legend> 
															<div class="form-group" style="margin-bottom: 1rem" class="row">
																<div class="col-md-3">
																	<label for="" class="control-label" style="color:#009900">E-mail</label>
																</div>
																<div class="col-md-9">			
																	<input type="email" value="<?php echo $row['email'];?>" name="email" type="text" class="form-control" placeholder="Email">
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Phone Number</label>
																</div>
																<div class="col-md-6">
																	<input name="phone" value="<?php echo $row['phone'];?>" type="text" class="form-control" placeholder="Phone Number" required>
																</div>
															</div>
														</fieldset>
													</div>
												</div>
												</br>
												<div class="row">
													<div class="col-md-4">
														<fieldset style="width:270px">	
															<legend>Occupation</legend> 
															<div class="form-group" style="margin-bottom: 1rem" class="row">
																<div class="col-md-3">
																	<label for="" class="control-label" style="color:#009900">Employer</label>
																</div>
																<div class="col-md-9">			
																	<input name="powName" value="<?php echo $row['powName'];?>" type="text" class="form-control" placeholder="Place of work">
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Position</label>
																</div>
																<div class="col-md-6">
																	<input name="position" value="<?php echo $row['position'];?>" type="text" class="form-control" placeholder="Position" required>
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Address</label>
																</div>
																<div class="col-md-6">
																	<input name="powAddress" value="<?php echo $row['powAddress'];?>" type="text" class="form-control" placeholder="Address" required>
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Town</label>
																</div>
																<div class="col-md-6">
																	<input name="powTown" value="<?php echo $row['powTown'];?>" type="text" class="form-control" placeholder="Town" required>
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Contact</label>
																</div>
																<div class="col-md-6">
																	<input name="powContact" value="<?php echo $row['powContact'];?>" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Phone Number" required>
																</div>
															</div>
															<div class="form-group" style="margin-bottom: 1rem" class="row">
																<div class="col-md-3">
																	<label for="" class="control-label" style="color:#009900">E-mail</label>
																</div>
																<div class="col-md-9">			
																	<input type="email" value="<?php echo $row['powEmail'];?>" name="powEmail" type="text" class="form-control" placeholder="Email">
																</div>
															</div>
														</fieldset>
													</div>
													<div class="col-md-4">
														<fieldset style="width:270px">	
															<legend>Next of Kin</legend> 
															<div class="form-group" style="margin-bottom: 1rem" class="row">
																<div class="col-md-3">
																	<label for="" class="control-label" style="color:#009900">Name</label>
																</div>
																<div class="col-md-9">			
																	<input name="nokName" value="<?php echo $row['nokName'];?>" type="text" class="form-control" placeholder="Name">
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">ID Number</label>
																</div>
																<div class="col-md-6">
																	<input name="nokIdNumber" value="<?php echo $row['nokIdNumber'];?>" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="ID Number" required>
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Residence</label>
																</div>
																<div class="col-md-6">
																	<input name="nokResidence" value="<?php echo $row['nokResidence'];?>" type="text" class="form-control" placeholder="Residence" required>
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Contact</label>
																</div>
																<div class="col-md-6">
																	<input name="nokContact" value="<?php echo $row['nokContact'];?>" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Phone Number" required>
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-4">
																		<label for="" class="control-label" style="color:#009900">Proffession</label>
																</div>
																<div class="col-sm-8">
																	<select name="nokRelationship" id="nokRelationship" class="form-control" required>
																		<option value="">Select a relationship&hellip;</option>
																			<?php
																				$b = mysqli_query($link, "SELECT * FROM relationship") or die (mysqli_error($link));
																					while($b_res = mysqli_fetch_array($b))
																				{         
																			?>
																		<option <?php echo $b_res['rid'] == $row['nokRelationship'] ? "selected" : null; ?> value="<?php echo $b_res['rid'] ?>"><?php echo $b_res['rname']   ?></option>
																		<?php } ?>
																	</select>                
																</div>
															</div>
															<div class="form-group" style="margin-bottom: 1rem" class="row">
																<div class="col-md-3">
																	<label for="" class="control-label"style="color:#009900">E-mail</label>
																</div>
																<div class="col-md-9">			
																	<input type="email" value="<?php echo $row['nokEmail'];?>" name="nokEmail" type="text" class="form-control" placeholder="Email">
																</div>
															</div>
														</fieldset>
													</div>
													<div class="col-md-4">
														<fieldset style="width:270px">	
															<legend>Introducer</legend> 
															<div class="form-group" style="margin-bottom: 1rem" class="row">
																<div class="col-md-3">
																	<label for="" class="control-label" style="color:#009900">Name</label>
																</div>
																<div class="col-md-9">			
																	<input name="iName" type="text" value="<?php echo $row['iName'];?>" class="form-control" placeholder="Name">
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">ID Number</label>
																</div>
																<div class="col-md-6">
																	<input name="iIdNumber"  value="<?php echo $row['iIdNumber'];?>" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="ID Number" required>
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Residence</label>
																</div>
																<div class="col-md-6">
																	<input name="iResidence" value="<?php echo $row['iResidence'];?>" type="text" class="form-control" placeholder="Residence" required>
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Contact</label>
																</div>
																<div class="col-md-6">
																	<input name="iContact" value="<?php echo $row['iContact'];?>" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Phone Number" required>
																</div>
															</div>
															<div style="margin-bottom: 1rem" class="row">
																<div class="col-md-6">
																	<label for="" class="control-label" style="color:#009900">Date of Birth</label>
																</div>
																<div class="col-md-6">
																	<input type="date"  value="<?php echo $row['iDob'];?>" max="<?php echo $newtime ?>"  name="iDob" type="text" class="form-control" placeholder="dd-mm-yyyy">
																</div>
															</div>
														</fieldset>
													</div>
												</div>
											</div>			 
											<div align="right">
												<div class="box-footer">
													<button type="reset" class="btn btn-primary btn-flat"><i class="fa fa-times">&nbsp;Reset</i></button>
													<button name="save" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Save</i></button>
												</div>
											</div>			  
										</form> 
										<?php } ?>
              						</div>
              					<!-- /.tab-pane -->
              					<div class="tab-pane active" id="tab_2">
 									<form method="post">
			 							<table>
											<th></th>
											<th align="center" width="400">Occupation</th>
											<th align="center" width="300">Monthly Income</th>
											<tbody> 
												<?php
												$id = $_GET['id'];
												$search = mysqli_query($link, "SELECT * FROM fin_info WHERE get_id = '$id'") or die (mysqli_error($link));
												while($have = mysqli_fetch_array($search))
												{
												$idme= $have['id'];
												?>			
												<tr>
													<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idme; ?>" checked></td>
													<td width="800"><input name="occupation[]" type="text" class="form-control" placeholder="Occupation" value="<?php echo $have['occupation']; ?>"></td>
													<td width="300"><input name="mincome[]" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Amount" value="<?php echo $have['mincome']; ?>"></td>
												</tr>
												<?php } ?>
											</tbody>
                						</table>
										<div align="left">
              								<div class="box-footer">
												<button type="submit" class="btn btn-success btn-flat" name="add_fees_rows"><i class="fa fa-plus">&nbsp;Add Row</i></button>
												<button name="delrow" type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash">&nbsp;Delete Row</i></button>

              								</div>
			  							</div>
										<?php
										if(isset($_POST['delrow'])){
										$idm = $_GET['id'];
											$id=$_POST['selector'];
											$N = count($id);
										if($N == 0){
										echo "<script>alert('Row Not Selected!!!'); </script>";	
										echo "<script>window.location='updateborrowers.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											else{
											for($i=0; $i < $N; $i++)
											{
												$result = mysqli_query($link,"DELETE FROM fin_info WHERE id ='$id[$i]'");
												echo "<script>window.location='updateborrowers.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											}
											}
										?>

										<?php
										if(isset($_POST['add_fees_rows']))
										{
										$id = $_GET['id'];
										$tid = $_SESSION['tid'];
										$insert = mysqli_query($link, "INSERT INTO fin_info(id,get_id,tid,occupation,mincome) VALUES('','$id','$tid','','')") or die (mysqli_error($link));
										if(!$insert)
										{
										echo "<script>alert('Unable to add row!!!'); </script>";
										echo "<script>window.location='updateborrowers.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
										}
										else{
										echo "<script>window.location='updateborrowers.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
										}
										}
										?>
										<div align="right">
              								<div class="box-footer">
												<button type="submit" class="btn btn-info btn-flat" name="add_fees"><i class="fa fa-save">&nbsp;Update Additional Fees</i></button>
											</div>
										</div>
										<?php
										if(isset($_POST['add_fees']))
										{
										$idm = $_GET['id'];
										$id = $_POST['selector'];
										if($id == ''){
										echo "<script>alert('Row Not Selected!!!'); </script>";	
										echo "<script>window.location='updateborrowers.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
										}
										else{
										$i = 0;
										foreach($_POST['selector'] as $s)
										{
										$fee = mysqli_real_escape_string($link, $_POST['occupation'][$i]);
										$amount = mysqli_real_escape_string($link, $_POST['mincome'][$i]);
										$update = mysqli_query($link, "UPDATE fin_info SET occupation = '$fee', mincome = '$amount' WHERE id = '$s'") or die (mysqli_error($link));
										$i++;
										if(!$update)
										{
										echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
										}
										else{
										echo "<script>alert('Additional Fees/Payment Info Added Successfully!!'); </script>";
										echo "<script>window.location='updateborrowers.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
										}
										}
										}
										}
										?>
									</form>
								</div>
								<!-- /.tab-pane -->
              					<div class="tab-pane" id="tab_3">
               						<form class="form-horizontal" method="post" enctype="multipart/form-data">
                					Attachments, accepted file types 
									<span style="color:#FF0000">jpg, gif, png, xls, xlsx, csv, doc, docx, pdf</span>
									<input name="uploaded_file" type="file" class="btn btn-info">
										<div align="left">
											<div class="box-footer">
												<button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-upload">&nbsp;Upload</i></button>
											</div>
										</div>
										<?php
										if(isset($_POST['upload']))
										{
											$id = $_GET['id'];
											$tid = $_SESSION['tid'];

											//upload random name/number
											$rd2 = mt_rand(1000,9999)."_File"; 
										
											//Check that we have a file
											if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
												//Check if the file is JPEG image and it's size is less than 350Kb
												$filename = basename($_FILES['uploaded_file']['name']);
										
												$ext = substr($filename, strrpos($filename, '.') + 1);
										
												if (($ext != "exe") && ($_FILES["uploaded_file"]["type"] != "application/x-msdownload"))  {
													//Determine the path to which we want to save this file      
													//$newname = dirname(__FILE__).'/upload/'.$filename;
													$newname="bdocument/".$rd2."_".$filename;      
													//Check if the file with the same name is already exists on the server
											
													//Attempt to move the uploaded file to it's new place
													if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
														//successful upload
														// echo "It's done! The file has been saved as: ".$newname;		   

														$insert = mysqli_query($link, "INSERT INTO battachment(id,get_id,tid,attached_file,date_time) VALUES('','$id','$tid','$newname',NOW())") or die (mysqli_error($link));
														$insert = mysqli_query($link, "UPDATE borowers SET status = 'Completed' WHERE id = '$id'") or die (mysqli_error($link));
														if(!$insert)
														{
															echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
														}else{
															echo "<script>alert('Documents Added Successfully!!'); </script>";
															echo "<script>window.location='listborrowers.php?id=".$_SESSION['tid']."'; </script>";
														}
													}
												}
											}
										}
										?>
			 						</form> 
              					</div>
              				<!-- /.tab-pane -->
            				</div>
            			<!-- /.tab-content -->
          				</div>				
					</div>
				</div>	
			</div>	
		</div>
	</div>	
</div>