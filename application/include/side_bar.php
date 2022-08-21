<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
		<?php 
			$id = $_SESSION['tid'];
			$call = mysqli_query($link, "SELECT * FROM user WHERE id = '$id'");
			if(mysqli_num_rows($call) == 0)
			{
			echo "<script>alert('Data Not Found!'); </script>";
			}
			else
			{
			while($row = mysqli_fetch_assoc($call))
			{
			
			?>
          <img src="../<?php echo $row['image'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $row ['username'] ;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		  <?php }}?>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
<?php
if(isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("401")))
{
?>
		<li class="active"><a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("401"); ?>"><i class="fa fa-dashboard"></i> <span>Dashbord</span></a></li>
<?php
}
else{
	?>
		<li><a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("401"); ?>"><i class="fa fa-dashboard"></i> <span>Dashbord</span></a></li>
<?php } ?>

<?php
if(isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("403")))
{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Borrower Details'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>		
		<?php echo ($pcreate == 1) ? '<li class="treeview active"><a href="#"><i class="fa fa-users"></i> <span>Borrowers Management</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">' : ''; ?>
 		<?php echo ($pcreate == 1) ? '<li class="active"><a href="newborrowers.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("403").'"><i class="fa fa-circle-o"></i>New Borrowers</a></li>' : ''; ?>
        <?php echo ($pread == 1) ? '<li><a href="listborrowers.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("403").'"><i class="fa fa-circle-o"></i>Borrowers Changes</a></li>' : ''; ?>
        <?php echo ($pcreate == 1) ? '</ul></li>' : ''; ?> 
<?php
}
else{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Borrower Details'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>		
		<?php echo ($pcreate == 1) ? '<li class="treeview"><a href="#"><i class="fa fa-users"></i> <span>Borrowers Management	</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">' : ''; ?>
 		<?php echo ($pcreate == 1) ? '<li class="active"><a href="newborrowers.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("403").'"><i class="fa fa-circle-o"></i>New Borrowers</a></li>' : ''; ?>
        <?php echo ($pread == 1) ? '<li><a href="listborrowers.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("403").'"><i class="fa fa-circle-o"></i>Borrowers Changes</a></li>' : ''; ?>
        <?php echo ($pcreate == 1) ? '</ul></li>' : ''; ?> 
<?php } ?>		
	
	
<?php
if(isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("405")))
{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Loan Details'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>	
		<?php echo ($pcreate == 1) ? '<li class="treeview active"><a href="#"><i class="fa fa-dollar"></i> <span>Lending Process</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">' : ''; ?>
 		<?php echo ($pcreate == 1) ? '<li class="active"><a href="newloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'"><i class="fa fa-circle-o"></i>Loan Application</a></li>' : ''; ?>
                <?php echo ($pcreate == 1) ? '<li class="active"><a href="listloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'&&pageid=1"><i class="fa fa-circle-o"></i>Loan Appraisal</a></li>' : ''; ?> 
                <?php echo ($pcreate == 1) ? '<li class="active"><a href="listloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'&&pageid=2"><i class="fa fa-circle-o"></i>Loan Approval</a></li>' : ''; ?>
                <?php echo ($pcreate == 1) ? '<li class="active"><a href="disbursements.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'"><i class="fa fa-circle-o"></i>Loan Disbursement</a></li>' : ''; ?>  
                <?php echo ($pread == 1) ? '<li><a href="listloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'&&pageid=4"><i class="fa fa-circle-o"></i>Loan Changes</a></li>' : ''; ?>
                <?php echo ($pcreate == 1) ? '<li class="active"><a href="calculator.php"><i class="fa fa-circle-o"></i>Loan Calculator</a></li>' : ''; ?>
        <?php echo ($pcreate == 1) ? '</ul></li>' : ''; ?>
<?php
}
else{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Loan Details'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>	
		<?php echo ($pcreate == 1) ? '<li class="treeview"><a href="#"><i class="fa fa-dollar"></i> <span>Lending Process</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">' : ''; ?>
 		<?php echo ($pcreate == 1) ? '<li class="active"><a href="newloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'"><i class="fa fa-circle-o"></i>Loan Application</a></li>' : ''; ?>
                <?php echo ($pcreate == 1) ? '<li class="active"><a href="listloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'&&pageid=1"><i class="fa fa-circle-o"></i>Loan Appraisal</a></li>' : ''; ?>  
                <?php echo ($pcreate == 1) ? '<li class="active"><a href="listloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'&&pageid=2"><i class="fa fa-circle-o"></i>Loan Approval</a></li>' : ''; ?>  
                <?php echo ($pcreate == 1) ? '<li class="active"><a href="disbursements.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'"><i class="fa fa-circle-o"></i>Loan Disbursement</a></li>' : ''; ?>  
                <?php echo ($pread == 1) ? '<li><a href="listloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'&&pageid=4"><i class="fa fa-circle-o"></i>Loan Changes</a></li>' : ''; ?>
                <?php echo ($pcreate == 1) ? '<li class="active"><a href="calculator.php"><i class="fa fa-circle-o"></i>Loan Calculator</a></li>' : ''; ?>
        <?php echo ($pcreate == 1) ? '</ul></li>' : ''; ?>
<?php } ?>
		

