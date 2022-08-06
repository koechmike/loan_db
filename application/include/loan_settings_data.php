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
									<li class="<?php if($_POST['pmactive'] == true){ echo "pmactive";}; ?>"><a href="#tab_2" data-toggle="tab">Payment Methods</a></li>
              					</ul>
             					<div class="tab-content ">
                                    <div class="tab-pane active" id="tab_1">
                                        <form method="post">
                                            <table>
                                                <th></th>
                                                <th align="center" width="400">Code</th>
                                                <th align="center" width="300">Name</th>
                                                <th align="center" width="300">Repayment Method</th>
                                                <th align="center" width="300">Repayment Period</th>
                                                <!-- <th align="center" width="300">Interest Rate</th> -->
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
                                                        <td width="300"><input style="text-transform:uppercase" required name="loanCode[]" type="text" title="Code should be exactly three letters" pattern="^\w{3}$" class="form-control" placeholder="Loan Code" value="<?php echo $have['loanCode']; ?>"></td>
                                                        <td width="800"><input required name="loanName[]" type="text" class="form-control" placeholder="Loan Name" value="<?php echo $have['loanName']; ?>"></td>
                                                        <td width="300">
                                                            <?php
                                                                $methodId = $have['repayMethod'];
                                                                $getPmQuery = "SELECT * FROM payment_method where methodId = $methodId ";//+$methodId;
                                                                //echo $getPmQuery;
                                                                $pm_current = mysqli_query($link, $getPmQuery) or die (mysqli_error($link));
                                                                $methodName_res = mysqli_fetch_array($pm_current);
                                                            ?>
                                                            <select name="repayMethod[]"  class="form-control" value="<?php echo $methodName_res['methodName']; ?>" required>
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
                                                            <!-- <input required name="repayMethod[]" type="text" class="form-control" placeholder="Repay Method" value="<?php echo $have['repayMethod']; ?>"> -->
                                                        </td>
                                                        <td width="300"><input required name="repayPeriod[]" type="text" title="Numbers only" pattern="^[0-9]*$" class="form-control" placeholder="Repay Period" value="<?php echo $have['repayPeriod']; ?>"></td>
                                                        
                                                        <!-- <td width="300"><input required name="interestRate[]" type="number" class="form-control" placeholder="Interest Rate" value="<?php echo $have['interestRate']; ?>"></td> -->
                                                        <td width="300">
                                                            <select name="requireGuarantor[]"  class="form-control"  required>
                                                              
                                                                <option <?php if($have['requireGuarantor'] == 1) echo 'selected="selected"'; ?> value="1">YES</option>
                                                                <option <?php if($have['requireGuarantor'] == 0) echo 'selected="selected"'; ?> value="0">NO</option>
                                                                
                                                            </select>       
                                                            <!-- <input required name="repayMethod[]" type="text" class="form-control" placeholder="Repay Method" value="<?php echo $have['repayMethod']; ?>"> -->
                                                        </td>
                                                        <!-- <td width="300"><input required name="requireGuarantor[]" type="text" class="form-control" placeholder="Require Guarantor" value="<?php echo $have['requireGuarantor']; ?>"></td> -->
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
                                            $query = "INSERT INTO loan_types(loanCode,loanName,repayMethod,repayPeriod,interestRate,requireGuarantor) VALUES(null,'',1,null,null,1)";
                                            //echo $query;
                                            $insert = mysqli_query($link, $query) or die (mysqli_error($link));
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
                                            }else{
                                                $i = 0;
                                                foreach($_POST['selector'] as $s)
                                                {
                                                    $loanCode = mysqli_real_escape_string($link, $_POST['loanCode'][$i]);
                                                    $loanName = mysqli_real_escape_string($link, $_POST['loanName'][$i]);
                                                    $repayMethod = mysqli_real_escape_string($link, $_POST['repayMethod'][$i]);
                                                    $repayPeriod = mysqli_real_escape_string($link, $_POST['repayPeriod'][$i]);
                                                    $interestRate = 0;//mysqli_real_escape_string($link, $_POST['interestRate'][$i]);
                                                    $requireGuarantor = mysqli_real_escape_string($link, $_POST['requireGuarantor'][$i]);
                                                    $updateQuery = "UPDATE loan_types SET loanName = '$loanName', repayMethod = '$repayMethod', repayPeriod = '$repayPeriod', interestRate = '$interestRate', requireGuarantor = '$requireGuarantor'  WHERE loanCode = '$loanCode'";
                                                    echo $updateQuery;
                                                    $update = mysqli_query($link, $updateQuery) or die (mysqli_error($link));
                                                    $i++;
                                                    if(!$update)
                                                    {
                                                        echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
                                                    }else{
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
                                    <div class="tab-pane <?php if($_POST['pmactive'] == true){ echo "pmactive";}; ?>" id="tab_2">
                                        <form method="post">
                                            <table>
                                                <th></th>
                                                <!-- <th align="center" width="400">ID</th> -->
                                                <th align="center" width="300">Payment Modes</th>
                                                <tbody> 
                                                    <?php
                                                    $id = $_GET['id'];
                                                    $search = mysqli_query($link, "SELECT * FROM payment_method") or die (mysqli_error($link));
                                                    while($have = mysqli_fetch_array($search))
                                                    {                                                    
                                                    $idme= $have['methodId'];
                                                    $pmactive = true; 
                                                    ?>			
                                                    <tr>
                                                        <td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idme; ?>" checked></td>
                                                        <td style="display:none; width="800"><input name="methodId[]" type="number" class="form-control" placeholder="ID" value="<?php echo $have['methodId']; ?>"></td>
                                                        <td width="300"><input required name="methodName[]" type="text" class="form-control" placeholder="Payment Method" value="<?php echo $have['methodName']; ?>"></td>
                                                        <input type="hidden" value="<?php echo $pmactive ?>" name="pmactive" />
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <div align="left">
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-success btn-flat" name="add_payment_method_rows"><i class="fa fa-plus">&nbsp;Add Row</i></button>
                                                    <button name="delrow_paymentMethod" type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash">&nbsp;Delete Row</i></button>
                                                </div>
                                            </div>
                                            <?php
                                            if(isset($_POST['delrow_paymentMethod'])){
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
                                            if(isset($_POST['add_payment_method_rows']))
                                            {
                                            $methodName = $_GET['methodName'];
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
                                                    <button type="submit" class="btn btn-info btn-flat" name="add_payment_method"><i class="fa fa-save">&nbsp;Update Payment Method</i></button>
                                                </div>
                                            </div>
                                            <?php
                                            if(isset($_POST['add_payment_method']))
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
                                            $methodId = mysqli_real_escape_string($link, $_POST['methodId'][$i]);
                                            $methodName = mysqli_real_escape_string($link, $_POST['methodName'][$i]);
                                            $updatePaymentMethdoQuery = "UPDATE payment_method SET methodName = '$methodName' WHERE methodId = '$methodId'";
                                            echo $updatePaymentMethdoQuery;
                                            $update = mysqli_query($link, $updatePaymentMethdoQuery) or die (mysqli_error($link));
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
    </section>
</div>