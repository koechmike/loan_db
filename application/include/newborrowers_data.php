<script type="text/javascript">
		$(document).ready(function()
        {
			$("#countyId").change(function(){
				// console.log("test");
				var countyId = $("#countyId").val();
				$.ajax({
					url: 'include/data.php',
					method: 'post',
					data: 'countyId=' + countyId
				}).done(function(subcountyId){
					console.log(subcountyId);
					subcountyId = JSON.parse(subcountyId);
					$('#subcountyId').empty();
					subcountyId.forEach(function(subcountyId){
						$('#subcountyId').append('<option value="'+subcountyId.subcountyId+'">' + subcountyId.subcounty + '</option>')
					})
				})
			})
		})
</script>
<script type="text/javascript">
		$(document).ready(function()
        {
			$("#subcountyId").change(function(){
				var subcountyId = $("#subcountyId").val();
				$.ajax({
					url: 'include/data.php',
					method: 'post',
					data: 'subcountyId=' + subcountyId
				}).done(function(wardId){
					console.log(wardId);
					wardId = JSON.parse(wardId);
					$('#wardId').empty();
					wardId.forEach(function(wardId){
						$('#wardId').append('<option value="'+wardId.wardId+'">' + wardId.ward + '</option>')
					})
				})
			})
		})
</script>
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<div class="box">
	       <div class="box-body">
			<div class="panel panel-success">
            <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> New Borrower</h3>
            </div>
             <div class="box-body">
            
			 <form class="form-horizontal" method="post" enctype="multipart/form-data">
			  <?php echo '<div class="alert alert-info fade in" >
			  <a href = "#" class = "close" data-dismiss= "alert"> &times;</a>
  				<strong>Note that&nbsp;</strong> &nbsp;&nbsp;Some Fields are Rquired.
				</div>'?>
             <div class="box-body">
<?php
$insert = mysqli_query($link, "SELECT max(id) as `max` FROM borrowers;");
while($row = mysqli_fetch_assoc($insert))
{
	$newBorrowersId = $row['max'] + 1;
}