<?php
if(isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("408")))
{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Payment'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>	
        <?php echo ($pcreate == 1) ? '<li class="treeview active"><a href="#"><i class="fa fa-dollar"></i> <span>Loan Repayment</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">' : ''; ?>
 		<?php echo ($pcreate == 1) ? '<li class="active"><a href="newpayments.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("408").'"><i class="fa fa-circle-o"></i>Recieve Payments</a></li>' : ''; ?>
        <?php echo ($pread == 1) ? '<li><a href="listpayment.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("408").'"><i class="fa fa-circle-o"></i>List Payments</a></li>' : ''; ?>
        <?php echo ($pcreate == 1) ? '</ul></li>' : ''; ?> 
<?php
}
else{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Payment'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>	
        <?php echo ($pcreate == 1) ? '<li class="treeview"><a href="#"><i class="fa fa-dollar"></i> <span>Loan Payments</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">' : ''; ?>
 		<?php echo ($pcreate == 1) ? '<li class="active"><a href="newpayments.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("408").'"><i class="fa fa-circle-o"></i>Recieve Payment</a></li>' : ''; ?>
        <?php echo ($pread == 1) ? '<li><a href="listpayment.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("408").'"><i class="fa fa-circle-o"></i>List Payments</a></li>' : ''; ?>
        <?php echo ($pcreate == 1) ? '</ul></li>' : ''; ?> 
<?php } ?>
	

	
<?php
if(isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("411")))
{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'General Settings'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>		
		<?php echo ($pcreate == 1) ? '<li class="treeview active"><a href="#"><i class="fa fa-gear"></i> <span>Set-Up Parameters</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">' : ''; ?>
		<?php echo ($pcreate == 1) ? '<li><a href="system_set.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>Company Information</a></li>' : ''; ?>
		<?php echo ($pcreate == 1) ? '<li><a href="loan_settings.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>Loan Settings</a></li>' : ''; ?>
                <!-- <?php echo ($pcreate == 1) ? '<li><a href="general_settings.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>General Settings</a></li>' : ''; ?> -->
		<!-- <?php echo ($pcreate == 1) ? '<li><a href="sms.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>SMS Gateway Settings</a></li>' : ''; ?>
		<?php echo ($pread == 1) ? '<li><a href="backupdatabase.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>Backup Database</a></li>' : ''; ?> -->
        <?php echo ($pcreate == 1) ? '</ul></li>' : ''; ?>
<?php
}
else{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'General Settings'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>		
		<?php echo ($pcreate == 1) ? '<li class="treeview"><a href="#"><i class="fa fa-gear"></i> <span>Set-Up Parameters</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">' : ''; ?>
		<?php echo ($pcreate == 1) ? '<li><a href="system_set.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>Company Information</a></li>' : ''; ?>
		<?php echo ($pcreate == 1) ? '<li><a href="loan_settings.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>Loan Settings</a></li>' : ''; ?>
                <!-- <?php echo ($pcreate == 1) ? '<li><a href="general_settings.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>General Settings</a></li>' : ''; ?> -->
		<!-- <?php echo ($pcreate == 1) ? '<li><a href="sms.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>SMS Gateway Settings</a></li>' : ''; ?>
		<?php echo ($pread == 1) ? '<li><a href="backupdatabase.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("411").'"><i class="fa fa-circle-o"></i>Backup Database</a></li>' : ''; ?> -->
        <?php echo ($pcreate == 1) ? '</ul></li>' : ''; ?>
<?php } 
?>

	
<?php
if(isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("412")))
{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Reports'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>		
		
		<?php echo ($pread == 1) ? '<li><a href="reports.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("412").'"><i class="fa fa-circle-o"></i>Reports</a></li>' : ''; ?>
     
<?php
}
else{
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Reports'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pcreate = $get_check['pcreate'];
$pread = $get_check['pread'];
?>		
		<?php echo ($pread == 1) ? '<li><a href="reports.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("412").'"><i class="fa fa-circle-o"></i>Reports</a></li>' : ''; ?>
       
<?php } 
?>


		

		
		<li>
          <a href="../logout.php">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
		

    </section>
    <!-- /.sidebar -->
  </aside>