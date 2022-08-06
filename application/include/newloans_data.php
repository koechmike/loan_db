<script type="text/javascript">
		$(document).ready(function()
        {
			$("#loanCode").change(function(){
				console.log("test");
				var loanCode = $("#loanCode").val();
				var borrowerId = $("#borrowerId").val();
				$.ajax({
					url: 'include/data.php',
					method: 'post',
					data: 'loanCode=' + loanCode
				}).done(function(loanType){
					console.log(loanType);
					loanTypeData = JSON.parse(loanType);
					// $('#subcountyId').empty();
					loanTypeData.forEach(function(loanTypeData){
						console.log(loanTypeData.interestRate);
						document.getElementById("interestRate").value = loanTypeData.interestRate;
						document.getElementById("repayMethodName").value = loanTypeData.methodName;
						document.getElementById("loanPeriod").value = loanTypeData.repayPeriod;
						document.getElementById("maxPeriod").value = loanTypeData.repayPeriod;
					})
				})

				$.ajax({
					url: 'include/data.php',
					method: 'post',
					data: {
							borrower: borrowerId,
							loanTypeCode : loanCode 
						}
				}).done(function(res){	

					function addLeadingZeros(num, totalLength) {
						return String(num).padStart(totalLength, '0');
					}

					if(res.length == 4){
						newLoanCode = loanCode + addLeadingZeros(borrowerId, 3) + '001';
						console.log(newLoanCode);
						document.getElementById("loanId").value = newLoanCode;
					}else{
						result = JSON.parse(res);
						result.forEach(function(result){
							let text = result.loanId;
							let loanCodePA = text.substr(0, 7);
							let loanNo = parseInt(text.substr(7, 9)) + 1;

							loanId = loanCodePA + addLeadingZeros(loanNo, 2).toString(); 
							console.log(result.loanTypeCode);
							document.getElementById("loanId").value = loanId;
						})
					}
				})
			})
		})
