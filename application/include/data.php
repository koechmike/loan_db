
<?php 
	
    include("../../config/connect.php");
include "../config/session.php";

	if(isset($_POST['borrowerId'])) {
        $query = "SELECT * FROM loans WHERE borrowerId = " . $_POST['borrowerId'];
        $b = mysqli_query($link, $query) or die (mysqli_error($link));
        $loans =array();
        while($row = mysqli_fetch_array($b))
        {
            $loans[] = $row;
        }
		echo json_encode($loans);
	}
    elseif(isset($_POST['countyId'])) {
        $query = "SELECT * FROM subcounty WHERE countyId = " . $_POST['countyId'];
        $b = mysqli_query($link, $query) or die (mysqli_error($link));
        $subcountyId =array();
        while($row = mysqli_fetch_array($b))
        {
            $subcountyId[] = $row;
        }
		echo json_encode($subcountyId);
	}
    elseif(isset($_POST['subcountyId'])) {
        $query = "SELECT * FROM ward WHERE subcountyId = " . $_POST['subcountyId'];
        //echo $query;
        $b = mysqli_query($link, $query) or die (mysqli_error($link));

        $wardId =array();
        while($row = mysqli_fetch_array($b))
        {
            $wardId[] = $row;
        }
		echo json_encode($wardId);
    }
    elseif(isset($_POST['loanCode'])) {
        $query = "SELECT lt.interestRate, lt.repayPeriod, lt.requireGuarantor, c.methodName FROM loan_types as lt inner join calculation_method as c on c.methodId = lt.repayMethod WHERE loanCode =" . $_POST['loanCode'];
        //echo $query;
        $b = mysqli_query($link, $query) or die (mysqli_error($link));

        $loanType =array();
        while($row = mysqli_fetch_array($b))
        {
            $loanType[] = $row;
        }
		echo json_encode($loanType);
    }
    elseif(isset($_POST['loanId'])) {
        $query = "SELECT * FROM loans WHERE loanId = " . $_POST['loanId'];
        $b = mysqli_query($link, $query) or die (mysqli_error($link));
        $loanData =array();
        while($row = mysqli_fetch_array($b))
        {
            $loanData[] = $row;
        }
		echo json_encode($loanData);
	}
    elseif(isset($_POST['_borrowerId'])) {
        $query = "SELECT fname, lname, idNumber FROM borrowers WHERE id = " . $_POST['_borrowerId'];
        $b = mysqli_query($link, $query) or die (mysqli_error($link));
        $loanborrowerDatas =array();
        while($row = mysqli_fetch_array($b))
        {
            $borrowerData[] = $row;
        }
		echo json_encode($borrowerData);
	}
 ?>