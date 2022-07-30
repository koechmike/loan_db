
<?php 

include("../../config/connect.php");
include "../config/session.php";


$pageid = mysqli_real_escape_string($link, $_POST['pageid']);
$loanId = mysqli_real_escape_string($link, $_POST['id']);

$query = "UPDATE loans set status = '1' where loanId = $loanId";
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

?>