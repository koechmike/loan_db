<div class="row">	
	<section class="content">
        <div class="box box-success">
        	<div class="box-body">
            	<div class="table-responsive">
             		<div class="box-body">
						<div class="col-md-14">
							<?php
							$id = $_GET['id'];
							$pageid = $_GET['pageid'];
							$loanQuery = "SELECT * FROM loans WHERE loanId = '$id'";
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
															<label for="" class="control-label" style="color:#009900">Borrower</label>
														</div>
														<div class="col-sm-6">
															<?php
															$bid = $row['borrowerId'];
															$bidQuery = "SELECT * FROM borrowers where id = ".$bid;
															// echo $bidQuery;
															$b = mysqli_query($link, $bidQuery) or die (mysqli_error($link));
																						while($b_res = mysqli_fetch_array($b))
																					{     ?>    
															<input value="<?php echo $b_res['id'],' - ',$b_res['lname'],', ',$b_res['fname']?>" name="borrorwerId1" type="text" class="form-control" readonly >
															<?php }?>        
														</div>
													</div>	
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-6">
															<label for="" class="control-label" style="color:#009900">Loan Amount</label>
														</div>
														<div class="col-md-6">	
															<input value="<?php echo $row['loanAmount'] ?>" name="loanAmount" type="text" class="form-control" placeholder="0" readonly >
														</div>
													</div>	
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-6">
															<label for="" class="control-label" style="color:#009900">Amount Disbursed</label>
														</div>
														<div class="col-md-6">
															<input value="<?php echo $row['amountDisbursed'] ?>" name="amountDisbursed" type="text" class="form-control" placeholder="0" readonly >
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div style="margin-bottom: 1rem" class="row">
														<div class="col-md-7">
															<label for="" class="control-label" style="color:#009900">Amount to Disburse</label>
														</div>
														<div class="col-md-5">
															<input value=""  name="disbursedAmount" type="number" class="form-control" placeholder="Amount in KES" required>
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
												</div>
											</fieldset>	
										</div>					
										<input type="hidden" value="<?php echo $id; ?>" name="loanId" type="number" >
										<input type="hidden" value="<?php echo $pageid; ?>" name="pageid" type="number" >
									</div>		
									<div class="box-footer">
										<button type="button" class="btn btn-success btn-flat" onclick="history.back()"><i class="fa fa-arrow-circle-left"></i></button>
										<button name="disburse" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Disburse</i></button>
									</div>	  
								</div>			 
							</form>
							<?php } ?> 						
						</div>
                	</div>
				</div>	
			</div>
		</div>
	</section>		
</div>	