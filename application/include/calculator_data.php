<?php 
	$calculationMethod = $_POST['calculationMethod'];
	echo "calcMethod: ".$calculationMethod;
	echo "calcMethod: ".$_POST['rate'];
if(isset($_POST['calculationMethod'])){
	$calculationMethod =  $_POST['calculationMethod'];
	echo "calcMethod: ".$calculationMethod;
	switch($calculationMethod){
		case 1:
			break;
		case 2:
			break;
		case 3:
			$apr = $_POST['rate'];
			$term = $_POST['term'];
			$loan = $_POST['loanAmount'];
			echo "apr: ".$$apr;
			echo "term: ".$$term;
			echo "loan: ".$loan;
			$emi = (($loan*($apr/(100*12)))/(1-((1+($apr/(100*12)))**(0-$term))));
			break;
		default:
			break;
	}

}



// echo (int)$emi;

?>

<div class="row">
   	<section class="content">
   	<div class="box box-success">
      	<div class="box-body">
        	<div class="table-responsive">
            	<div class="box-body">
					<form class="form-horizontal" method="post" enctype="multipart/form-data" action="">
						<div class="box-body">			
							<div class="row">	
								<div class="col-md-8">	
									<fieldset style="width:100%">	
										<legend>Loan Details</legend> 
										<div class="col-md-6">			
											<div style="margin-bottom: 1rem" class="row">
												<div class="col-md-4">
													<label for="" class="control-label" style="color:#009900">Borrower ID</label>
												</div>
												<div class="col-md-8">
													<select data-live-search="true" name="calculationMethod" id="calculationMethod"   class="form-control selectpicker" required>
														<option value="">Select a method&hellip;</option>
                                                        <option value="1">Straight Line</option>
                                                        <option value="2">Reducing Balance</option>
                                                        <option value="3">Armotized</option>
													</select>
												</div>								
											</div>			
											<div style="margin-bottom: 1rem" class="row">
												<div class="col-md-4">
													<label for="" class="control-label" style="color:#009900">Loan Amount</label>
												</div>
												<div class="col-md-8">
													<input name="loanAmount" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Amount" required>
												</div>								
											</div>			
											<div style="margin-bottom: 1rem" class="row">
												<div class="col-md-4">
													<label for="" class="control-label" style="color:#009900">Interest Rate</label>
												</div>
												<div class="col-md-8">
													<input name="rate" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Rate" required>
												</div>								
											</div>			
											<div style="margin-bottom: 1rem" class="row">
												<div class="col-md-4">
													<label for="" class="control-label" style="color:#009900">Period</label>
												</div>
												<div class="col-md-8">
													<input name="period" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Period" required>
												</div>								
											</div>	
										</div>						
									</fieldset>	
								</div>
							</div>	
						</div>			 
			  			<div align="right">
              				<div class="box-footer">
                				<button type="reset" class="btn btn-primary btn-flat"><i class="fa fa-times">&nbsp;Reset</i></button>
                				<button name="calculationMethod" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Save</i></button>
              				</div>
			  			</div>
			  		</form>
	               	<hr>
    	           	<table id="example1" class="table table-bordered table-striped">
        	          	<thead>
            	        	<tr>
                	        	<th width="50">Month</th>
                    	    	<th>EMI</th>
	                        	<th>Principle</th>
    	                  	 	<th>Interest</th>
        	            	    <th>Balance</th>
            	         	</tr>
                	  	</thead>
	                  	<tbody>
						<?php
						  	for($i = 1; $i <= $term ; $i++){
								// echo "Month: ".$i."<br/>";
								$interest = $loan * (($apr/12)/100);
								$principle = $emi - $interest;
								$loan = $loan - $principle;
								// echo "EMI: ".ROUND($emi)."<br/>";
								// echo "Principle: ".ROUND($principle)."<br/>";
								// echo "Interest: ".ROUND($interest)."<br/>";
								// echo "Balance: ".ROUND($loan)."<br/>";
								// echo "<br/>";							
						?>
    	                 	<tr>
								<td><?php echo $i ?></td>
								<td><?php echo ROUND($emi) ?></td>
								<td><?php echo ROUND($principle) ?></td>
								<td><?php echo ROUND($interest) ?></td>
								<td><?php echo ROUND($loan) ?></td>
	                     	</tr>
						<?php } ?>	
    	              	</tbody>
        	       	</table>			
            	</div>
         	</div>
      	</div>
   	</div>
</div>