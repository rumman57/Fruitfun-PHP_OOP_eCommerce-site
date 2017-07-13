<?php include ('inc/header.php');?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
				<?php
      
				 if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['signin']))
				    {
				      $logmsg = $cmr->customerLogin($_POST);
				      if(isset($logmsg))
				      	echo $logmsg."<br>"; 
				    }
              ?>
						<form action="#" method="post">
							<input type="email" placeholder="Username" required="1" name="customeEmail" />
							<input type="password" placeholder="Email Address" name="customerPassword" required="1" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default" name="signin">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<?php
                      if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit']))
					    {
					      $regmsg = $cmr->customerRegistrationInsert($_POST);
					      if(isset($regmsg))
					      	echo $regmsg;
					    }
						?>
						<form action="#" method="post">
							<input type="text" placeholder="Username" name="customerName" required="1" />
							<input type="email" placeholder="Email Address" name="customerEmail" required="1" />
							<input type="password" placeholder="Password" name="customerPass" required="1" />
							<button type="submit" class="btn btn-default" name="submit">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php include ('inc/footer.php');?>