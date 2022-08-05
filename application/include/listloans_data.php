<?php 
$pageid = $_GET['pageid'];
?>
<div class="row">       
		    <section class="content">  
	        <div class="box box-success">
            <div class="box-body">
              <div class="table-responsive">
             <div class="box-body">

				<!-- Transfer Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">        
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>	
						<?php 
						switch($pageid){
							case 1:
								$modalText = "appraise";
								brea;
							case 2:
								$modalText = "approve"; 
								break;
							default:
								$modalText = "transfer";
								break;
						}
						?>						
						<h3 class="modal-title" id="exampleModalLabel">Are you sure you want to <?php echo $modalText ?> the loan?</h3>
					</div>
					<!-- <div class="modal-body">
					</div> -->
					<form method="post" action="process_loan_info.php">
						<input value="" name="id"  type="hidden" type="number" > 
						<input type="hidden" value="<?php echo $pageid; ?>" name="pageid" type="number" >
						<div class="modal-footer">
							<button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
							<button name="transfer" type="submit" class="btn btn-success">Yes</button>
						</div>
					</form>
					</div>
				</div>
				</div>

				<!--Disburse Modal -->
				<div class="modal fade" id="disburse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">        
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						<h3 class="modal-title" id="exampleModalLabel">Disbursement</h3>
					</div>
						<?php include "modal/disburse.php"; ?>
					</div>
				</div>
				</div>

<form method="post">
			 <a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("401"); ?>"><button type="button" class="btn btn-flat btn-warning"><i class="fa fa-mail-reply-all"></i>&nbsp;Back</button> </a> 
<?php
$pageid = $_GET['pageid'];
// echo $pageid;
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Loan Details'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pdelete = $get_check['pdelete'];
$pcreate = $get_check['pcreate'];
$pupdate = $get_check['pupdate'];
?>
	<?php echo ($pdelete == '1') ? '<button type="submit" class="btn btn-flat btn-danger" name="delete"><i class="fa fa-times"></i>&nbsp;Multiple Delete</button>' : ''; ?>
	
	<?php echo ($pcreate == '1') ? '<a href="newloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'"><button type="button" class="btn btn-flat btn-success"><i class="fa fa-plus"></i>&nbsp;Add Loans</button></a>' : ''; ?>
