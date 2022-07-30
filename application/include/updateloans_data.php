<div class="row">	
		
	 <section class="content">

	        <div class="box box-success">
            <div class="box-body">
              <div class="table-responsive">
             <div class="box-body">

			 <div class="col-md-14">
             <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
              <li><a href="#tab_1 active" data-toggle="tab">Loan Information</a></li>
              <!-- <li class="active"><a href="#tab_2" data-toggle="tab">Additional Fees</a></li> -->
              <!-- <li><a href="#tab_3" data-toggle="tab">Attachment</a></li> -->
              <!-- <li><a href="#tab_4" data-toggle="tab">Collateral</a></li> -->
              <!-- <li><a href="#tab_5" data-toggle="tab">Payment Schedule</a></li> -->
              </ul>
             <div class="tab-content">
             <div class="tab-pane active" id="tab_1">
<?php
$id = $_GET['id'];
$pageid = $_GET['pageid'];
$loanQuery = "SELECT * FROM loans WHERE loanId = '$id'";
// echo $loanQuery;
$select = mysqli_query($link, $loanQuery) or die (mysqli_error($link));
while($row = mysqli_fetch_array($select))
{
// $borrower = $row['borrower'];   
?>           
			<form class="form-horizontal" method="post" enctype="multipart/form-data" action="process_loan_info.php">
			  <?php echo '<div class="alert alert-info fade in" >
			  <a href = "#" class = "close" data-dismiss= "alert"> &times;</a>
  				<strong>Note that&nbsp;</strong> &nbsp;&nbsp;Some Fields are Rquired.
				</div>'?>
				<div class="box-body">					
					<div class="row">	
						<div class="col-md-8">	
							<fieldset style="width:100%">	
								<legend>Loan Details</legend> 
								<div class="col-md-6">			
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-6">
											<label for="" class="control-label" style="color:#009900">Borrower ID</label>
										</div>
										<div class="col-md-6">			
											<?php
											$bid = $row['borrowerId'];
											$bidQuery = "SELECT * FROM borrowers where id = ".$bid;
											// echo $bidQuery;
											$b = mysqli_query($link, $bidQuery) or die (mysqli_error($link));
																		while($b_res = mysqli_fetch_array($b))
																	{     ?>    
											<input placeholder="<?php echo $b_res['id'],' - ',$b_res['lname'],', ',$b_res['fname']?>" name="borrorwerId1" type="number" class="form-control" readonly >
											<input type="hidden" value="<?php echo $bid ?>" name="borrowerId" type="number" class="form-control" readonly >
											<?php }?>
										</div>
									</div>	
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-6">
											<label for="" class="control-label" style="color:#009900">Loan No.</label>
										</div>
										<div class="col-md-6">
											<input value="<?php echo $row['loanId'] ; ?>" name="loanId" type="text" class="form-control" placeholder="Loan ID" readonly >
										</div>
									</div>
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-6">
											<label for="" class="control-label" style="color:#009900">Loan Type</label>
										</div>
										<div class="col-sm-6">
											<select name="loanType"  class="form-control" required>
												<option value="">Select a loan type&hellip;</option>
												<?php
													$lt = mysqli_query($link, "SELECT * FROM loan_types") or die (mysqli_error($link));
													while($lt_res = mysqli_fetch_array($lt))
												{         
												?>
												<option <?php if($row['loanType'] == $lt_res['loanCode']) echo 'selected="selected"'; ?>  value="<?php echo $lt_res['loanCode'] ?>"><?php echo $lt_res['loanName']," - ",$lt_res['repayPeriod']," months"  ?></option>
												<?php } ?>
											</select>              
										</div>
									</div>	
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-6">
											<label for="" class="control-label" style="color:#009900">Interest Rate</label>
										</div>
										<div class="col-md-6">
											<input value="<?php echo $row['interest'] ; ?>"  name="interest" type="number" class="form-control" placeholder="Interest" required>
										</div>
									</div>			
								</div>
								<div class="col-md-6">
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-6">
											<label for="" class="control-label" style="color:#009900">Repayment Method</label>
										</div>
										<div class="col-sm-6">
										<select name="repaymentMethod"  class="form-control" required>
												<option value="">Select a repayment method&hellip;</option>
												<?php
													$lt = mysqli_query($link, "SELECT * FROM calculation_method") or die (mysqli_error($link));
													while($lt_res = mysqli_fetch_array($lt))
												{         
												?>
												<option <?php if($row['calculationMethod'] == $lt_res['methodId']) echo 'selected="selected"'; ?>  value="<?php echo $lt_res['methodId'] ?>"><?php echo $lt_res['methodName']  ?></option>
												<?php } ?>
											</select>             
										</div>
									</div>
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-7">
											<label for="" class="control-label" style="color:#009900">Repayment Period (Months)</label>
										</div>
										<div class="col-md-5">
											<input value="<?php echo $row['loanPeriod'] ; ?>"  name="loanPeriod" type="number" class="form-control" placeholder="Loan Period" required>
										</div>
									</div>
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-6">
											<label for="" class="control-label" style="color:#009900">Loan Amount</label>
										</div>
										<div class="col-md-6">
											<input value="<?php echo $row['loanAmount'] ; ?>"  name="loanAmount" type="number" class="form-control" placeholder="Loan Amount" required>
										</div>
									</div>
								</div>
							</fieldset>	
						</div>
						<div class="col-md-4">
							<fieldset style="width:270px">
								<div class="col-md-12">	
									<legend>Gurantor</legend> 
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-4">
											<label for="" class="control-label" style="color:#009900">Name</label>
										</div>
										<div class="col-md-8">
											<input value="<?php echo $row['gName'] ; ?>" name="gName" type="text" class="form-control" placeholder="Name" >
										</div>
									</div>
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-4">
											<label for="" class="control-label" style="color:#009900">Address</label>
										</div>
										<div class="col-md-8">
											<input value="<?php echo $row['gAddress'] ; ?>" name="gAddress" type="text" class="form-control" placeholder="Address" >
										</div>
									</div>
									<div style="margin-bottom: 1rem" class="row">
										<div class="col-md-4">
											<label for="" class="control-label" style="color:#009900">Contact</label>
										</div>
										<div class="col-md-8">
											<input value="<?php echo $row['gContact'] ; ?>" name="gContact" type="text" class="form-control" placeholder="Contact" >
										</div>
									</div>
								</div>
							</fieldset>
						</div>						
						<input type="hidden" value="<?php echo $pageid; ?>" name="pageid" type="number" >
					</div>		
					<div class="box-footer">
						<button type="button" class="btn btn-success btn-flat" onclick="history.back()"><i class="fa fa-arrow-circle-left"></i></button>
						<button name="update_loan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Save</i></button>
					</div>	  
			 	</div>			 
			</form>
<?php } ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane " id="tab_2">
			  <form method="post">
			 			 <table>
