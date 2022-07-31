
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
        echo $query;
        $b = mysqli_query($link, $query) or die (mysqli_error($link));

        $wardId =array();
        while($row = mysqli_fetch_array($b))
        {
            $wardId[] = $row;
        }
		echo json_encode($wardId);
    }
 ?>