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
									<li class="active"><a href="#tab_1" data-toggle="tab">Loans</a></li>
									<li class="<?php if($_POST['pmactive'] == true){ echo "pmactive";}; ?>"><a href="#tab_2" data-toggle="tab">Borrowers</a></li>
              					</ul>
             					<div class="tab-content ">
                                    <div class="tab-pane active" id="tab_1">                                          
                                        <div class="row">	
                                            <div class="col-md-3">                                                    
                                                <form method="post" action="include/reports/loans_report.php">  
                                                    <fieldset style="width:100%">	
                                                        <legend>Loans Report</legend> 
                                                        <div class="col-md-12">			
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-4">
                                                                    <label for="" class="control-label" style="color:#009900">Type</label>
                                                                  </div>
                                                                <div class="col-md-8">                                                                    
                                                                    <select name="reportType"  class="form-control" required>
                                                                        <option value="">Select a report type&hellip;</option>
                                                                        <option value="0">Pending Appraisal</option>
                                                                        <option value="1">Pending Approval</option>
                                                                        <option value="2">Pending Disbursement</option>
                                                                        <option value="3">Partially Disbursed</option>
                                                                        <option value="4">Fully Disbursed</option>
                                                                        <option value="5">Partially Paid</option>
                                                                        <option value="6">Fully Paid</option>
                                                                        <option value="7">Overdue</option>
                                                                    </select>
                                                                </div>								
                                                            </div>		
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-5">
                                                                    <label for="" class="control-label" style="color:#009900">From</label>
                                                                  </div>
                                                                <div class="col-md-7">
                                                                    <input type="date" name="from" type="text" class="form-control">
                                                                </div>								
                                                            </div>	
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-5">
                                                                    <label for="" class="control-label" style="color:#009900">To</label>
                                                                </div>
                                                                <div class="col-sm-7">  
                                                                <input type="date" name="to" type="text" class="form-control">          
                                                                </div>
                                                            </div>	
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-6">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button style="float: right;" name="save" type="submit" class="btn btn-success btn-flat"><i class="fa fa-file-pdf-o">&nbsp;Generate Report</i></button>              
                                                                </div>
                                                            </div>			
                                                        </div>
                                                    </fieldset>	
                                                </form>
                                            </div>                      
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">                                          
                                        <div class="row">	
                                            <div class="col-md-3">                                                    
                                                <form method="post" action="include/reports/borrowers_report.php">  
                                                    <fieldset style="width:100%">	
                                                        <legend>New Borrower Report</legend> 
                                                        <div class="col-md-12">			
                                                            <!-- <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-4">
                                                                    <label for="" class="control-label" style="color:#009900">Type</label>
                                                                  </div>
                                                                <div class="col-md-8">                                                                    
                                                                    <select name="reportType"  class="form-control" required>
                                                                        <option value="">Select a report type&hellip;</option>
                                                                        <option value="0">Active Borrowers</option>
                                                                        <option value="1">Borrowers with loans</option>
                                                                    </select>
                                                                </div>								
                                                            </div>		 -->
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-5">
                                                                    <label for="" class="control-label" style="color:#009900">From</label>
                                                                  </div>
                                                                <div class="col-md-7">
                                                                    <input type="date" name="from" type="text" class="form-control">
                                                                </div>								
                                                            </div>	
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-5">
                                                                    <label for="" class="control-label" style="color:#009900">To</label>
                                                                </div>
                                                                <div class="col-sm-7">  
                                                                <input type="date" name="to" type="text" class="form-control">          
                                                                </div>
                                                            </div>
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-6">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button style="float: right;" name="newBorrower" type="submit" class="btn btn-success btn-flat"><i class="fa fa-file-pdf-o">&nbsp;Generate Report</i></button>              
                                                                </div>
                                                            </div>			
                                                        </div>
                                                    </fieldset>	
                                                </form>
                                            </div>
                                            <div class="col-md-3">                                                    
                                                <form method="post" action="include/reports/borrowers_report.php">  
                                                    <fieldset style="width:100%">	
                                                        <legend>Borrower Report</legend> 
                                                        <div class="col-md-12">			
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-4">
                                                                    <label for="" class="control-label" style="color:#009900">Type</label>
                                                                  </div>
                                                                <div class="col-md-8">                                                                    
                                                                    <select name="borrowerType"  class="form-control" required>
                                                                        <option value="">Select a report type&hellip;</option>
                                                                        <option value="0">Active Borrowers</option>
                                                                        <option value="1">Borrowers with loans</option>
                                                                    </select>
                                                                </div>								
                                                            </div>		
                                                            <!-- <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-5">
                                                                    <label for="" class="control-label" style="color:#009900">From</label>
                                                                  </div>
                                                                <div class="col-md-7">
                                                                    <input type="date" name="from" type="text" class="form-control">
                                                                </div>								
                                                            </div>	
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-5">
                                                                    <label for="" class="control-label" style="color:#009900">To</label>
                                                                </div>
                                                                <div class="col-sm-7">  
                                                                <input type="date" name="to" type="text" class="form-control">          
                                                                </div>
                                                            </div>	 -->
                                                            <div style="margin-bottom: 1rem" class="row">
                                                                <div class="col-md-6">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button style="float: right;" name="borrowersReport" type="submit" class="btn btn-success btn-flat"><i class="fa fa-file-pdf-o">&nbsp;Generate Report</i></button>              
                                                                </div>
                                                            </div>			
                                                        </div>
                                                    </fieldset>	
                                                </form>
                                            </div>                      
                                        </div>
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
    </section>
</div>