<?php
$get = mktime(0,0,0,date("m"),date("d"),date("Y"));
$date = date("d/m/Y",$get);
$select = mysqli_query($link, "SELECT * FROM loan_info WHERE pay_date >= '$date' AND pay_date < '$date'") or die (mysqli_error($link));
$num = mysqli_num_rows($select);
?>
	<button type="button" class="btn btn-flat btn-danger"><i class="fa fa-times"></i>&nbsp;Overdue:&nbsp;<?php echo number_format($num,0,'.',','); ?></button>
	
	<a href="printloan.php" target="_blank" class="btn btn-info btn-flat"><i class="fa fa-print"></i>&nbsp;Print</a>
	<a href="exportloan.php" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-send"></i>&nbsp;Export Excel</a>
	
	<hr>		
			  
			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all"/></th>
                  <th width="50">Loan ID</th>
				  <th width="100">Borrower</th>
                  <th>Loan Type</th>
                  <th>Repayment Period</th>
                  <th>Repayment Method</th>
                  <th>Loan Amount</th>
				  <?php if($pageid == 3){
					echo "
                  <th>Amount Disbursed</th>
				  ";}?>
                  <th>Interest Rate</th>
                  <!-- <th>Approve By</th> -->
                  <!-- <th>date Release</th> -->
                  <!-- <th>Payment Date</th> -->
				  <?php if($pageid == 4){
					echo "
                  <th>Status</th>
				  ";}?>
				  <!-- <th>Update Status</th> -->
                  <th>Action</th>
                 </tr>
                </thead>
                <tbody> 
<?php
switch($pageid){
	case 1:
		$loanQuery = "select l.loanId, l.loanPeriod, l.loanAmount, ls.statusName, l.interestRate, lt.loanName, c.methodName, b.fname, b.lname, b.id from loans as l inner join loan_types as lt on lt.loanCode = l.loanType inner join calculation_method as c on c.methodId = l.calculationMethod inner join borrowers as b on b.id = l.borrowerId inner join loan_status as ls on ls.statusId = l.status where l.status = 0;";				
		break;
	case 2:
		$loanQuery = "select l.loanId, l.loanPeriod, l.loanAmount, ls.statusName, l.interestRate, lt.loanName, c.methodName, b.fname, b.lname, b.id from loans as l inner join loan_types as lt on lt.loanCode = l.loanType inner join calculation_method as c on c.methodId = l.calculationMethod inner join borrowers as b on b.id = l.borrowerId inner join loan_status as ls on ls.statusId = l.status where l.status = 1;";				
		break;
	case 3:
		$loanQuery = "select l.amountDisbursed, l.loanId, l.loanPeriod, l.loanAmount, ls.statusName,  l.interestRate, lt.loanName, c.methodName, b.fname, b.lname, b.id from loans as l inner join loan_types as lt on lt.loanCode = l.loanType inner join calculation_method as c on c.methodId = l.calculationMethod inner join borrowers as b on b.id = l.borrowerId inner join loan_status as ls on ls.statusId = l.status where l.status = 2 or l.status = 3;";				
		break;
	case 4: 
		$loanQuery = "select l.loanId, l.loanPeriod, l.loanAmount, ls.statusName, l.interestRate, lt.loanName, c.methodName, b.fname, b.lname, b.id from loans as l inner join loan_types as lt on lt.loanCode = l.loanType inner join calculation_method as c on c.methodId = l.calculationMethod inner join borrowers as b on b.id = l.borrowerId inner join loan_status as ls on ls.statusId = l.status;";				
		break;
}
$select = mysqli_query($link, $loanQuery) or die (mysqli_error($link));
if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
} 
else{
while($row = mysqli_fetch_array($select))
{
$id = $row['id'];
$loanId = $row['loanId'];
$loanPeriod = $row['loanPeriod'];
$loanAmount = $row['loanAmount'];
// $upstatus = $row['upstatus'];
$status = $row['statusName'];
$loanName = $row['loanName'];
$amountDisbursed = $row['amountDisbursed'];
$interestRate = $row['interestRate'];
$interest = $row['interest'];
$methodName = $row['methodName'];
$lname = $row['lname'];
$fname = $row['fname'];
$upstatus = 1;//$row['upstatus'];

// $borrower = $row['id'],' - ',$row['lname'],', ',$row['fname'];
?> 
                <tr>
				<td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $row['id']; ?>"></td>
                <!-- <td><?php echo "Flexible"; ?></td> -->
				<td ><?php echo $loanId; ?></td>
				<td><?php echo $row['id'],' - ',$row['lname'],', ',$row['fname']; ?></td>
                <td><?php echo $loanName; ?></td>
				<td><?php echo $loanPeriod; ?></td>
				<td><?php echo $methodName; ?></td>
				<td><?php echo $loanAmount; ?></td>
				<?php if($pageid == 3){
					echo "
					<td> ".$amountDisbursed." </td>
				  ";}?>
			    <td><?php echo $interestRate; ?></td>
				<?php 
				if($pageid == 4){
					switch($status){
						case "Pending Appraisal":
						case "Pending Approval":	
							$color = 'warning';
							break;
						case "Partially Paid":
						case "Fully Paid":
							$color = 'success';
							break;
						case "Overdue":
							$color = 'danger';
							break;
						case "Partially Disbursed":						
						case "Pending Disbursement":						
						case "Fully Disbursed":
							$color = 'info';
							break;
						default:
							$color = 'success';
							break;
					}
				echo "
                <td>
				 <span class=\"label label-".$color."\">".$status."</span>
				</td>
				";}?>
			<!-- <td align="center" class="alert alert-danger"><br><?php echo ($pupdate == '1') ? '<a href="updateloans.php?id='.$loanId.'&&mid='.base64_encode("405").'">Click here to complete Registration!</a>' : ''; ?></td> -->
			<td>
			<?php echo ($pupdate == '1') ? '<a href="updateloans.php?id='.$loanId.'&&mid='.base64_encode("405").'&&pageid='.$pageid.'"> <button type="button" class="btn btn-primary btn-flat" data-target="#myModal'.$id.'" data-toggle="modal"><i class="fa fa-eye"></i></button></a>' : ''; ?>

			<?php $icon = ($pageid == 3) ? "money" : "check" ?>
			<?php if ($pageid == 4) { 			 	
			}elseif($pageid != 3){
				echo ($pupdate == '1') ? '<a ><button data-id='.$loanId.' data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-flat btn-success"><i class="fa fa-'.$icon.'"></i></button></a>' : ''; 
			}else{
				echo ($pupdate == '1') ? '<a href="disburse.php?id='.$loanId.'&&mid='.base64_encode("405").'&&pageid='.$pageid.'"><button type="button" class="btn btn-flat btn-success"><i class="fa fa-'.$icon.'"></i></button></a>' : '';
			}
			 ?>

<?php
$se = mysqli_query($link, "SELECT * FROM attachment WHERE get_id = '$borrower'") or die (mysqli_error($link));
while($gete = mysqli_fetch_array($se))
{
?>
				<a href="<?php echo $gete['attached_file']; ?>"><button type="button" class="btn btn-flat btn-success"><i class="fa fa-download"></i></button></a></td>
<?php } ?>
						    
			    </tr>
<?php
} } ?>
             </tbody>
                </table>  
<?php
						if(isset($_POST['delete'])){
						$idm = $_GET['id'];
							$id=$_POST['selector'];
							$N = count($id);
						if($id == ''){
						echo "<script>alert('Row Not Selected!!!'); </script>";	
						echo "<script>window.location='listloans.php?id=".$_SESSION['tid']."'; </script>";
							}
							else{
							for($i=0; $i < $N; $i++)
							{
								$result = mysqli_query($link,"DELETE FROM loan_info WHERE id ='$id[$i]'");
								echo "<script>alert('Row Delete Successfully!!!'); </script>";
								echo "<script>window.location='listloans.php?id=".$_SESSION['tid']."'; </script>";
							}
							}
							}
?>			

</form>				

              </div>


	
</div>	
</div>
</div>	
</div>
