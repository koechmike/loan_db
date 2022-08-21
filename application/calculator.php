<?php include("include/header.php"); ?>
<div class="wrapper">

<?php $pageid = $_GET['pageid']; ?>

<?php include("include/top_bar.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include("include/side_bar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Loan Calculator
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> <a href="newborrowers.php?id=<?php echo $_SESSION['tid']; ?>">Loans</a></li>
        <li class="active">List</li>
      </ol>
    </section>
    <section class="content">
		<?php include("include/calculator_data.php"); ?>
	</section>
</div>	

<?php include("modal/listloans_modal.php"); ?>

<?php include("include/footer.php"); ?>


<script>
	$('#exampleModal').on('show.bs.modal', function(e) {
		var id = $(e.relatedTarget).data('id');
		console.log(id);
		$(e.currentTarget).find('input[name="id"]').val(id);
	});

  
	// $('#disburse').on('show.bs.modal', function(e) {
	// 	var id = $(e.relatedTarget).data('id');
	// 	console.log(id);
  //   document.getElementById("loanAmount").max = "10";
	// });
</script>