<?php include ('inc/header.php');?>
<?php
if(!isset($_GET['eprof']) && $_GET['eprof']==NULL){
     echo "<script>window.location='profile.php'</script>";
  }else{
     $eprof = $_GET['eprof'];
  }

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit']))
    {
      $msgg = $cmr->updateCustomerDataById($_POST,$eprof); 
      if(isset($msgg))
      	echo $msgg;
    }
?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Profile</li>
				</ol>
			</div><!--/breadcrums-->

					
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3 clearfix">
						<div class="bill-to">
							<div class="form-one thik">
								<form>
									<p>Username*</p>
									<p>First Name</p>
									<p>Last Name</p>
									<p>Email*</p>
									<p>Password*</p>
									<p>Address One</p>
									<p>Address Twice</p>
									<p>City</p>
									<p>Zip Code</p>
									<p>Country</p>
									<p>Phone</p>
									<p>Company Name</p>
								</form>
							</div>
							</div>
							</div>
					<div class="col-sm-9 clearfix">
							<div class="form-two">
						<form method="post" action="#">	
						<?php
			    $id = Session::get('cmrId');
		        $gcus = $cmr->getCustomerById($id);
		        if($gcus){
		          while ($value= mysqli_fetch_assoc($gcus)) {
		          	$epid = $value['customerId'];
			    ?>
						<input type="text" value="<?php echo $value['customerUsname'];?>" name="customerUsname" required >
						<input type="text" value="<?php echo $value['cusFirstName'];?>" name="cusFirstName">
						<input type="text" value="<?php echo $value['cusLastName'];?>" name="cusLastName">
						<input type="text" value="<?php echo $value['customerEmail'];?>" name="customerEmail" required >
						<input type="password" placeholder="Enter New Or Old Password" name="customerPass" required="1">
						<input type="text" value="<?php echo $value['customerAddress'];?>" name="customerAddress">
						<input type="text" value="<?php echo $value['customerAddress1'];?>" name="customerAddress1">
						<input type="text" value="<?php echo $value['customerCity'];?>" name="customerCity">
						<input type="text" value="<?php echo $value['customerZipCode'];?>" name="customerZipCode">
						<input type="text" value="<?php echo $value['customerCountry'];?>" name="customerCountry">
						<input type="text" value="<?php echo $value['customerPhone'];?>" name="customerPhone">
						<input type="text" value="<?php echo $value['CuCompName'];?>" name="CuCompName">
						<div style="margin-bottom:40px;margin-left:10px;">
		               <button class="btn btn-primary" name="submit">Update Profile</button>
		               </div>
		               <?php } }?>
								</form>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
<?php include ('inc/footer.php');?>