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
		echo'<span class="itext" style="color: #FF0000">Unable to Save Loan Information.....Please try again later!</span>';
	}else{
		echo '<meta http-equiv="refresh" content="2;url=listloans.php?tid='.$_SESSION['tid'].'">';
		echo '<br>';
		echo'<span class="itext" style="color: #FF0000">Loan application saved, awaiting appraisail.</span>';
	}
}

?>
</div>
</body>
</html>
