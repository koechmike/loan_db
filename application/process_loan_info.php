<?php include "../config/session.php"; ?>  

<!DOCTYPE html>
<html>
<head>

<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  margin:auto;
  
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<br><br><br><br><br><br><br><br><br>
<div style="width:100%;text-align:center;vertical-align:bottom">
		<div class="loader"></div>
<?php
if (isset($_SESSION['tid'])) {
	if(isset($_POST['save_loan']))
	{
		
		$borrowerId =  mysqli_real_escape_string($link, $_POST['borrowerId']);
		$calcuationMethod = mysqli_real_escape_string($link, $_POST['repaymentMethod']);
		$loanPeriod = mysqli_real_escape_string($link, $_POST['loanPeriod']);
		$loanAmount = mysqli_real_escape_string($link, $_POST['loanAmount']);
		$loanType = mysqli_real_escape_string($link, $_POST['loanType']);
		$gName = mysqli_real_escape_string($link, $_POST['gName']);
		$gContact = mysqli_real_escape_string($link, $_POST['gContact']);
		$gAddress = mysqli_real_escape_string($link, $_POST['gAddress']);
		$interest = mysqli_real_escape_string($link, $_POST['interest']);

		$status = 0;

		$query = "INSERT INTO loans VALUES(null,'$borrowerId','$loanType','$loanPeriod','$calcuationMethod','$loanAmount','$gName','$gAddress','$gContact','$status',$interest)";
		// echo $query;
		$insert = mysqli_query($link, $query) or die (mysqli_error($link));
		if(!$insert)
		{
			echo '<meta http-equiv="refresh" content="2;url=newloans.php?tid='.$_SESSION['tid'].'">';
			echo '<br>';
			echo'<span class="itext" style="color: #FF0000">Unable to Save Loan Information. Please try again later!</span>';
		}else{
			echo '<meta http-equiv="refresh" content="2;url=listloans.php?tid='.$_SESSION['tid'].'">';
			echo '<br>';
			echo'<span class="itext" style="color: #FF0000">Loan application saved, awaiting appraisail.</span>';
		}
	}elseif(isset($_POST['update_loan'])){
		$pageid = mysqli_real_escape_string($link, $_POST['pageid']);
		$loanId = mysqli_real_escape_string($link, $_POST['loanId']);
		$borrowerId =  mysqli_real_escape_string($link, $_POST['borrowerId']);
		$calcuationMethod = mysqli_real_escape_string($link, $_POST['repaymentMethod']);
		$loanPeriod = mysqli_real_escape_string($link, $_POST['loanPeriod']);
		$loanAmount = mysqli_real_escape_string($link, $_POST['loanAmount']);
		$loanType = mysqli_real_escape_string($link, $_POST['loanType']);
		$gName = mysqli_real_escape_string($link, $_POST['gName']);
		$gContact = mysqli_real_escape_string($link, $_POST['gContact']);
		$gAddress = mysqli_real_escape_string($link, $_POST['gAddress']);
		$interest = mysqli_real_escape_string($link, $_POST['interest']);

		$status = 0;
		$query = "UPDATE loans set borrowerId = '$borrowerId', loanType = '$loanType', loanPeriod = '$loanPeriod', calculationMethod = '$calcuationMethod', loanAmount = '$loanAmount', gName = '$gName', gAddress = '$gAddress', gContact = '$gContact', status = '$status', interest = $interest where loanId = $loanId";
		//echo $query;
		$insert = mysqli_query($link, $query) or die (mysqli_error($link));
		if(!$insert)
		{
			echo '<meta http-equiv="refresh" content="2;url=newloans.php?tid='.$_SESSION['tid'].'">';
			echo '<br>';
			echo'<span class="itext" style="color: #FF0000">Unable to update loan Information. Please try again later.</span>';
		}else{
			echo '<meta http-equiv="refresh" content="2;url=listloans.php?tid='.$_SESSION['tid'].'&&pageid='.$pageid.'">';
			echo '<br>';
			echo'<span class="itext" style="color: black">Updating loan information...</span>';
		}
	}elseif(isset($_POST['transfer'])){

		$pageid = mysqli_real_escape_string($link, $_POST['pageid']);
		$loanId = mysqli_real_escape_string($link, $_POST['id']);

		switch($pageid){
			case 1:
				$status = 1;
				break;
			case 2: 
				$status = 2;
				break;
			case 3: 
				$status = 3;
				break;
			case 4:
				break;
		}
		
		$query = "UPDATE loans set status = $status where loanId = $loanId";
		//echo $query;
		$insert = mysqli_query($link, $query) or die (mysqli_error($link));
		if(!$insert)
		{
			echo '<meta http-equiv="refresh" content="2;url=newloans.php?tid='.$_SESSION['tid'].'">';
			echo '<br>';
			echo'<span class="itext" style="color: #FF0000">Unable to update loan Information. Please try again later.</span>';
		}else{
			echo '<meta http-equiv="refresh" content="2;url=listloans.php?tid='.$_SESSION['tid'].'&&pageid='.$pageid.'">';
			echo '<br>';
			echo'<span class="itext" style="color: black">Transfering loan for approval...</span>';
		}
	}elseif(isset($_POST['disburse'])){

		$pageid = mysqli_real_escape_string($link, $_POST['pageid']);
		$loanId = mysqli_real_escape_string($link, $_POST['loanId']);
		$disbursedAmount = mysqli_real_escape_string($link, $_POST['disbursedAmount']);
		$transactionReference = mysqli_real_escape_string($link, $_POST['transactionReference']);
		$paymentMethod = mysqli_real_escape_string($link, $_POST['paymentMethod']);
		$loanAmount = mysqli_real_escape_string($link, $_POST['loanAmount']);
		$amountDisbursed = mysqli_real_escape_string($link, $_POST['amountDisbursed']);
		$tid = $_SESSION['userid'];
		$now = date_create('now')->format('Y-m-d H:i:s');

		$amountDisbursed = $amountDisbursed + $disbursedAmount;

		$status = ($amountDisbursed == $loanAmount) ? 4 : 2;
		
		$loanQuery = "UPDATE loans set status = $status, amountDisbursed = $amountDisbursed where loanId = $loanId";
		$transactionQuery = "INSERT INTO transactions VALUES(null, '$loanId', 'Disbursed', '$disbursedAmount', '1', '$now', '$transactionReference')";
		
		// echo $loanQuery;
		// echo $transactionQuery;
		$loanUpdate = mysqli_query($link, $loanQuery) or die (mysqli_error($link));
		$transactionInsert = mysqli_query($link, $transactionQuery) or die (mysqli_error($link));

		if(!$loanUpdate && !transactionInsert)
		{
			echo '<meta http-equiv="refresh" content="2;url=newloans.php?tid='.$_SESSION['tid'].'">';
			echo '<br>';
			echo'<span class="itext" style="color: #FF0000">Unable to update loan Information. Please try again later.</span>';
		}else{
			echo '<meta http-equiv="refresh" content="2;url=listloans.php?tid='.$_SESSION['tid'].'&&pageid='.$pageid.'">';
			echo '<br>';
			echo'<span class="itext" style="color: black">Disbursing funds...</span>';
		}
	}
}
?>
</div>
</body>
</html>