<div align="center"><h4>Additional Fees</h4></div>
                <tbody> 
<?php
$id = $_GET['id'];
$search = mysqli_query($link, "SELECT * FROM additional_fees WHERE get_id = '$id'") or die (mysqli_error($link));
while($have = mysqli_fetch_array($search))
{
$idme= $have['id'];
?>			
				<tr>
				<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idme; ?>" checked></td>
				<td width="800"><input name="fee[]" type="text" class="form-control" placeholder="Fee" value="<?php echo $have['fee']; ?>"></td>
				<td width="300"><input name="amount[]" type="number" class="form-control" placeholder="Amount" value="<?php echo $have['Amount']; ?>"></td>
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
						echo "<script>window.location='updateloans.php?id=".$idm."&&mid=".base64_encode("405")."'; </script>";
							}
							else{
							for($i=0; $i < $N; $i++)
							{
								$result = mysqli_query($link,"DELETE FROM additional_fees WHERE id ='$id[$i]'");
								echo "<script>window.location='updateloans.php?id=".$idm."&&mid=".base64_encode("405")."'; </script>";
							}
							}
							}
?>

<?php
if(isset($_POST['add_fees_rows']))
{
$id = $_GET['id'];
$tid = $_SESSION['tid'];
$insert = mysqli_query($link, "INSERT INTO additional_fees(id,get_id,tid,fee,Amount) VALUES('','$id','$tid','','')") or die (mysqli_error($link));
if(!$insert)
{
echo "<script>alert('Unable to add row!!!'); </script>";
echo "<script>window.location='updateloans.php?id=".$id."&&mid=".base64_encode("405")."'; </script>";
}
else{
echo "<script>window.location='updateloans.php?id=".$id."&&mid=".base64_encode("405")."'; </script>";
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
echo "<script>window.location='updateloans.php?id=".$idm."&&mid=".base64_encode("405")."'; </script>";
}
else{
$i = 0;
foreach($_POST['selector'] as $s)
{
$fee = mysqli_real_escape_string($link, $_POST['fee'][$i]);
$amount = mysqli_real_escape_string($link, $_POST['amount'][$i]);
$update = mysqli_query($link, "UPDATE additional_fees SET fee = '$fee', Amount = '$amount' WHERE id = '$s'") or die (mysqli_error($link));
$i++;
if(!$update)
{
echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
}
else{
echo "<script>alert('Additional Fees/Payment Info Added Successfully!!'); </script>";
echo "<script>window.location='updateloans.php?id=".$idm."&&mid=".base64_encode("405")."'; </script>";
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

                Attachments
Accepted file types <span style="color:#FF0000">jpg, gif, png, xls, xlsx, csv, doc, docx, pdf</span>
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
	  $newname="document/".$rd2."_".$filename;      
	  //Check if the file with the same name is already exists on the server
 
        //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
			//successful upload
          // echo "It's done! The file has been saved as: ".$newname;		   

$insert = mysqli_query($link, "INSERT INTO attachment(id,get_id,tid,attached_file,date_time) VALUES('','$id','$tid','$newname',NOW())") or die (mysqli_error($link));
if(!$insert)
{
echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
}
else{
echo "<script>alert('Documents Added Successfully!!'); </script>";
}
}
}
}
}
?>
			 </form> 
              </div>
			
			<div class="tab-pane" id="tab_4">