</script>  
<?php
if(isset($_GET['updated']))
{
	if($_GET['updated'] == 'false' ){
		echo "<div class='alert alert-error'>Unable to save loan application: ".$_GET['error']."</div>";
	}else{
		echo "<div class='alert alert-success'>Loan application created successfully!</div>";
	}
}
?>
<div class="box">
        
	       <div class="box-body">
			<div class="panel panel-success">
            <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-dollar"></i>&nbsp;New Loans</h3>
            </div>
             <div class="box-body">

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
									<select name="borrowerId" id="borrowerId"  class="form-control" required>
										<option value="">Select a borrower&hellip;</option>
                                        <?php
                                        	$b = mysqli_query($link, "SELECT * FROM borrowers") or die (mysqli_error($link));
                                            while($b_res = mysqli_fetch_array($b))
                                        {         
                                        ?>
                                        <option value="<?php echo $b_res['id'] ?>"><?php echo $b_res['id'],' - ',$b_res['lname'],', ',$b_res['fname']   ?></option>
                                        <?php } ?>
                                    </select>   
									<!-- <input name="borrorwerId" type="number" class="form-control" placeholder="Borrower ID" readonly > -->
								</div>
							</div>	
							<div style="margin-bottom: 1rem" class="row">
								<div class="col-md-6">
									<label for="" class="control-label" style="color:#009900">Loan Type</label>
								</div>
								<div class="col-sm-6">
									<select name="loanCode" id="loanCode"  class="form-control" required>
										<option value="">Select a loan type&hellip;</option>
                                        <?php
                                        	$lt = mysqli_query($link, "SELECT * FROM loan_types") or die (mysqli_error($link));
                                            while($lt_res = mysqli_fetch_array($lt))
                                        {         
                                        ?>
                                        <option value="<?php echo $lt_res['loanCode'] ?>"><?php echo $lt_res['loanName']," - ",$lt_res['repayPeriod']," months"  ?></option>
                                        <?php } ?>
                                    </select>              
								</div>
							</div>	
							<div style="margin-bottom: 1rem" class="row">
								<div class="col-md-6">
									<label for="" class="control-label" style="color:#009900">Loan No.</label>
								</div>
								<div class="col-md-6">
										<?php
                                        	$b = mysqli_query($link, "SELECT max(loanId) as `loanId` FROM loans") or die (mysqli_error($link));
                                            while($b_res = mysqli_fetch_array($b))
                                        	{
												$newLoanId = $b_res['loanId'] + 1;
											}         
                                        ?>
									<input style="text-transform:uppercase" name="loanId" id="loanId" type="text" class="form-control" placeholder="Loan ID" readonly>
								</div>
							</div>
							<div style="margin-bottom: 1rem" class="row">
								<div class="col-md-6">
									<label for="" class="control-label" style="color:#009900">Interest Rate</label>
								</div>
								<div class="col-md-6">
									<input  type="text" title="Numbers only" pattern="^[0-9]*$"  name="interestRate" id="interestRate" class="form-control" placeholder="Interest" required>
								</div>
							</div>			
						</div>
						<div class="col-md-6">
							<div style="margin-bottom: 1rem" class="row">
								<div class="col-md-6">
									<label for="" class="control-label" style="color:#009900">Repayment Method</label>
								</div>
								<div class="col-sm-6">
									<input  name="repayMethodName"  id="repayMethodName" type="text" class="form-control" placeholder="Repayment Method" required readonly>    
								</div>
							</div>
							<div style="margin-bottom: 1rem" class="row">
								<div class="col-md-7">
									<label for="" class="control-label" style="color:#009900">Repayment Period (Months)</label>
								</div>
								<div class="col-md-5">
									<input type="text" title="Numbers only" pattern="^[0-9]*$"  name="loanPeriod" id="loanPeriod" class="form-control" placeholder="Loan Period" required>
								</div>
							</div>
							<div style="margin-bottom: 1rem" class="row">
								<div class="col-md-6">
									<label for="" class="control-label" style="color:#009900">Loan Amount</label>
								</div>
								<div class="col-md-6">
									<input  name="loanAmount" type="text" title="Numbers only" pattern="^[0-9]*$"  class="form-control" placeholder="Loan Amount" required>
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
									<input name="gName" type="text" class="form-control" placeholder="Name" >
								</div>
							</div>
							<div style="margin-bottom: 1rem" class="row">
								<div class="col-md-4">
									<label for="" class="control-label" style="color:#009900">Address</label>
								</div>
								<div class="col-md-8">
									<input name="gAddress" type="text" class="form-control" placeholder="Address" >
								</div>
							</div>
							<div style="margin-bottom: 1rem" class="row">
								<div class="col-md-4">
									<label for="" class="control-label" style="color:#009900">Contact</label>
								</div>
								<div class="col-md-8">
									<input name="gContact" type="text" class="form-control" placeholder="Contact" >
								</div>
							</div>
							<div style="margin-bottom: 1rem" class="row">
								<div class="col-md-5">
									<label for="" class="control-label" style="color:#009900">ID Number</label>
								</div>
								<div class="col-md-7">
									<input name="gIdNumber" type="text" class="form-control" placeholder="ID Number" >
								</div>
							</div>
							<input hidden name="maxPeriod" id="maxPeriod" type="number">
						</div>
					</fieldset>
				</div>
			</div>

<!-- 			
			 <div class="form-group">
                <label for="" class="col-sm-2 control-label" style="color:#009900">Borrower</label>
				 <div class="col-sm-10">
                <select name="borrower" class="customer select2" style="width: 100%;">
				<option selected="selected">--Select Customer Account--</option>
				<?php
				$get = mysqli_query($link, "SELECT * FROM borrowers order by id") or die (mysqli_error($link));
				while($rows = mysqli_fetch_array($get))
				{
				echo '<option value="'.$rows['id'].'">'.$rows['fname'].'&nbsp;'.$rows['lname'].'</option>';
				}
				?>
                </select>
              </div>
			  </div>
			  
			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Account</label>
                  <div class="col-sm-10">
                  <select class="account select2" name="account" style="width: 100%;">
				<option selected="selected">--Select Customer Account--</option>
                  <?php
				$getin = mysqli_query($link, "SELECT * FROM borrowers order by id") or die (mysqli_error($link));
				while($row = mysqli_fetch_array($getin))
				{
				echo '<option value="'.$row['id'].'">'.$row['account'].'</option>';
				}
				?>
				</select>
                  </div>
                  </div>
				 
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Amount</label>
                  <div class="col-sm-10">
                  <input name="amount" type="text" class="form-control" placeholder="Amount" required>
                  </div>
                  </div>
		
		 <div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Description</label>
                  	<div class="col-sm-10">
					<textarea name="desc"  class="form-control" rows="4" cols="80"></textarea>
           			 </div>
					 </div>
		
		 <div class="form-group">
                <label for="" class="col-sm-2 control-label" style="color:#009900">Date Release</label>
			 <div class="col-sm-10">
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="date_release" type="date" class="form-control pull-right" id="datepicker">
                </div>
              </div>
			  </div>
			  
			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Agent</label>
                  <div class="col-sm-10">
