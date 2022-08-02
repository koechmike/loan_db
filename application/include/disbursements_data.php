
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
						<h3 class="modal-title" id="exampleModalLabel">Are you sure you want to transfer the record?</h3>
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
                  <!-- <th><input type="checkbox" id="select_all"/></th> -->
                  <th width="50">Disbursement ID</th>
                  <th>Loan No</th>
				  <th width="100">Borrower</th>
                  <th>Amount Approved</th>
                  <th>Amount Disbursed</th>
                  <th>Payment Mode</th>
                  <th>Name</th>
                  <th>Collector</th>
                  <th>ID Number</th>
                  <th>Date Issued</th>
                  <th>Reference</th>
                 </tr>
                </thead>
                <tbody> 
<?php
	$loanQuery = "SELECT ld.transactionNo, ld.amountApproved, ld.amountDisbursed, pm.methodName, ld.reference, ld.collector, ld.idNumber, ld.name, ld.user, ld.dateOfDisbursement, ld.loanNo, l.borrowerId, b.fname, b.lname FROM loans_disbursed as ld inner join payment_method as pm on pm.methodId = ld.paymentMode inner join loans as l on l.loanId = ld.loanNo inner join borrowers as b on b.id = l.borrowerId;";				

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
				<!-- <td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $row['id']; ?>"></td> -->
                <!-- <td><?php echo "Flexible"; ?></td> -->
				<td ><?php echo $row['transactionNo']; ?></td>
				<td ><?php echo $row['loanNo']; ?></td>
				<td><?php echo $row['borrowerId'],' - ',$row['lname'],', ',$row['fname']; ?></td>
				<td ><?php echo $row['amountApproved']; ?></td>
				<td ><?php echo $row['amountDisbursed']; ?></td>
				<td ><?php echo $row['methodName']; ?></td>
				<td ><?php echo $row['name']; ?></td>
				<td ><?php echo $row['collector']; ?></td>
				<td ><?php echo $row['idNumber']; ?></td>
				<td ><?php echo $row['dateOfDisbursement']; ?></td>
				<td ><?php echo $row['reference']; ?></td>


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