<?php
$id = $_GET['id'];
$search = mysqli_query($link, "SELECT * FROM collateral WHERE idm = '$id'") or die (mysqli_error($link));
if(mysqli_num_rows($search)==1)
{
$row = mysqli_fetch_array($search);
?>			
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
<div align="center"><h4>Collateral</h4></div>
<div align="center">Fields in red are required</div>

				<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Name:</label>
                  <div class="col-sm-10">
                  <input name="name" type="text" class="form-control" value="<?php echo $row['name']; ?>">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Type of Collateral:</label>
                  <div class="col-sm-10">
                  <input name="tcol" type="text" class="form-control" value="<?php echo $row['type_of_collateral']; ?>">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Model:</label>
                  <div class="col-sm-10">
                  <input name="model" type="text" class="form-control" value="<?php echo $row['model']; ?>">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Make:</label>
                  <div class="col-sm-10">
                  <input name="make" type="text" class="form-control" value="<?php echo $row['make']; ?>">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Serial Number:</label>
                  <div class="col-sm-10">
                  <input name="snumber" type="text" class="form-control" value="<?php echo $row['serial_number']; ?>">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Estimated Price:</label>
                  <div class="col-sm-10">
                  <input name="eprice" type="text" class="form-control" value="<?php echo $row['estimated_price']; ?>">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Proof of Ownership:</label>
                  <div class="col-sm-10">
Accepted file types <span style="color:#FF0000">jpg, gif, png, xls, xlsx, csv, doc, docx, pdf</span>
			 <input name="uploaded_file" type="file" class="btn btn-info">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Image:</label>
                  <div class="col-sm-10">
Accepted file types <span style="color:#FF0000">jpg, png </span>
			 <input name="image" type="file" class="btn btn-info">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Observations:</label>
                  	<div class="col-sm-10">
					<textarea name="observe"  class="form-control" rows="4" cols="80"><?php echo $row['observation']; ?></textarea>
           			 </div>
          			</div>
			  
			  </form>
<?php
}
else{
?>
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
<div align="center"><h4>Collateral</h4></div>
<div align="center">Fields in red are required</div>

				<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Name:</label>
                  <div class="col-sm-10">
                  <input name="name" type="text" class="form-control">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Type of Collateral:</label>
                  <div class="col-sm-10">
                  <input name="type_of_collateral" type="text" class="form-control">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Model:</label>
                  <div class="col-sm-10">
                  <input name="model" type="text" class="form-control">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Make:</label>
                  <div class="col-sm-10">
                  <input name="make" type="text" class="form-control">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Serial Number:</label>
                  <div class="col-sm-10">
                  <input name="serial_number" type="text" class="form-control">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Estimated Price:</label>
                  <div class="col-sm-10">
                  <input name="estimated_price" type="text" class="form-control">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Proof of Ownership:</label>
                  <div class="col-sm-10">
Accepted file types <span style="color:#FF0000">jpg, gif, png, xls, xlsx, csv, doc, docx, pdf</span>
			 <input name="uploaded_file" type="file" class="btn btn-info">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Image:</label>
                  <div class="col-sm-10">
Accepted file types <span style="color:#FF0000">jpg, png </span>
			 <input name="image" type="file" class="btn btn-info">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Observations:</label>
                  	<div class="col-sm-10">
					<textarea name="observation"  class="form-control" rows="4" cols="80"></textarea>
           			 </div>
          			</div>
              
			 <div align="left">
              <div class="box-footer">
                				<button type="submit" class="btn btn-success btn-flat" name="submit"><i class="fa fa-save">&nbsp;Submit</i></button>
              </div>
			  </div>
<?php
if(isset($_POST['submit']))
{
$id = $_GET['id'];
$tid = $_SESSION['tid'];
$name = mysqli_real_escape_string($link, $_POST['name']);
$type_of_collateral = mysqli_real_escape_string($link, $_POST['type_of_collateral']);
$model = mysqli_real_escape_string($link, $_POST['model']);
$make = mysqli_real_escape_string($link, $_POST['make']);
$serial_number = mysqli_real_escape_string($link, $_POST['serial_number']);
$estimated_price = mysqli_real_escape_string($link, $_POST['estimated_price']);
$proof_of_ownership = mysqli_real_escape_string($link, $_POST['proof_of_ownership']);

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);
$image_size = getimagesize($_FILES['image']['tmp_name']);

move_uploaded_file($_FILES["image"]["tmp_name"], "cimage/".$_FILES["image"]["name"]);

$cimage = "cimage/".$_FILES['image']['name'];

$observation = mysqli_real_escape_string($link, $_POST['observation']);

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
	  $newname="document/".$rd2."_".$filename;      
	  //Check if the file with the same name is already exists on the server
 
        //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
			//successful upload
          // echo "It's done! The file has been saved as: ".$newname;		   

$insert = mysqli_query($link, "INSERT INTO collateral VALUES('','$id','$tid','$name','$type_of_collateral','$model','$make','$serial_number','$estimated_price','$proof_of_ownership','$cimage','$observation')") or die (mysqli_error($link));
if(!$insert)
{
echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
}
else{
echo "<script>alert('Collateral Added Successfully!!'); </script>";
echo "<script>window.location='updateloans.php?id=".$id."&&mid=".base64_encode("405")."'; </script>";
}
}
}
}
}
?>	  
			  </form>