<?php
$tid = $_SESSION['tid'];
$sele = mysqli_query($link, "SELECT * from user WHERE id = '$tid'") or die (mysqli_error($link));
while($row = mysqli_fetch_array($sele))
{
?>
                  <input name="agent" type="text" class="form-control" value="<?php echo $row['name']; ?>" readonly>
<?php } ?>
                  </div>
                  </div>
	<hr>	
<div class="alert-danger">&nbsp;GUARANTOR INFORMATION</div>
<hr>
				  
			<div class="form-group">
				<label for="" class="col-sm-2 control-label" style="color:#009900">Gurantor's Passport</label>
				<div class="col-sm-10">
  		  		<input type='file' name="image" onChange="readURL(this);" /required>
       			 <img id="blah"  src="../avtar/user2.png" alt="Image Here" height="100" width="100"/>
			</div>
			</div>
			
			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Relationship</label>
                  <div class="col-sm-10">
                  <input name="grela" type="text" class="form-control" placeholder="Relationship" required>
                  </div>
                  </div>
			
			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Guarantor's Name</label>
                  <div class="col-sm-10">
                  <input name="g_name" type="text" class="form-control" required placeholder = "Guarantor's Name">
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Guarantor's Phone Number</label>
                  <div class="col-sm-10">
                  <input name="g_phone" type="text" class="form-control" required placeholder = "Guarantor's Name">
                  </div>
                  </div>
				  
				 
				 <div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Guarantor's Address</label>
                  	<div class="col-sm-10">
					<textarea name="gaddress"  class="form-control" rows="4" cols="80"></textarea>
           			 </div>
          	</div> 
			
			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Status</label>
                  <div class="col-sm-10">
                  <input name="status" type="text" class="form-control" value="Pending" readonly="readonly">
                  </div>
                  </div>
				  					
			<div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Remarks</label>
                  	<div class="col-sm-10">
					<textarea name="remarks"  class="form-control" rows="4" cols="80"></textarea>
           			 </div>
          	</div>
			
<hr>	
<div class="alert-danger">&nbsp;PAYMENT INFORMATION</div>
<hr>	
					
					 <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Current Balance</label>
                  <div class="col-sm-10">
                  <input name="user" type="text" class="form-control" value="0.00" readonly>
                  </div>
                  </div>
				  
				   <div class="form-group">
                <label for="" class="col-sm-2 control-label" style="color:#009900">Payment Date</label>
			 <div class="col-sm-10">
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="pay_date" type="date" class="form-control pull-right" id="datepicker2">
                </div>
              </div>
			  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Amount to Pay</label>
                  <div class="col-sm-10">
                  <input name="amount_topay" type="number" class="form-control" placeholder="Amount to Pay" >
                  </div>
                  </div>
				  
				  <div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Teller By</label>
                  <div class="col-sm-10">
<?php
$tid = $_SESSION['tid'];
$sele = mysqli_query($link, "SELECT * from user WHERE id = '$tid'") or die (mysqli_error($link));
while($row = mysqli_fetch_array($sele))
{
?>
                  <input name="teller" type="text" class="form-control" value="<?php echo $row['name']; ?>" readonly>
<?php } ?>
                  </div>
                  </div>
				
				
				<div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Remarks</label>
                  	<div class="col-sm-10">
					<textarea name="remark"  class="form-control" rows="4" cols="80"></textarea>
           			 </div>
          	</div> -->
				  
			 </div>
			 
			 
			  <div align="right">
              <div class="box-footer">
                				<button type="reset" class="btn btn-primary btn-flat"><i class="fa fa-times">&nbsp;Reset</i></button>
                				<button name="save_loan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Save</i></button>

              </div>
			  </div>
			  </form>
			  

           
</div>	
</div>
</div>
</div>