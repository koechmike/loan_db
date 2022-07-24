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
if(isset($_POST['save']))
{
$fname =  mysqli_real_escape_string($link, $_POST['fname']);
$lname = mysqli_real_escape_string($link, $_POST['lname']);
$dob = mysqli_real_escape_string($link, $_POST['dob']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
$addrs1 = mysqli_real_escape_string($link, $_POST['addrs1']);
$addrs2 = mysqli_real_escape_string($link, $_POST['addrs2']);
$county = mysqli_real_escape_string($link, $_POST['county']);
$subcounty = mysqli_real_escape_string($link, $_POST['sub-county']);
$krapin = mysqli_real_escape_string($link, $_POST['kra pin']);
$ward = mysqli_real_escape_string($link, $_POST['ward']);
$profesion = mysqli_real_escape_string($link, $_POST['profession']);
$account = mysqli_real_escape_string($link, $_POST['account']);
$status = "Pending";

//$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//$image_name = addslashes($_FILES['image']['name']);
//$image_size = getimagesize($_FILES['image']['tmp_name']);

$target_dir = "../img/";
$target_file = $target_dir.basename($_FILES["image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["image"]["tmp_name"]);

if($check == false)
{
	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
	echo '<br>';
	echo'<span class="itext" style="color: #FF0000">Invalid file type</span>';
}
elseif(file_exists($target_file)) 
{
	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
	echo '<br>';
	echo'<span class="itext" style="color: #FF0000">Already exists.</span>';
}
elseif($_FILES["image"]["size"] > 500000)
{
	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
	echo '<br>';
	echo'<span class="itext" style="color: #FF0000">Image must not more than 500KB!</span>';
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
{
	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
	echo '<br>';
	echo'<span class="itext" style="color: #FF0000">Sorry, only JPG, JPEG, PNG & GIF Files are allowed.</span>';
}
else{
	$sourcepath = $_FILES["image"]["tmp_name"];
	$targetpath = "../img/" . $_FILES["image"]["name"];
	move_uploaded_file($sourcepath,$targetpath);
	
	$location = "img/".$_FILES['image']['name'];

$insert = mysqli_query($link, "INSERT INTO borrowers VALUES('','$fname','$lname','$email','$phone','$addrs1','$addrs2','$County','$Subcounty','$krapin','$country','$comment','$account','0.0','$location',NOW(),'$status')") or die (mysqli_error($link));
if(!$insert)
{
echo "<div class='alert alert-info'>Unable to Insert Borrower Records.....Please try again later</div>";
}
else{
echo "<div class='alert alert-success'>Borrower Information Created Successfully!</div>";
}
}
}
?>			  		

<div class="row">
            <div class="col-md-4">
<fieldset style="width:270px">	
	<legend>Personal Information</legend> 
	<!-- <div class="form-group">
		<label for="" class="col-sm-2 control-label">Your Image</label>
		<div class="col-sm-10">
			<input type='file' name="image" onChange="readURL(this);">
			<img id="blah"  src="../avtar/user2.png" alt="Image Here" height="100" width="100"/>
		</div>
	</div> -->
    <div class="form-group" style="margin-bottom: 1rem" class="row">
        <div class="col-md-3">
		 	<label for="" class="col-sm-2 control-label" style="color:#009900">Account Number</label>
        </div>
        <div class="col-md-9">
			<input name="account" type="text" class="form-control" value="<?php echo $account; ?>" placeholder="Account Number" readonly>
					<?php
						$account = '013'.rand(1000000,10000000);
					?>
        </div>
	</div>
    <div style="margin-bottom: 1rem" class="row">
        <div class="col-md-3">
		    <label for="" class="col-sm-2 control-label" style="color:#009900">First Name</label>
        </div>
	    <div class="col-md-9">
            <input name="fname" type="text" class="form-control" placeholder="First Name" required>
        </div>
    </div>
    <div style="margin-bottom: 1rem" class="row">
        <div class="col-md-3">
			<label for="" class="col-sm-2 control-label" style="color:#009900">Last Name</label>
        </div>
        <div class="col-md-9">
			<input name="lname" type="text" class="form-control" placeholder="Last Name" required>
        </div>
    </div>
</fieldset>
</div>
<div class="col-md-4">
<fieldset style="width:270px">	
	<legend>Personal Information</legend> 
	<!-- <div class="form-group">
		<label for="" class="col-sm-2 control-label">Your Image</label>
		<div class="col-sm-10">
			<input type='file' name="image" onChange="readURL(this);">
			<img id="blah"  src="../avtar/user2.png" alt="Image Here" height="100" width="100"/>
		</div>
	</div> -->
    <div class="form-group" style="margin-bottom: 1rem" class="row">
        <div class="col-md-3">
		 	<label for="" class="col-sm-2 control-label" style="color:#009900">Account Number</label>
        </div>
        <div class="col-md-9">
			<input name="account" type="text" class="form-control" value="<?php echo $account; ?>" placeholder="Account Number" readonly>
					<?php
						$account = '013'.rand(1000000,10000000);
					?>
        </div>
	</div>
    <div style="margin-bottom: 1rem" class="row">
        <div class="col-md-3">
		    <label for="" class="col-sm-2 control-label" style="color:#009900">First Name</label>
        </div>
	    <div class="col-md-9">
            <input name="fname" type="text" class="form-control" placeholder="First Name" required>
        </div>
    </div>
    <div style="margin-bottom: 1rem" class="row">
        <div class="col-md-3">
			<label for="" class="col-sm-2 control-label" style="color:#009900">Last Name</label>
        </div>
        <div class="col-md-9">
			<input name="lname" type="text" class="form-control" placeholder="Last Name" required>
        </div>
    </div>
</fieldset>
</div>
<div class="col-md-4">
<fieldset style="width:270px">	
	<legend>Personal Information</legend> 
	<!-- <div class="form-group">
		<label for="" class="col-sm-2 control-label">Your Image</label>
		<div class="col-sm-10">
			<input type='file' name="image" onChange="readURL(this);">
			<img id="blah"  src="../avtar/user2.png" alt="Image Here" height="100" width="100"/>
		</div>
	</div> -->
    <div class="form-group" style="margin-bottom: 1rem" class="row">
        <div class="col-md-3">
		 	<label for="" class="col-sm-2 control-label" style="color:#009900">Account Number</label>
        </div>
        <div class="col-md-9">
			<input name="account" type="text" class="form-control" value="<?php echo $account; ?>" placeholder="Account Number" readonly>
					<?php
						$account = '013'.rand(1000000,10000000);
					?>
        </div>
	</div>
    <div style="margin-bottom: 1rem" class="row">
        <div class="col-md-3">
		    <label for="" class="col-sm-2 control-label" style="color:#009900">First Name</label>
        </div>
	    <div class="col-md-9">
            <input name="fname" type="text" class="form-control" placeholder="First Name" required>
        </div>
    </div>
    <div style="margin-bottom: 1rem" class="row">
        <div class="col-md-3">
			<label for="" class="col-sm-2 control-label" style="color:#009900">Last Name</label>
        </div>
        <div class="col-md-9">
			<input name="lname" type="text" class="form-control" placeholder="Last Name" required>
        </div>
    </div>
</fieldset>
</div>
</div>



			

				  
			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">First Name</label>
                  <div class="col-sm-10">
                  <input name="fname" type="text" class="form-control" placeholder="First Name" required>
                  </div>
                  </div>
				  
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Last Name</label>
                  <div class="col-sm-10">
                  <input name="lname" type="text" class="form-control" placeholder="Last Name" required>
                  </div>
                  </div>
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Date of Birth</label>
                  <div class="col-sm-10">
                  <input type="Date of Birth" name="email" type="text" class="form-control" placeholder="Date of Birth">
                  </div>
                  </div>		  
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Email</label>
                  <div class="col-sm-10">
                  <input type="email" name="email" type="text" class="form-control" placeholder="Email">
                  </div>
                  </div>
				  
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Mobile Number</label>
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
                  <label for="" class="col-sm-2 control-label" style="color:#009900">County</label>
                  <div class="col-sm-10">
				<select name="County"  class="form-control" required>
										<option value="">Select a country&hellip;</option>
										<option value="AF">Baringo</option>
										<option value="AL">Bomet</option>
										<option value="DZ">Bungoma</option>
										<option value="AD">Busia</option>
										<option value="AO">Elgeyo Marakwet</option>
										<option value="AI">Embu</option>
										<option value="AQ">Garissa</option>
										<option value="AG">Homa Bay</option>
										<option value="AR">Isiolo</option>
										<option value="AM">Kajiado</option>
										<option value="AW">Kakamega</option>
										<option value="AU">Kericho</option>
										<option value="AT">Kiambu</option>
										<option value="AZ">Kilifi</option>
										<option value="BS">Kirinyaga</option>
										<option value="BH">Kisii</option>
										<option value="BD">Kisumu</option>
										<option value="BB">Kitui</option>
										<option value="BY">Kwale</option>
										<option value="PW">Laikipia</option>
										<option value="BE">Lamu</option>
										<option value="BZ">Machakos</option>
										<option value="BJ">Makueni</option>
										<option value="BM">Mandera</option>
										<option value="BT">Meru</option>
										<option value="BO">Migori</option>
										<option value="BQ">Marsabit</option>
										<option value="BA">Mombasa</option>
										<option value="BW">Nairobi</option>
										<option value="BV">Nakuru</option>
										<option value="BR">Nandi</option>
										<option value="IO">Narok</option>
										<option value="VG">Nyamira</option>
										<option value="BN">Nyandarua</option>
										<option value="BG">Nyeri</option>
										<option value="BF">Samburu</option>
										<option value="BI">Siaya</option>
										<option value="KH">Taita Taveta</option>
										<option value="CM">Tana River</option>
										<option value="CA">Tharaka Nithi</option>
										<option value="CV">Transzoia</option>
										<option value="KY">Turkana</option>
										<option value="CF">Uasin Gishu</option>
										<option value="TD">Vihiga</option>
										<option value="CL">Wajir</option>
										<option value="CN">West Pokot</option>
									</select>                 
									 </div>
                 					 </div>
			
		
				  
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Sub County</label>
                  <div class="col-sm-10">
                  <input name="Sub County" type="text" class="form-control" placeholder="Sub County" required>
                  </div>
                  </div>
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">ward</label>
                  <div class="col-sm-10">
                  <input name="Ward" type="text" class="form-control" placeholder="Ward"required width="10px">
                  </div>
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
                  	<!-- <div class="col-sm-10"><textarea name="Profession"  class="form-control" rows="4" cols="80"></textarea></div> -->
          	    	</div>

		</div>
			 
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