<?php } ?>
              </div>                 
			  
			  <div class="tab-pane" id="tab_5">
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
			<div class="box-body">
<div align="center"><h4>Payment Schedule</h4></div>
				<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Term:</label>
                  <div class="col-sm-10">
				  <select name="d1[]" class="form-control">
				  <option value="Day">Day</option>
				  <option value="Week">Week</option>
				  <option value="Month">Month</option>
				  <option value="Year">Year</option>
				  </select>
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Term:</label>
                  <div class="col-sm-10">
				   <input name="term[]" type="text" class="form-control">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Schedule of Payment:</label>
                  <div class="col-sm-10">
				  <select name="schedule[]" class="form-control">
				  <option value="Daily">Daily</option>
				  <option value="Weekly">Weekly</option>
				  <option value="Bi-weekly">Bi-weekly</option>
				  <option value="Monthly">Monthly</option>
				  <option value="Bi-Monthly">Bi-Monthly</option>
				  <option value="Yearly">Yearly</option>
				  </select>
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Interest Rate:</label>
                  <div class="col-sm-10">
				   <input name="rate[]" type="text" class="form-control">%
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Penalty:</label>
                  <div class="col-sm-10">
				   <input name="penalty[]" type="text" class="form-control">%
                  </div>
                  </div>
				  
				   <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Schedules:</label>
                  <div class="col-sm-10">
				<table>
                <tbody> 
<?php
$id = $_GET['id'];
$searchin = mysqli_query($link, "SELECT * FROM pay_schedule WHERE get_id = '$id'") or die (mysqli_error($link));
while($haveit = mysqli_fetch_array($searchin))
{
$idmet= $haveit['id'];
?>			
				<tr>
			<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idmet; ?>" checked></td>
       <td width="400"><input name="schedulek[]" type="text" class="form-control pull-right" id="datepicker" placeholder="Schedule" value="<?php echo $haveit['schedule']; ?>"></td>
           <td width="300"><input name="balance[]" type="number" class="form-control" placeholder="Balance" value="<?php echo $haveit['balance']; ?>"></td>
			<td width="200"><input name="interest[]" type="number" class="form-control" placeholder="Interest" value="<?php echo $haveit['interest']; ?>"></td>
			<td width="100"><input name="payment[]" type="number" class="form-control" placeholder="Payment" value="<?php echo $haveit['payment']; ?>"></td>
			</tr>
<?php } ?>
				</tbody>
                </table>
