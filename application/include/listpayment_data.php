<div class="row">
    
		    <section class="content">  
	        <div class="box box-success">
            <div class="box-body">
              <div class="table-responsive">
             <div class="box-body">
<form method="post">
			 <a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("401"); ?>"><button type="button" class="btn btn-flat btn-warning"><i class="fa fa-mail-reply-all"></i>&nbsp;Back</button> </a> 
	 <button type="submit" class="btn btn-flat btn-danger" name="delete"><i class="fa fa-times"></i>&nbsp;Delete</button>
	<a href="newpayments.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("408"); ?>"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-dollar"></i>&nbsp;New Payment</button></a>
	
	<a href="printpayment.php" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-print"></i>&nbsp;Print Payments</a>
	<a href="excelpayment.php" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-send"></i>&nbsp;Export Excel</a>
	
	<hr>		
			  
			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <!-- <th>Borrower</th> -->
				  <th>Loan ID</th>
                  <th>Interst Paid</th>
                  <th>Principle Paid</th>
				  <th>Total</th>
                  <th>Date</th>
				  <!-- <th>Teller</th>
                  <th>Actions</th> -->
                 </tr>
                </thead>
                <tbody>
<?php
$tid = $_SESSION['tid'];
$select = mysqli_query($link, "SELECT * FROM transactions") or die (mysqli_error($link));
if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
}
else{
while($row = mysqli_fetch_array($select))
{

$id = $row['id'];
$customer = $row['loanId'];
$getin = mysqli_query($link, "SELECT fname, lname, account FROM borrowers WHERE id = '$customer'") or die (mysqli_error($link));
$have = mysqli_fetch_array($getin);
$nameit = $have['fname'].'&nbsp;'.$have['lname'];
$loan = $row['loan'];
$amount_to_pay = $row['amount_to_pay'];
$pay_date = $row['pay_date'];

?>    
                <tr>
					<td><?php echo $row['transactionId']; ?></td>
					<td><?php echo $row['loanId']; ?></td>
					<td><?php echo $row['interestAmount']; ?></td>
					<td><?php echo $row['principleAmount']; ?></td>
					<td><?php echo $row['total']; ?></td>
					<td><?php echo $row['transactionTime']; ?></td>
					<!-- <td><a href="view_pmt.php?id=<?php echo $id;?>"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-eye"></i>&nbsp;View</button></a></td>		     -->
			    </tr>
<?php } } ?>
             </tbody>
                </table>  
			
<?php
						if(isset($_POST['delete'])){
						$idm = $_GET['id'];
							$id=$_POST['selector'];
							$N = count($id);
						if($id == ''){
						echo "<script>alert('Row Not Selected!!!'); </script>";	
						echo "<script>window.location='listpayment.php?id=".$_SESSION['tid']."&&mid=".base64_encode("408")."'; </script>";
							}
							else{
							for($i=0; $i < $N; $i++)
							{
								$result = mysqli_query($link,"DELETE FROM payments WHERE id ='$id[$i]'");
								echo "<script>alert('Row Delete Successfully!!!'); </script>";
								echo "<script>window.location='listpayment.php?id=".$_SESSION['tid']."&&mid=".base64_encode("408")."'; </script>";
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