<div class="row">       	
	<section class="content">     
		<?php echo '<div class="alert alert-warning fade in" >
			  		<a href = "#" class = "close" data-dismiss= "alert"> &times;</a>
  					<strong>Please Note that&nbsp;</strong> &nbsp;&nbsp;You Must Tick All Added Checkbox Before Clicking on update button below
					</div>'?>
	    <div class="box box-success">
            <div class="box-body">
              	<div class="table-responsive">
             		<div class="box-body">
			 			<div class="col-md-14">
             				<div class="nav-tabs-custom">
             					<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Gender</a></li>
									<li><a href="#tab_2" data-toggle="tab">Relationships</a></li>
									<li><a href="#tab_3" data-toggle="tab">Marital Status</a></li>
									<li><a href="#tab_4" data-toggle="tab">Professions</a></li>
              					</ul>
             					<div class="tab-content">
             						<div class="tab-pane active" id="tab_1">
                                        <form method="post">
                                            <table>
                                                <th></th>
                                                <!-- <th align="center" width="400">ID</th> -->
                                                <th align="center" width="300">Gender</th>
                                                <tbody> 
                                                    <?php
                                                    $id = $_GET['id'];
                                                    $search = mysqli_query($link, "SELECT * FROM gender") or die (mysqli_error($link));
                                                    while($have = mysqli_fetch_array($search))
                                                    {                                                    
                                                    $idme= $have['id'];
                                                    $pmactive = true; 
                                                    ?>			
                                                    <tr>
                                                        <td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idme; ?>" checked></td>
                                                        <td style="display:none; width="800"><input name="id[]" type="number" class="form-control" placeholder="ID" value="<?php echo $have['id']; ?>"></td>
                                                        <td width="300"><input required name="gender[]" type="text" class="form-control" placeholder="Gender" value="<?php echo $have['gender']; ?>"></td>
                                                        <input type="hidden" value="<?php echo $pmactive ?>" name="pmactive" />
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <div align="left">
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-success btn-flat" name="add_gender_row"><i class="fa fa-plus">&nbsp;Add Row</i></button>
                                                    <button name="del_gender_row" type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash">&nbsp;Delete Row</i></button>
                                                </div>
                                            </div>
                                            <?php
                                            if(isset($_POST['del_gender_row'])){
                                            $idm = $_GET['id'];
                                                $id=$_POST['selector'];
                                                $N = count($id);
                                            if($N == 0){
                                            echo "<script>alert('Row Not Selected!!!'); </script>";	
                                            echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
                                                }
                                                else{
                                                for($i=0; $i < $N; $i++)
                                                {
                                                    $result = mysqli_query($link,"DELETE FROM gender WHERE id ='$id[$i]'");
                                                    echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
                                                }
                                                }
                                                }
                                            ?>

                                            <?php
                                            if(isset($_POST['add_gender_row']))
                                            {
                                            $gender = $_GET['gender'];
                                            // $tid = $_SESSION['tid'];
                                            $insert = mysqli_query($link, "INSERT INTO gender(id,gender) VALUES(null,'$gender')") or die (mysqli_error($link));
                                            if(!$insert)
                                            {
                                            echo "<script>alert('Unable to add row!!!'); </script>";
                                            echo "<script>window.location='general_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
                                            }
                                            else{
                                            echo "<script>window.location='general_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
                                            }
                                            }
                                            ?>
                                            <div align="right">
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-info btn-flat" name="add_gender"><i class="fa fa-save">&nbsp;Save Changes</i></button>
                                                </div>
                                            </div>
                                            <?php
                                            if(isset($_POST['add_gender']))
                                            {
                                            $idm = $_GET['id'];
                                            $id = $_POST['selector'];
                                            if($id == ''){
                                            echo "<script>alert('Row Not Selected!!!'); </script>";	
                                            echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
                                            }
                                            else{
                                            $i = 0;
                                            foreach($_POST['selector'] as $s)
                                            {
                                            $id = mysqli_real_escape_string($link, $_POST['id'][$i]);
                                            $gender = mysqli_real_escape_string($link, $_POST['gender'][$i]);
                                            $updatePaymentMethdoQuery = "UPDATE gender SET gender = '$gender' WHERE id = '$id'";
                                            echo $updatePaymentMethdoQuery;
                                            $update = mysqli_query($link, $updatePaymentMethdoQuery) or die (mysqli_error($link));
                                            $i++;
                                            if(!$update)
                                            {
                                            echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
                                            }
                                            else{
                                            echo "<script>alert('Loan Type Added Successfully!!'); </script>";
                                            echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
                                            }
                                            }
                                            }
                                            }
                                            ?>
                                        </form>
                                    </div>            			
									<div class="tab-pane" id="tab_2">
										<form method="post">
											<table>
												<th></th>
												<!-- <th align="center" width="400">ID</th> -->
												<th align="center" width="300">Relationships</th>
												<tbody> 
													<?php
													$id = $_GET['id'];
													$search = mysqli_query($link, "SELECT * FROM relationship") or die (mysqli_error($link));
													while($have = mysqli_fetch_array($search))
													{                                                    
													$idme= $have['rid'];
													$pmactive = true; 
													?>			
													<tr>
														<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idme; ?>" checked></td>
														<td style="display:none; width="800"><input name="rid[]" type="number" class="form-control" placeholder="ID" value="<?php echo $have['rid']; ?>"></td>
														<td width="300"><input required name="rname[]" type="text" class="form-control" placeholder="Relationship" value="<?php echo $have['rname']; ?>"></td>
														<input type="hidden" value="<?php echo $pmactive ?>" name="pmactive" />
													</tr>
													<?php } ?>
												</tbody>
											</table>
											<div align="left">
												<div class="box-footer">
													<button type="submit" class="btn btn-success btn-flat" name="add_relationship_row"><i class="fa fa-plus">&nbsp;Add Row</i></button>
													<button name="del_relationship_row" type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash">&nbsp;Delete Row</i></button>
												</div>
											</div>
											<?php
											if(isset($_POST['del_relationship_row'])){
												$idm = $_GET['id'];
												$id=$_POST['selector'];
												$N = count($id);												if($N == 0){
											echo "<script>alert('Row Not Selected!!!'); </script>";	
											echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
												}
												else{
												for($i=0; $i < $N; $i++)
												{
													$result = mysqli_query($link,"DELETE FROM relationship WHERE rid ='$id[$i]'");
													echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
												}
												}
												}
											?>

											<?php
											if(isset($_POST['add_relationship_row']))
											{
											$rname = $_GET['rname'];
											// $tid = $_SESSION['tid'];
											$insert = mysqli_query($link, "INSERT INTO relationship(rid,rname) VALUES(null,'$rname')") or die (mysqli_error($link));
											if(!$insert)
											{
											echo "<script>alert('Unable to add row!!!'); </script>";
											echo "<script>window.location='general_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
											}
											else{
											echo "<script>window.location='general_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
											}
											}
											?>
											<div align="right">
												<div class="box-footer">
													<button type="submit" class="btn btn-info btn-flat" name="add_relationship"><i class="fa fa-save">&nbsp;Save Changes</i></button>
												</div>
											</div>
											<?php
											if(isset($_POST['add_relationship']))
											{
											$idm = $_GET['id'];
											$id = $_POST['selector'];
											if($id == ''){
											echo "<script>alert('Row Not Selected!!!'); </script>";	
											echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											else{
											$i = 0;
											foreach($_POST['selector'] as $s)
											{
											$rid = mysqli_real_escape_string($link, $_POST['rid'][$i]);
											$rname = mysqli_real_escape_string($link, $_POST['rname'][$i]);
											$updatePaymentMethdoQuery = "UPDATE relationship SET rname = '$rname' WHERE rid = '$rid'";
											echo $updatePaymentMethdoQuery;
											$update = mysqli_query($link, $updatePaymentMethdoQuery) or die (mysqli_error($link));
											$i++;
											if(!$update)
											{
											echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
											}
											else{
											echo "<script>alert('Loan Type Added Successfully!!'); </script>";
											echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											}
											}
											}
											?>
										</form>
									</div>	
									<div class="tab-pane" id="tab_3">
										<form method="post">
											<table>
												<th></th>
												<!-- <th align="center" width="400">ID</th> -->
												<th align="center" width="300">Relationships</th>
												<tbody> 
													<?php
													$id = $_GET['id'];
													$search = mysqli_query($link, "SELECT * FROM marital_status") or die (mysqli_error($link));
													while($have = mysqli_fetch_array($search))
													{                                                    
													$idme= $have['msid'];
													$pmactive = true; 
													?>			
													<tr>
														<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idme; ?>" checked></td>
														<td style="display:none; width="800"><input name="msid[]" type="number" class="form-control" placeholder="ID" value="<?php echo $have['msid']; ?>"></td>
														<td width="300"><input required name="ms[]" type="text" class="form-control" placeholder="Marital Status" value="<?php echo $have['ms']; ?>"></td>
														<input type="hidden" value="<?php echo $pmactive ?>" name="pmactive" />
													</tr>
													<?php } ?>
												</tbody>
											</table>
											<div align="left">
												<div class="box-footer">
													<button type="submit" class="btn btn-success btn-flat" name="add_marital_status_row"><i class="fa fa-plus">&nbsp;Add Row</i></button>
													<button name="del_marital_status_row" type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash">&nbsp;Delete Row</i></button>
												</div>
											</div>
											<?php
											if(isset($_POST['del_marital_status_row'])){
												$idm = $_GET['id'];
												$id=$_POST['selector'];
												$N = count($id);												
												if($N == 0){
											echo "<script>alert('Row Not Selected!!!'); </script>";	
											echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
												}
												else{
												for($i=0; $i < $N; $i++)
												{
													$result = mysqli_query($link,"DELETE FROM marital_status WHERE msid ='$id[$i]'");
													echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
												}
												}
												}
											?>

											<?php
											if(isset($_POST['add_marital_status_row']))
											{
											$ms = $_GET['ms'];
											// $tid = $_SESSION['tid'];
											$insert = mysqli_query($link, "INSERT INTO marital_status (msid,ms) VALUES(null,'$ms')") or die (mysqli_error($link));
											if(!$insert)
											{
											echo "<script>alert('Unable to add row!!!'); </script>";
											echo "<script>window.location='general_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
											}
											else{
											echo "<script>window.location='general_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
											}
											}
											?>
											<div align="right">
												<div class="box-footer">
													<button type="submit" class="btn btn-info btn-flat" name="add_marital_status"><i class="fa fa-save">&nbsp;Save Changes</i></button>
												</div>
											</div>
											<?php
											if(isset($_POST['add_marital_status']))
											{
											$idm = $_GET['id'];
											$id = $_POST['selector'];
											if($id == ''){
											echo "<script>alert('Row Not Selected!!!'); </script>";	
											echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											else{
											$i = 0;
											foreach($_POST['selector'] as $s)
											{
											$msid = mysqli_real_escape_string($link, $_POST['msid'][$i]);
											$ms = mysqli_real_escape_string($link, $_POST['ms'][$i]);
											$updatePaymentMethdoQuery = "UPDATE marital_status SET ms = '$ms' WHERE msid = '$msid'";
											echo $updatePaymentMethdoQuery;
											$update = mysqli_query($link, $updatePaymentMethdoQuery) or die (mysqli_error($link));
											$i++;
											if(!$update)
											{
											echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
											}
											else{
											echo "<script>alert('Loan Type Added Successfully!!'); </script>";
											echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											}
											}
											}
											?>
										</form>
									</div>
									<div class="tab-pane" id="tab_4">
										<form method="post">
											<table>
												<th></th>
												<!-- <th align="center" width="400">ID</th> -->
												<th align="center" width="300">Proffession</th>
												<tbody> 
													<?php
													$id = $_GET['id'];
													$search = mysqli_query($link, "SELECT * FROM proffession") or die (mysqli_error($link));
													while($have = mysqli_fetch_array($search))
													{                                                    
													$idme= $have['pid'];
													$pmactive = true; 
													?>			
													<tr>
														<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $idme; ?>" checked></td>
														<td style="display:none; width="800"><input name="pid[]" type="number" class="form-control" placeholder="ID" value="<?php echo $have['pid']; ?>"></td>
														<td width="300"><input required name="pname[]" type="text" class="form-control" placeholder="Proffession" value="<?php echo $have['pname']; ?>"></td>
														<input type="hidden" value="<?php echo $pmactive ?>" name="pmactive" />
													</tr>
													<?php } ?>
												</tbody>
											</table>
											<div align="left">
												<div class="box-footer">
													<button type="submit" class="btn btn-success btn-flat" name="add_proffession_row"><i class="fa fa-plus">&nbsp;Add Row</i></button>
													<button name="del_proffession_row" type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash">&nbsp;Delete Row</i></button>
												</div>
											</div>
											<?php
											if(isset($_POST['del_proffession_row'])){
												$idm = $_GET['id'];
												$id=$_POST['selector'];
												$N = count($id);												
												if($N == 0){
											echo "<script>alert('Row Not Selected!!!'); </script>";	
											echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
												}
												else{
												for($i=0; $i < $N; $i++)
												{
													$result = mysqli_query($link,"DELETE FROM marital_status WHERE msid ='$id[$i]'");
													echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
												}
												}
												}
											?>

											<?php
											if(isset($_POST['add_proffession_row']))
											{
											$pname = $_GET['pname'];
											// $tid = $_SESSION['tid'];
											$insert = mysqli_query($link, "INSERT INTO proffession (pid,pname) VALUES(null,'$pname')") or die (mysqli_error($link));
											if(!$insert)
											{
											echo "<script>alert('Unable to add row!!!'); </script>";
											echo "<script>window.location='general_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
											}
											else{
											echo "<script>window.location='general_settings.php?id=".$id."&&mid=".base64_encode("403")."'; </script>";
											}
											}
											?>
											<div align="right">
												<div class="box-footer">
													<button type="submit" class="btn btn-info btn-flat" name="add_proffession"><i class="fa fa-save">&nbsp;Save Changes</i></button>
												</div>
											</div>
											<?php
											if(isset($_POST['add_proffession']))
											{
											$idm = $_GET['id'];
											$id = $_POST['selector'];
											if($id == ''){
											echo "<script>alert('Row Not Selected!!!'); </script>";	
											echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											else{
											$i = 0;
											foreach($_POST['selector'] as $s)
											{
											$pid = mysqli_real_escape_string($link, $_POST['pid'][$i]);
											$pname = mysqli_real_escape_string($link, $_POST['pname'][$i]);
											$updatePaymentMethdoQuery = "UPDATE proffession SET pname = '$pname' WHERE pid = '$pid'";
											echo $updatePaymentMethdoQuery;
											$update = mysqli_query($link, $updatePaymentMethdoQuery) or die (mysqli_error($link));
											$i++;
											if(!$update)
											{
											echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
											}
											else{
											echo "<script>alert('Loan Type Added Successfully!!'); </script>";
											echo "<script>window.location='general_settings.php?id=".$idm."&&mid=".base64_encode("403")."'; </script>";
											}
											}
											}
											}
											?>
										</form>
									</div>
								</div>
            				</div>
          				</div>				
					</div>
				</div>	
			</div>	
		</div>
	</div>	
</div>