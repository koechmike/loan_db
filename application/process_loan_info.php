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
		
		$loanId =  mysqli_real_escape_string($link, $_POST['loanId']);
		$borrowerId =  mysqli_real_escape_string($link, $_POST['borrowerId']);
		$calcuationMethod = mysqli_real_escape_string($link, $_POST['repaymentMethod']);
		$loanPeriod = mysqli_real_escape_string($link, $_POST['loanPeriod']);
		$loanAmount = mysqli_real_escape_string($link, $_POST['loanAmount']);
		$loanType = mysqli_real_escape_string($link, $_POST['loanCode']);
		$gName = mysqli_real_escape_string($link, $_POST['gName']);
		$gContact = (mysqli_real_escape_string($link, $_POST['gContact']) == null) ? null : mysqli_real_escape_string($link, $_POST['gContact']);
		$gAddress = mysqli_real_escape_string($link, $_POST['gAddress']);
		$interestRate = mysqli_real_escape_string($link, $_POST['interestRate']);
		$interest = 0;
		$monthlyPayments = 0;
		// $applicationDate = new Date();
		$applicationDate = date_create('now')->format('Y-m-d H:i:s');

		echo "contact".$gContact;
		// switch($calcuationMethod){
		// 	case 1:
		// 		$monthlyPayments = 0;

		// 		$apr = $interestRate;
		// 		$term = $loanPeriod/12;
		// 		$loan = $loanAmount;

		// 		$interest = getInterest();
		// 		//echo $interest;
		// 		break;
		// 	case 2:
		// 		$interest = $loanAmount * ($loanPeriod/12) * ($interestRate/100);
		// 		$monthlyPayments = ($interest + $loanAmount) / $loanPeriod;
		// 		break;
		// 	case 3:
		// 		$interest = $loanAmount * ($interestRate/100);
		// 		$monthlyPayments = ($interest + $loanAmount) / $loanPeriod;
		// 	default:
		// 		break;
		// }


		$status = 0;
		//INSERT INTO loans VALUES 			(null, 36, , 18, 1, 100000, 0, 2022-08-03 19:45:51, null, 0, 10, 0, 0, 0, 0, 0, '', '', , 0)
		
		$query = "INSERT INTO loans VALUES ('$loanId', $borrowerId, $loanType, $interestRate, 1, $loanAmount, 0, '$applicationDate', null, 0, $loanPeriod, 0, 0, 0, 0, 0, '".$gName."', '".$gAddress."', '$gContact', $status);";
		echo $query;
		$insert = mysqli_query($link, $query) or die (mysqli_error($link));
		if(!$insert)
		{
			echo '<meta http-equiv="refresh" content="2;url=newloans.php?tid='.$_SESSION['tid'].'">';
			echo '<br>';
			echo'<span class="itext" style="color: #FF0000">Unable to Save Loan Information. Please try again later!</span>';
		}else{
			echo '<meta http-equiv="refresh" content="2;url=newloans.php?tid='.$_SESSION['tid'].'">';
			echo '<br>';
			echo'<span class="itext" style="color: green">Loan application saved, awaiting appraisal.</span>';
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
		$interestRate = mysqli_real_escape_string($link, $_POST['interestRate']);
		$amountApproved = mysqli_real_escape_string($link, $_POST['amountApproved']);


		$status = 0;
		$query = "UPDATE loans set amountApproved = $amountApproved, borrowerId = '$borrowerId', loanType = '$loanType', loanPeriod = '$loanPeriod', calculationMethod = '$calcuationMethod', loanAmount = '$loanAmount', gName = '$gName', gAddress = '$gAddress', gContact = '$gContact', status = '$status', interestRate = $interestRate where loanId = $loanId";
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
	}elseif(isset($_POST['yes']) || isset($_POST['no'])){

		$pageid = mysqli_real_escape_string($link, $_POST['pageid']);
		$loanId = mysqli_real_escape_string($link, $_POST['id']);

		if(isset($_POST['no'])){
			$status = 5;
		}else{
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
		}	
		$query = "UPDATE loans set status = $status where loanId = '$loanId'";
		echo $query;
		$insert = mysqli_query($link, $query) or die (mysqli_error($link));
		if(!$insert)
		{
			echo '<meta http-equiv="refresh" content="2;url=newloans.php?tid='.$_SESSION['tid'].'">';
			echo '<br>';
			echo'<span class="itext" style="color: #FF0000">Unable to update loan Information. Please try again later.</span>';			}else{
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
		$amountApproved = mysqli_real_escape_string($link, $_POST['amountApproved']);
		$captureDate = mysqli_real_escape_string($link, $_POST['captureDate']);
		$cname = mysqli_real_escape_string($link, $_POST['cname']);
		$cid = mysqli_real_escape_string($link, $_POST['cid']);
		$tid = $_SESSION['userid'];
		$dateOfDisbursement = date_create('now')->format('Y-m-d H:i:s');

		$amountDisbursed = $amountDisbursed + $disbursedAmount;

		$status = ($amountDisbursed == $loanAmount) ? 4 : 3;
		
		$loanQuery = "UPDATE loans set status = $status, amountDisbursed = $amountDisbursed where loanId = '$loanId'";
		$transactionQuery = "INSERT INTO `loan`.`loans_disbursed` VALUES (null,$amountApproved,$disbursedAmount,$paymentMethod,$transactionReference,null,$cid,'$cname',1,'$dateOfDisbursement','$loanId');";

		//$transactionQuery = "INSERT INTO transactions VALUES(null, '$loanId', 'Disbursed', '$disbursedAmount', '1', '$now', '$transactionReference','$captureDate')";
		
		 //echo $loanId;
		 //echo $transactionQuery;
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
	}elseif(isset($_POST['new_payment'])){

		// $pageid = mysqli_real_escape_string($link, $_POST['pageid']);
		$loanId = mysqli_real_escape_string($link, $_POST['loanId']);
		$repaymentAmount = mysqli_real_escape_string($link, $_POST['repaymentAmount']);
		$transactionReference = mysqli_real_escape_string($link, $_POST['transactionReference']);
		$paymentMethod = mysqli_real_escape_string($link, $_POST['paymentMethod']);
		$loanAmount = mysqli_real_escape_string($link, $_POST['loanAmount']);
		$amountDisbursed = mysqli_real_escape_string($link, $_POST['amountDisbursed']);
		$captureDate = mysqli_real_escape_string($link, $_POST['captureDate']);
		$tid = $_SESSION['userid'];
		$now = date_create('now')->format('Y-m-d H:i:s');
		

		$b = mysqli_query($link, "SELECT * FROM loans where loanId=".$loanId) or die (mysqli_error($link));
		while($b_res = mysqli_fetch_array($b)){
			$interest = $b_res['interest'];
		}

		$amountPaid = $amountPaid + $repaymentAmount;

		$status = ($amountPaid == ($loanAmount + $interest)) ? 6 : 5;
		
		$loanQuery = "UPDATE loans set status = $status, amountPaid = $amountPaid where loanId = $loanId";
		$transactionQuery = "INSERT INTO transactions VALUES(null, '$loanId', 'Repayment', '$amountPaid	', '1', '$now', '$transactionReference','$captureDate')";
		
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
			//echo '<meta http-equiv="refresh" content="2;url=listloans.php?tid='.$_SESSION['tid'].'&&pageid='.$pageid.'">';			
			echo '<meta http-equiv="refresh" content="2;url=newpayments.php?tid='.$_SESSION['tid'].'">';
			echo '<br>';
			echo'<span class="itext" style="color: black">Processig repayment...</span>';
		}
	}
}



function calPMT()
{
  global $apr;
  global $term;
  global $loan;

  // echo $apr;
  $term1 = $term * 12;
  $apr1 = $apr / 1200;
  $amount = $apr1 * -$loan * pow((1 + $apr1), $term1) / (1 - pow((1 + $apr1), $term1));
  return $amount;
}

// function loanEMI()
// {
//    echo calPMT();
// }

function getInterest(){
  global $apr;
  global $term;
  global $monthlyPayments;

  $emt = calPMT();
  $monthlyPayments = round($emt);
  // echo $emt;

  $interest = 0;
  $principle = 0;
  $ip = 0;
  
  for($i=($apr*$term);$i>0;$i--){
    
    global $loan;
    global $interest;
    global $principle;
    global $ip;
    //echo "test:".$i; 
    $interest = $loan * (($apr/12)/100);
    $principle = $emt - $interest;
    $loan = $loan - $principle;

    $ip += $interest;
  }

  return round($ip);
}


?>
</div>
</body>
</html>
