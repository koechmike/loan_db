<script type="text/javascript">
		$(document).ready(function()
        {
			$("#borrowerId").change(function(){
				// console.log(countyId);
				var borrowerId = $("#borrowerId").val();
				$.ajax({
					url: 'include/data.php',
					method: 'post',
					data: 'borrowerId=' + borrowerId
				}).done(function(loans){
					console.log(loans);
					loanDataParsed = JSON.parse(loans);
					$('#loanId').empty();			
					$('#loanId').append('<option>Select a loan&hellip;</option>')
					loanDataParsed.forEach(function(loanDataParsed){
						$('#loanId').append('<option value="'+loanDataParsed.loanId+'">' + loanDataParsed.loanId + '</option>')
					})
				})
			})
		})
		
		$(document).ready(function()
        {
			$("#loanId").change(function(){
				// console.log(countyId);
				var loanId = $("#loanId").val();
				$.ajax({
					url: 'include/data.php',
					method: 'post',
					data: 'loanId=' + loanId
				}).done(function(loanData){
					console.log(loanData);
					loanDataParsed = JSON.parse(loanData);
					// $('#loanId').empty();
					loanDataParsed.forEach(function(loanDataParsed){
						console.log(loanDataParsed.amountApproved - loanDataParsed.amountDisbursed);
						document.getElementById("disbursedAmount").value = loanDataParsed.amountApproved - loanDataParsed.amountDisbursed;
						document.getElementById("amountDisbursed").value = loanDataParsed.amountDisbursed;
						document.getElementById("amountApproved").value = loanDataParsed.amountApproved;
					})
				})
			})
		})

		$(document).ready(function()
        {
			$("#collector").change(function(){
				// console.log(countyId);
				var collector = $("#collector").val();
				var borrowerId = $("#borrowerId").val();
				if(collector == 1){
					$.ajax({
						url: 'include/data.php',
						method: 'post',
						data: '_borrowerId=' + borrowerId
					}).done(function(borrowerData){
						console.log(borrowerData);
						borrowerDataParsed = JSON.parse(borrowerData);
						// $('#loanId').empty();
						borrowerDataParsed.forEach(function(borrowerDataParsed){
							document.getElementById("cid").value = borrowerDataParsed.idNumber;
							document.getElementById("cname").value = borrowerDataParsed.fname + " " + borrowerDataParsed.lname;
						})
					})
				}else{					
					document.getElementById("cid").value = null;
					document.getElementById("cname").value = null;						
				}
			})
		})
		
</script>
<div class="row">	
	<section class="content">
        <div class="box box-success">
        	<div class="box-body">
            	<div class="table-responsive">
             		<div class="box-body">
						<div class="col-md-14">        
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
															<label for="" class="control-label" style="color:#009900">Borrower</label>
														</div>
														<div class="col-sm-6">									
															<select name="borrowerId" id="borrowerId" class="form-control" required>
																<option value="">Select a borrower&hellip;</option>
																<?php
																	$b = mysqli_query($link, "SELECT b.fname, b.lname, b.id FROM loan.borrowers as b inner join loans as l on l.borrowerId = b.id where l.status = 2;") or die (mysqli_error($link));
																	while($b_res = mysqli_fetch_array($b))
																{         
																?>
																<option value="<?php echo $b_res['id'] ?>"><?php echo $b_res['id'],' - ',$b_res['lname'],', ',$b_res['fname']?></option>
																<?php } ?>
															</select>   
														</div>
													</div>	
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-6">
															<label for="" class="control-label" style="color:#009900">Loan No.</label>
														</div>
														<div class="col-md-6">																
															<select name="loanId" id="loanId" class="form-control" required>		
															</select>
														</div>
													</div>	
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-6">
															<label for="" class="control-label" style="color:#009900">Loan Approved</label>
														</div>
														<div class="col-md-6">	
															<input value="" name="amountApproved" id="amountApproved" type="text" class="form-control" placeholder="0" readonly >
														</div>
													</div>	
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-6">
															<label for="" class="control-label" style="color:#009900">Amount Disbursed</label>
														</div>
														<div class="col-md-6">
															<input name="amountDisbursed" id="amountDisbursed" type="text" class="form-control" placeholder="0" readonly >
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-7">
															<label for="" class="control-label" style="color:#009900">Amount to Disburse</label>
														</div>
														<div class="col-md-5">
															<input name="disbursedAmount" id="disbursedAmount" type="text" title="Numbers only" pattern="^[0-9]*$"   class="form-control" placeholder="Amount in KES" required>
														</div>
													</div>
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-6">
															<label for="" class="control-label" style="color:#009900">Payment Method</label>
														</div>
														<div class="col-sm-6">
															<select name="paymentMethod"  class="form-control" required>
																<option value="">Select a payment method&hellip;</option>
																<?php
																	$lt = mysqli_query($link, "SELECT * FROM payment_method") or die (mysqli_error($link));
																	while($lt_res = mysqli_fetch_array($lt))
																{         
																?>
																<option <?php if($row['calculationMethod'] == $lt_res['methodId']) echo 'selected="selected"'; ?>  value="<?php echo $lt_res['methodId'] ?>"><?php echo $lt_res['methodName']  ?></option>
																<?php } ?>
															</select>             
														</div>
													</div>
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-6">
															<label for="" class="control-label" style="color:#009900">Transaction Reference</label>
														</div>
														<div class="col-md-6">
															<input value=""  name="transactionReference" type="text" class="form-control" placeholder="Reference" required>
														</div>
													</div>
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-5">
															<label for="" class="control-label" style="color:#009900">Capture Date</label>
														</div>
														<div class="col-md-7">
															<input name="captureDate" type="date" class="form-control" required>
														</div>	
													</div>
												</div>
											</fieldset>	
										</div>											
										<div class="col-md-4">	
											<fieldset style="width:100%">	
												<legend>Collector Details</legend>												
												<div class="col-md-12">
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-6">
															<label for="" class="control-label" style="color:#009900">Collector</label>
														</div>
														<div class="col-sm-6">
															<select name="collector" id="collector"  class="form-control" required>
																<option value="">Select an option</option>
																<option value="1">Borrower</option>
																<option value="2">Third Party</option>
															</select>             
														</div>
													</div>
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-6">
															<label for="" class="control-label" style="color:#009900">Collector Name</label>
														</div>
														<div class="col-md-6">
															<input value=""  name="cname" id="cname" type="text" class="form-control" >
														</div>
													</div>
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-5">
															<label for="" class="control-label" style="color:#009900">Collector ID Number</label>
														</div>
														<div class="col-md-7">
															<input name="cid" id="cid" type="text" class="form-control" >
														</div>	
													</div>
												</div>		
											</fieldset>
										</div> 					
										<input type="hidden" value="" name="pageid" type="text" title="Numbers only" pattern="^[0-9]*$"   >
									</div>		
									<div class="box-footer">
										<button type="button" class="btn btn-success btn-flat" onclick="history.back()"><i class="fa fa-arrow-circle-left"></i></button>
										<button name="disburse" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Disburse</i></button>
									</div>	  
								</div>			 
							</form>					
						</div>
                	</div>
				</div>	
			</div>
		</div>
	</section>		
</div>	