<div align="left">
              <div class="box-footer">
                				<button type="submit" class="btn btn-success btn-flat" name="add_sch_rows"><i class="fa fa-plus">&nbsp;Add Row</i></button>
                				<button name="delrow2" type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash">&nbsp;Delete Row</i></button>

              </div>
			  </div>
   <?php
						if(isset($_POST['delrow2'])){
						$idm = $_GET['id'];
							$id=$_POST['selector'];
							$N = count($id);
						if($id == ''){
						echo "<script>alert('Row Not Selected!!!'); </script>";	
						echo "<script>window.location='updateloans.php?id=".$idm."&&mid=".base64_encode("405")."'; </script>";
							}
							else{
							for($i=0; $i < $N; $i++)
							{
								$result = mysqli_query($link,"DELETE FROM pay_schedule WHERE id ='$id[$i]'");
								echo "<script>window.location='updateloans.php?id=".$idm."&&mid=".base64_encode("405")."'; </script>";
							}
							}
							}
?>

<?php
if(isset($_POST['add_sch_rows']))
{
$id = $_GET['id'];
$tid = $_SESSION['tid'];
$insert = mysqli_query($link, "INSERT INTO pay_schedule(id,get_id,tid,schedule,balance,interest,payment) VALUES('','$id','$tid','','','','')") or die (mysqli_error($link));
if(!$insert)
{
echo "<script>alert('Unable to Add Row.....Please try again later!'); </script>";
}
else{
echo "<script>window.location='updateloans.php?id=".$id."&&mid=".base64_encode("405")."'; </script>";
}
}
?>
                  </div>
                  </div>
				  
              </div>
<div align="right">
              <div class="box-footer">
               <button type="submit" class="btn btn-info btn-flat" name="add_pay_schedule"><i class="fa fa-save">&nbsp;Update Collateral</i></button>

              </div>
			  </div>
<?php
if(isset($_POST['add_pay_schedule']))
{
$idm = $_GET['id'];
$id=$_POST['selector'];
$N = count($id);
if($N == 0){
echo "<script>alert('Row Not Selected!!!'); </script>";	
echo "<script>window.location='updateloans.php?id=".$idm."&&mid=".base64_encode("405")."'; </script>";
}
else{
$i = 0;
foreach($_POST['selector'] as $s)
{
$tid = $_SESSION['tid'];
$term = mysqli_real_escape_string($link, $_POST['term'][$i]);
$day = mysqli_real_escape_string($link, $_POST['d1'][$i]);
$schedule_of_paymt = mysqli_real_escape_string($link, $_POST['schedule'][$i]);
$interest = mysqli_real_escape_string($link, $_POST['interest'][$i]);
$penalty = mysqli_real_escape_string($link, $_POST['penalty'][$i]);
$schedule = mysqli_real_escape_string($link, $_POST['schedulek'][$i]);
$balance = mysqli_real_escape_string($link, $_POST['balance'][$i]);
$interest = mysqli_real_escape_string($link, $_POST['interest'][$i]);
$payment = mysqli_real_escape_string($link, $_POST['payment'][$i]);

$update = mysqli_query($link, "UPDATE pay_schedule SET schedule = '$schedule', balance = '$balance', interest = '$interest', payment = '$payment' WHERE id = '$s'") or die (mysqli_error($link));
$insert = mysqli_query($link, "INSERT INTO payment_schedule VALUES('','$s','$tid','$term','$day','$schedule_of_paymt','$interest','$penalty')") or die (mysqli_error($link));
$insert = mysqli_query($link, "UPDATE loan_info SET upstatus = 'Completed' WHERE id = '$idm'") or die (mysqli_error($link));
if(!($update && $insert))
{
echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
}
else{
echo "<script>alert('Payment Scheduled Successfully!!'); </script>";
echo "<script>window.location='listloans.php?id=".$idm."&&mid=".base64_encode("405")."'; </script>";
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