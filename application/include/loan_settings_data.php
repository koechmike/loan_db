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
									<li class="active"><a href="#tab_1" data-toggle="tab">Loan Types</a></li>
									<li><a href="#tab_2" data-toggle="tab">Payment Methods</a></li>
              					</ul>
             					<div class="tab-content">
             						<div class="tab-pane" id="tab_1">
										<?php
										$id = $_GET['id'];
										$select = mysqli_query($link, "SELECT * FROM borrowers WHERE id = '$id'") or die (mysqli_error($link));
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
																		<input value="<?php echo $row['id'];?>" name="borrorwerId" type="number" class="form-control" placeholder="Borrower ID" readonly >
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div style="margin-bottom: 1rem" class="row">
																	<div class="col-md-6">
																		<label for="" class="control-label" style="color:#009900">ID Number</label>
																	</div>
																	<div class="col-md-6">
																		<input name="idNumber" value="<?php echo $row['idNumber'];?>" type="number" class="form-control" placeholder="ID Number" required>
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
																		<label for="" vclass="control-label" style="color:#009900">County</label>
																	</div>
																	<div class="col-sm-8">
																		<select name="County" value="<?php echo $row['fnaCountyme'];?>"  class="form-control" required>
																			<option value="">Select a country&hellip;</option>
																			<option value="AF">Baringo</option>
																			<option value="AL">Bomet</option>
																			<option value="DZ">Bungoma</option>
																			<option value="AD">Busia</option>
																			<option value="AO">Elgeyo Marakwet</option>
																			<option value="AI">Embu</option>
																			<option value="AQ">Garissa</option>
																			<option value="AG">Homa Bay</option>
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
															<div class="form-group" style="margin-bottom: 1rem" class="row">
																<div class="col-md-3">
																	<label for="" class="control-label" style="color:#009900">Profession</label>
																</div>
																<div class="col-md-9">			
																	<input name="Profession" value="<?php echo $row['fname'];?>" type="text" class="form-control" placeholder="Profession" >
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
															<div class="form-group" style="margin-bottom: 1rem" class="row">
																<div class="col-md-4">
																	<label for="" class="control-label" style="color:#009900">Relationship</label>
																</div>
																<div class="col-md-8">			
																	<select name="nokRelationship" value="<?php echo $row['nokRelationship'];?>" class="form-control" required>
																		<option value="">Select an option&hellip;</option>
																		<option value="1">Brother</option>
																		<option value="2">Sister</option>
																		<option value="3">Father</option>
																		<option value="4">Mother</option>
																		<option value="5">Son</option>
																		<option value="6">Daughter</option>
																	</select>           
																</div>
															</div>
														</fieldset>
													</div>
													<div class="col-md-4">
														<fieldset style="width:270px">	
															<legend>Introducer</legend> 
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
											<th align="center" width="400">Code</th>
											<th align="center" width="300">Name</th>
											<th align="center" width="300">Repay Method</th>
											<th align="center" width="300">Repay Period</th>
											<th align="center" width="300">Interest Rate</th>
											<th align="center" width="300">Require Guarantor</th>
											<tbody> 
												<?php
												$id = $_GET['id'];
												$search = mysqli_query($link, "SELECT * FROM loan_types") or die (mysqli_error($link));
												while($have = mysqli_fetch_array($search))
												{                                                    
												$idme= $have['loanCode'];
												?>			
												<tr>
													<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idme; ?>" checked></td>
													<td width="800"><input readonly name="loanCode[]" type="number" class="form-control" placeholder="Loan Code" value="<?php echo $have['loanCode']; ?>"></td>
													<td width="800"><input name="loanName[]" type="text" class="form-control" placeholder="Loan Name" value="<?php echo $have['loanName']; ?>"></td>
													<td width="300"><input name="repayMethod[]" type="text" class="form-control" placeholder="Repay Method" value="<?php echo $have['repayMethod']; ?>"></td>
													<td width="300"><input name="repayPeriod[]" type="number" class="form-control" placeholder="Repay Period" value="<?php echo $have['repayPeriod']; ?>"></td>
													<td width="300"><input name="interestRate[]" type="number" class="form-control" placeholder="Interest Rate" value="<?php echo $have['interestRate']; ?>"></td>
													<td width="300"><input name="requireGuarantor[]" type="text" class="form-control" placeholder="Require Guarantor" value="<?php echo $have['requireGuarantor']; ?>"></td>
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
										echo "<script>window.location='loan_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											else{
											for($i=0; $i < $N; $i++)
											{
												$result = mysqli_query($link,"DELETE FROM loan_types WHERE loanCode ='$id[$i]'");
												echo "<script>window.location='loan_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											}
											}
										?>

										<?php
										if(isset($_POST['add_fees_rows']))
										{
										$loanName = $_GET['loanName'];
										$repayMethod = $_GET['repayMethod'];
										$repayPeriod = $_GET['repayPeriod'];
										$interestRate = $_GET['interestRate'];
										$requireGuarantor = $_GET['requireGuarantor'];
										// $tid = $_SESSION['tid'];
										$insert = mysqli_query($link, "INSERT INTO loan_types(loanCode,loanName,repayMethod,repayPeriod,interestRate,requireGuarantor) VALUES(null,'$loanName','$repayMethod',$repayPeriod,$interestRate,$requireGuarantor)") or die (mysqli_error($link));
										if(!$insert)
										{
										echo "<script>alert('Unable to add row!!!'); </script>";
										echo "<script>window.location='loan_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
										}
										else{
										echo "<script>window.location='loan_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
										}
										}
										?>
										<div align="right">
              								<div class="box-footer">
												<button type="submit" class="btn btn-info btn-flat" name="add_fees"><i class="fa fa-save">&nbsp;Update Loan Types</i></button>
											</div>
										</div>
										<?php
										if(isset($_POST['add_fees']))
										{
										$idm = $_GET['id'];
										$id = $_POST['selector'];
										if($id == ''){
										echo "<script>alert('Row Not Selected!!!'); </script>";	
										echo "<script>window.location='loan_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
										}
										else{
										$i = 0;
										foreach($_POST['selector'] as $s)
										{
										$fee = mysqli_real_escape_string($link, $_POST['occupation'][$i]);
										$amount = mysqli_real_escape_string($link, $_POST['mincome'][$i]);
										$update = mysqli_query($link, "UPDATE loan_types SET loanName = '$loanName', repayMethod = '$repayMethod', repayPeriod = '$repayPeriod', interestRate = '$interestRate', requireGuarantor = '$requireGuarantor'  WHERE loanCode = '$loanCode'") or die (mysqli_error($link));
										$i++;
										if(!$update)
										{
										echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
										}
										else{
										echo "<script>alert('Loan Type Added Successfully!!'); </script>";
										echo "<script>window.location='loan_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
										}
										}
										}
										}
										?>
									</form>
								</div>
								<!-- /.tab-pane -->
              					<div class="tab-pane" id="tab_3">
 									<form method="post">
			 							<table>
											<th></th>
											<th align="center" width="400">ID</th>
											<th align="center" width="300">Payment Method</th>
											<tbody> 
												<?php
												$id = $_GET['id'];
												$search = mysqli_query($link, "SELECT * FROM payment_method") or die (mysqli_error($link));
												while($have = mysqli_fetch_array($search))
												{                                                    
												$idme= $have['methodId'];
												?>			
												<tr>
													<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idme; ?>" checked></td>
													<td width="800"><input readonly name="methodId[]" type="number" class="form-control" placeholder="ID" value="<?php echo $have['methodId']; ?>"></td>
													<td width="300"><input name="methodName[]" type="text" class="form-control" placeholder="Payment Method" value="<?php echo $have['methodName']; ?>"></td>
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
										echo "<script>window.location='loan_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											else{
											for($i=0; $i < $N; $i++)
											{
												$result = mysqli_query($link,"DELETE FROM payment_method WHERE methodId ='$id[$i]'");
												echo "<script>window.location='loan_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											}
											}
										?>

										<?php
										if(isset($_POST['add_fees_rows']))
										{
										$loanName = $_GET['methodName'];
										// $tid = $_SESSION['tid'];
										$insert = mysqli_query($link, "INSERT INTO payment_method(methodId,methodName) VALUES(null,'$methodName')") or die (mysqli_error($link));
										if(!$insert)
										{
										echo "<script>alert('Unable to add row!!!'); </script>";
										echo "<script>window.location='loan_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
										}
										else{
										echo "<script>window.location='loan_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
										}
										}
										?>
										<div align="right">
              								<div class="box-footer">
												<button type="submit" class="btn btn-info btn-flat" name="add_fees"><i class="fa fa-save">&nbsp;Update Payment Method</i></button>
											</div>
										</div>
										<?php
										if(isset($_POST['add_fees']))
										{
										$idm = $_GET['id'];
										$id = $_POST['selector'];
										if($id == ''){
										echo "<script>alert('Row Not Selected!!!'); </script>";	
										echo "<script>window.location='loan_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
										}
										else{
										$i = 0;
										foreach($_POST['selector'] as $s)
										{
										$fee = mysqli_real_escape_string($link, $_POST['occupation'][$i]);
										$amount = mysqli_real_escape_string($link, $_POST['mincome'][$i]);
										$update = mysqli_query($link, "UPDATE payment_method SET methodName = '$methodName' WHERE methodId = '$methodId'") or die (mysqli_error($link));
										$i++;
										if(!$update)
										{
										echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
										}
										else{
										echo "<script>alert('Loan Type Added Successfully!!'); </script>";
										echo "<script>window.location='loan_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
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