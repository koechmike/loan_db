<?php 
if(isset($_POST['calculationMethod'])){
	$calculationMethod = mysqli_real_escape_string($link, $_POST['calculationMethod']);	
	switch($calculationMethod){
		case 1:
			$apr = $_POST['rate'];
			$term = $_POST['term'];
			$loan = $_POST['loanAmount'];
			$loanBalance = $loan;
			
			$interest = ($loan * ($apr/100) * ($term/12));
			$emi = ($loan + $interest) / $term;

			$periodRes = array();
			$emiRes = array();
			$principleRes = array();
			$interestRes = array();
			$loanRes = array();
			$principleTotal = 0;
			$interestTotal = 0;
			$balanceTotal = 0;


			// array_push($periodRes, 0);
			// array_push($emiRes, 0);
			// array_push($principleRes, 0);
			// array_push($interestRes, 0);
			// array_push($loanRes, $loanBalance);

			for($i = 1; $i <= $term ; $i++){
				$principle = $emi - ($interest/$term);
				$loanBalance = $loanBalance - $principle;

				array_push($periodRes, $i);
				array_push($emiRes, $emi);
				array_push($principleRes, $principle);
				array_push($interestRes, ($interest/$term));
				array_push($loanRes, $loanBalance);

				$principleTotal = $principleTotal + $principle;
				$interestTotal = $interest;
				$balanceTotal = $balanceTotal + $loan;
			}
			break;
		case 2:
			$apr = $_POST['rate'];
			$term = $_POST['term'];
			$loan = $_POST['loanAmount'];
			$emi = (($loan*($apr/(100*12)))/(1-((1+($apr/(100*12)))**(0-$term))));

			$periodRes = array();
			$emiRes = array();
			$principleRes = array();
			$interestRes = array();
			$loanRes = array();
			$principleTotal = 0;
			$interestTotal = 0;
			$balanceTotal = 0;

			for($i = 1; $i <= $term ; $i++){
				$interest = $loan * (($apr/12)/100);
				$principle = $emi - $interest;
				$loan = $loan - $principle;

				array_push($periodRes, $i);
				array_push($emiRes, $emi);
				array_push($principleRes, $principle);
				array_push($interestRes, $interest);
				array_push($loanRes, $loan);

				$principleTotal = $principleTotal + $principle;
				$interestTotal = $interestTotal + $interest;
				$balanceTotal = $balanceTotal + $loan;
			}
			break;
		case 3:
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
													<select name="calculationMethod" class="form-control selectpicker" required>
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
													<input name="term" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Period" required>
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
                				<button name="calculate" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Calculate</i></button>
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
        	            	    <th>Loan Balance</th>
            	         	</tr>
                	  	</thead>
	                  	<tbody>
						<?php
							foreach($periodRes as $i){
						?>		
    	                 	<tr>
								<td><?php echo $periodRes[$i-1] ?></td>
								<td><?php echo ROUND($emiRes[$i-1]) ?></td>
								<td><?php echo ROUND($principleRes[$i-1]) ?></td>
								<td><?php echo ROUND($interestRes[$i-1]) ?></td>
								<td><?php echo ROUND($loanRes[$i-1]) ?></td>
	                     	</tr>
						<?php } ?>	
    	              	</tbody>
						<tfooter>
            	        	<tr>
                	        	<td width="50"></td>
                    	    	<td></td>
	                        	<th><?php echo ROUND($principleTotal);?></th>
    	                  	 	<th><?php echo ROUND($interestTotal);?></th>
        	            	    <th></th>
            	         	</tr>
                	  	</tfooter>
        	       	</table>			
            	</div>
         	</div>
      	</div>
   	</div>
</div>