$time = new DateTime('now');
$newtime = $time->modify('-18 year')->format('Y-m-d');
if(isset($_POST['save']))
{	
$sid =  mysqli_real_escape_string($link, $_POST['sid']);
$fname =  mysqli_real_escape_string($link, $_POST['fname']);
$lname = mysqli_real_escape_string($link, $_POST['lname']);
$dob = mysqli_real_escape_string($link, $_POST['dob']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
$address1 = mysqli_real_escape_string($link, $_POST['address1']);
$address2 = mysqli_real_escape_string($link, $_POST['address2']);
$county = mysqli_real_escape_string($link, $_POST['county']);
$subcounty = mysqli_real_escape_string($link, $_POST['sub-county']);
$ward = mysqli_real_escape_string($link, $_POST['ward']);
$krapin = mysqli_real_escape_string($link, $_POST['krapin']);
$pid =  mysqli_real_escape_string($link, $_POST['pid']);
$idNumber = mysqli_real_escape_string($link, $_POST['idNumber']);
$maritalStatus = mysqli_real_escape_string($link, $_POST['maritalStatus']);
$powName = mysqli_real_escape_string($link, $_POST['powName']);
$position = mysqli_real_escape_string($link, $_POST['position']);
$powAddress = mysqli_real_escape_string($link, $_POST['powAddress']);
$powContact = mysqli_real_escape_string($link, $_POST['powContact']);
$powTown = mysqli_real_escape_string($link, $_POST['powTown']);
$powEmail = mysqli_real_escape_string($link, $_POST['powEmail']);
$nokName = mysqli_real_escape_string($link, $_POST['nokName']);
$nokEmail = mysqli_real_escape_string($link, $_POST['nokEmail']);
$nokContact = mysqli_real_escape_string($link, $_POST['nokContact']);
$nokRelationship = mysqli_real_escape_string($link, $_POST['nokRelationship']);
$nokResidence = mysqli_real_escape_string($link, $_POST['nokResidence']);
$nokIdNumber = mysqli_real_escape_string($link, $_POST['nokIdNumber']);
$iName = mysqli_real_escape_string($link, $_POST['iName']);
$iDob = mysqli_real_escape_string($link, $_POST['iDob']);
$iContact = mysqli_real_escape_string($link, $_POST['iContact']);
$iResidence = mysqli_real_escape_string($link, $_POST['iResidence']);
$iIdNumber = mysqli_real_escape_string($link, $_POST['iIdNumber']);

$status = "Pending";

//$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//$image_name = addslashes($_FILES['image']['name']);
//$image_size = getimagesize($_FILES['image']['tmp_name']);

$target_dir = "../img/";
$target_file = $target_dir.basename($_FILES["image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$check = true; //getimagesize($_FILES["image"]["tmp_name"]);

// if($check == false)
// {
// 	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
// 	echo '<br>';
// 	echo'<span class="itext" style="color: #FF0000">Invalid file type</span>';
// }
// elseif(file_exists($target_file)) 
// {
// 	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
// 	echo '<br>';
// 	echo'<span class="itext" style="color: #FF0000">Already exists.</span>';
// }
// elseif($_FILES["image"]["size"] > 500000)
// {
// 	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
// 	echo '<br>';
// 	echo'<span class="itext" style="color: #FF0000">Image must not more than 500KB!</span>';
// }
// elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
// {
// 	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
// 	echo '<br>';
// 	echo'<span class="itext" style="color: #FF0000">Sorry, only JPG, JPEG, PNG & GIF Files are allowed.</span>';
// }
// else{
// 	$sourcepath = $_FILES["image"]["tmp_name"];
// 	$targetpath = "../img/" . $_FILES["image"]["name"];
// 	move_uploaded_file($sourcepath,$targetpath);
	
// 	$location = "img/".$_FILES['image']['name'];
$query = "INSERT INTO `borrowers` (`id`,`fname`,`lname`,`email`,`phone`,`addrs1`,`addrs2`,`comment`,`account`,`balance`,`status`,`idNumber`,`maritalStatus`,`powName`,`position`,`powAddress`,`powTown`,`powContact`,`powEmail`,`nokName`,`nokEmail`,`nokContact`,`nokRelationship`,`nokResidence`,`nokIdNumber`,`iName`,`iDob`,`iContact`,`iResidence`,`iIdNumber`,`salutation`,`proffession`) VALUES (null,'$fname','$lname','$email','$phone','$address1','$address2','','','0','$status','$idNumber','$maritalStatus','$powName','$position','$powAddress','$powTown',$powContact,'$powEmail','$nokName','$nokEmail',$nokContact,'$nokRelationship','$nokResidence','$nokIdNumber','$iName','$iDob',$iContact,'$iResidence','$iIdNumber','$sid','$pid');";
//echo $query;
$insert = mysqli_query($link, $query) or die (mysqli_error($link));
if(!$insert)
{
echo "<div class='alert alert-info'>Unable to Insert Borrower Records.....Please try again later</div>";
}
else{
echo "<div class='alert alert-success'>Borrower Information Created Successfully!</div>";
}
}
// }
?>			  		

<div class="row">	
	<div class="col-md-8">	
		<fieldset style="width:100%">	
			<legend>Personal Information</legend> 
			<div class="col-md-6">			
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Borrower ID</label>
					</div>
					<div class="col-md-6">
						<input value="<?php echo $newBorrowersId; ?>" name="borrorwerId" type="number" class="form-control" placeholder="Borrower ID" readonly >
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-8">
							<label for="" class="control-label" style="color:#009900">Salutations</label>
					</div>
					<div class="col-sm-4">
					<select name="sid" id="sid" class="form-control" required>
										<option value="">Select a salutation&hellip;</option>
                                        <?php
                                        	$b = mysqli_query($link, "SELECT * FROM salutations") or die (mysqli_error($link));
                                            while($b_res = mysqli_fetch_array($b))
                                        {         
                                        ?>
                                        <option value="<?php echo $b_res['sid'] ?>"><?php echo $b_res['sinitials']   ?></option>
                                        <?php } ?>
                                    </select>                
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">First Name</label>
					</div>
					<div class="col-md-6">
						<input name="fname" type="text" class="form-control" placeholder="First Name" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Surname</label>
					</div>
					<div class="col-md-6">
						<input name="lname" type="text" class="form-control" placeholder="Surname" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Date of Birth</label>
					</div>
					<div class="col-md-6">
						<input type="date" max="<?php echo $newtime ?>" name="dob" type="text" class="form-control" placeholder="Date of Birth">
					</div>
				</div>	
			</div>
			<div class="col-md-6">
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">ID Number</label>
					</div>
					<div class="col-md-6">
						<input name="idNumber" type="number" class="form-control" placeholder="ID Number" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Marital Status</label>
					</div>
					<div class="col-sm-6">
						<select name="maritalStatus"  class="form-control" required>
							<option value="">Select an option&hellip;</option>
							<option value="1">Single</option>
							<option value="2">Married</option>
							<option value="3">Divorced</option>
						</select>                 
					</div>
				</div>
			</div>
		</fieldset>	
	</div>
	<div class="col-md-4">
		<fieldset style="width:270px">
			<div class="col-md-12">	
				<legend>Address</legend> 
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-4">
						<label for="" class="control-label" style="color:#009900">Address 1</label>
					</div>
					<div class="col-md-8">
						<input name="address1" type="text" class="form-control" placeholder="Address" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-4">
						<label for="" class="control-label" style="color:#009900">Address 2</label>
					</div>
					<div class="col-md-8">
						<input name="address2" type="text" class="form-control" placeholder="Adress">
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-4">
							<label for="" class="control-label" style="color:#009900">County</label>
					</div>
					<div class="col-sm-8">
					<select name="countyId" id="countyId" class="form-control" required>
										<option value="">Select a county&hellip;</option>
                                        <?php
                                        	$b = mysqli_query($link, "SELECT * FROM counties") or die (mysqli_error($link));
                                            while($b_res = mysqli_fetch_array($b))
                                        {         
                                        ?>
                                        <option value="<?php echo $b_res['id'] ?>"><?php echo $b_res['county_name']   ?></option>
                                        <?php } ?>
                                    </select>                
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
				<div class="col-md-5">
						<label for="" class="control-label" style="color:#009900">Sub-county</label>
					</div>
					<div class="col-md-7">
						<select name="subcountyId" id="subcountyId" class="form-control" required>
						</select> 
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-4">
						<label for="" class="control-label" style="color:#009900">Ward</label>
					</div>
					<div class="col-sm-8">
						<select name="wardId" id="wardId" class="form-control" required>
						
						</select>
					</div>
				</div>
			</div>
		</fieldset>
	</div>
</div>
</br>
<div class="row">
    <div class="col-md-4">
		<fieldset style="width:270px">	
			<legend>Other Information</legend> 
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-5">
							<label for="" class="control-label" style="color:#009900">Proffession</label>
					</div>
					<div class="col-sm-7">
					<select name="pid" id="pid" class="form-control" required>
										<option value="">Select a proffession&hellip;</option>
                                        <?php
                                        	$b = mysqli_query($link, "SELECT * FROM proffession") or die (mysqli_error($link));
                                            while($b_res = mysqli_fetch_array($b))
                                        {         
                                        ?>
                                        <option value="<?php echo $b_res['pid'] ?>"><?php echo $b_res['pname']   ?></option>
                                        <?php } ?>
                                    </select>                
					</div>
				</div>
			<div style="margin-bottom: 1rem" class="row">
				<div class="col-md-6">
					<label for="" class=" control-label" style="color:#009900">KRA Pin</label>
				</div>
				<div class="col-md-6">
					<input name="krapin" type="text" class="form-control" placeholder="KRA Pin" >
				</div>
			</div>
		</fieldset>
	</div>
	<div class="col-md-4">
		<fieldset style="width:270px">	
			<legend>Contact</legend> 
				<div class="form-group" style="margin-bottom: 1rem" class="row">
					<div class="col-md-3">
						<label for="" class="control-label" style="color:#009900">E-mail</label>
					</div>
					<div class="col-md-9">			
						<input type="email" name="email" type="text" class="form-control" placeholder="Email">
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Phone Number</label>
					</div>
					<div class="col-md-6">
						<input name="phone" type="text" class="form-control" placeholder="Phone Number" required>
					</div>
				</div>
		</fieldset>
	</div>
</div>
</br>
<div class="row">
    <div class="col-md-4">
		<fieldset style="width:270px">	
			<legend>Occupation</legend> 
				<div class="form-group" style="margin-bottom: 1rem" class="row">
					<div class="col-md-3">
						<label for="" class="control-label" style="color:#009900">Employer</label>
					</div>
					<div class="col-md-9">			
						<input name="powName" type="text" class="form-control" placeholder="Place of work">
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Position</label>
					</div>
					<div class="col-md-6">
						<input name="position" type="text" class="form-control" placeholder="Position" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Address</label>
					</div>
					<div class="col-md-6">
						<input name="powAddress" type="text" class="form-control" placeholder="Address" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Town</label>
					</div>
					<div class="col-md-6">
						<input name="powTown" type="text" class="form-control" placeholder="Town" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Contact</label>
					</div>
					<div class="col-md-6">
						<input name="powContact" type="number" class="form-control" placeholder="Phone Number" required>
					</div>
				</div>
				<div class="form-group" style="margin-bottom: 1rem" class="row">
					<div class="col-md-3">
						<label for="" class="control-label" style="color:#009900">E-mail</label>
					</div>
					<div class="col-md-9">			
						<input type="email" name="powEmail" type="text" class="form-control" placeholder="Email">
					</div>
				</div>
		</fieldset>
	</div>
    <div class="col-md-4">
		<fieldset style="width:270px">	
			<legend>Next of Kin</legend> 
				<div class="form-group" style="margin-bottom: 1rem" class="row">
					<div class="col-md-3">
						<label for="" class="control-label" style="color:#009900">Name</label>
					</div>
					<div class="col-md-9">			
						<input name="nokName" type="text" class="form-control" placeholder="Name">
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">ID Number</label>
					</div>
					<div class="col-md-6">
						<input name="nokIdNumber" type="number" class="form-control" placeholder="ID Number" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Residence</label>
					</div>
					<div class="col-md-6">
						<input name="nokResidence" type="text" class="form-control" placeholder="Residence" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Contact</label>
					</div>
					<div class="col-md-6">
						<input name="nokContact" type="number" class="form-control" placeholder="Phone Number" required>
					</div>
				</div>
				<div class="form-group" style="margin-bottom: 1rem" class="row">
					<div class="col-md-4">
						<label for="" class="control-label" style="color:#009900">Relationship</label>
					</div>
					<div class="col-md-8">			
						<select name="nokRelationship"  class="form-control" required>
							<option value="">Select an option&hellip;</option>
							<option value="1">Brother</option>
							<option value="2">Sister</option>
							<option value="3">Father</option>
							<option value="4">Mother</option>
							<option value="5">Son</option>
							<option value="6">Daughter</option>
						</select>           
					</div>
				</div>
				<div class="form-group" style="margin-bottom: 1rem" class="row">
					<div class="col-md-3">
						<label for="" class="control-label" style="color:#009900">E-mail</label>
					</div>
					<div class="col-md-9">			
						<input type="email" name="nokEmail" type="text" class="form-control" placeholder="Email">
					</div>
				</div>
		</fieldset>
	</div>
    <div class="col-md-4">
		<fieldset style="width:270px">	
			<legend>Introducer</legend> 
				<div class="form-group" style="margin-bottom: 1rem" class="row">
					<div class="col-md-3">
						<label for="" class="control-label" style="color:#009900">Name</label>
					</div>
					<div class="col-md-9">			
						<input name="iName" type="text" class="form-control" placeholder="Name">
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">ID Number</label>
					</div>
					<div class="col-md-6">
						<input name="iIdNumber" type="number" class="form-control" placeholder="ID Number" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Residence</label>
					</div>
					<div class="col-md-6">
						<input name="iResidence" type="text" class="form-control" placeholder="Residence" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Contact</label>
					</div>
					<div class="col-md-6">
						<input name="iContact" type="number" class="form-control" placeholder="Phone Number" required>
					</div>
				</div>
				<div style="margin-bottom: 1rem" class="row">
					<div class="col-md-6">
						<label for="" class="control-label" style="color:#009900">Date of Birth</label>
					</div>
					<div class="col-md-6">
						<input type="date" max="<?php echo $newtime ?>"  name="iDob" type="text" class="form-control" placeholder="dd-mm-yyyy">
					</div>
				</div>
		</fieldset>
	</div>
</div>
<!-- 
	  
<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Email</label>
                  <div class="col-sm-10">
                  <input type="email" name="email" type="text" class="form-control" placeholder="Email">
                  </div>
                  </div>
		<div class="form-group">
                  
                  <div class="col-sm-10">
                  <input name="phone" type="text" class="form-control" placeholder="Mobile Number" required>
                  </div>
                  </div>
				  
				  
		<div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Address 1</label>
                  	<div class="col-sm-10"><textarea name="addrs1"  class="form-control" rows="4" cols="80"></textarea></div>
          			</div>
					
		<div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Address 2</label>
                  	<div class="col-sm-10"><textarea name="addrs2"  class="form-control" rows="4" cols="80"></textarea></div>
          			</div>
	
				  
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">KRA Pin</label>
                  <div class="col-sm-10">
                  <input name="krapin" type="text" class="form-control" placeholder="KRA Pin" >
                  </div>
                  </div>
								 
		<div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Profession</label>
					<input name="Profession" type="text" class="form-control" placeholder="Profession" >
                  	<div class="col-sm-10"><textarea name="Profession"  class="form-control" rows="4" cols="80"></textarea></div>
          	    	</div>

		</div>
		-->
			  <div align="right">
              <div class="box-footer">
                				<button type="reset" class="btn btn-primary btn-flat"><i class="fa fa-times">&nbsp;Reset</i></button>
                				<button name="save" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Save</i></button>

              </div>
			  </div>

			 </form> 


</div>	
</div>	
</div>
</div>

<script>
	function subtractYears(date = new Date()) {
  date.setFullYear(date.getFullYear() - 18);

  return date;
}
</script>
