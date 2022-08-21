<div class="row">
   	<section class="content">
   	<div class="box box-success">
      	<div class="box-body">
        	<div class="table-responsive">
            	<div class="box-body">
					<form class="form-horizontal" method="post" enctype="multipart/form-data" action="process_loan_info.php">
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
													<select data-live-search="true" name="borrowerId" id="borrowerId"   class="form-control selectpicker" required>
														<option value="">Select a method&hellip;</option>
                                                        <option <?php if($have['repayMethod'] == 1) echo 'selected="selected"'; ?> value="1">Straight Line</option>
                                                        <option <?php if($have['repayMethod'] == 2) echo 'selected="selected"'; ?>  value="2">Reducing Balance</option>
                                                                <option <?php if($have['repayMethod'] == 3) echo 'selected="selected"'; ?>  value="3">Armotized</option>
                                                                <!-- <?php
                                                                    $pm = mysqli_query($link, "SELECT * FROM payment_method") or die (mysqli_error($link));
                                                                    while($ph_res = mysqli_fetch_array($pm))
                                                                    {         
                                                                ?>
                                                                <option <?php if($methodName_res['methodName'] == $ph_res['methodName']) echo 'selected="selected"'; ?> value="<?php echo $ph_res['methodId'] ?>"><?php echo $ph_res['methodName'] ?></option>
                                                                <?php } ?> -->
													</select>
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
                				<button name="save_loan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Save</i></button>
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
    	                 	<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
	                     	</tr>
    	              	</tbody>
        	       	</table>			
            	</div>
         	</div>
      	</div>
   	</div>
</div>