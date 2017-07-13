<?php include ('inc/header.php');?>
	<section id="cart_items">
		<div style="margin-left: :0 auto;margin-bottom: 40px;width:800px;" class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Profile</li>
				</ol>
			</div><!--/breadcrums-->

		<div  class="row">
           <div class="col-md-12">
              <div class="box box-info">
            <!-- /.box-header -->
            <div  class="box-body pad ">
             <table id="example1" class="table table-bordered table-striped">
          <?php
               $id =  Session::get('cmrId');
              $user = Session::get('cmrUser');
              $result = $cmr->getCustomerById($id);
             if($result){
              while ($value=$result->fetch_assoc()) {
          ?>
                <tr>
                  <th width="30%">Username</th>
                  <td "><?php echo $value['customerUsname'];?></td>
                </tr>
                <tr>
                  <th width="30%">First Name</th>
                  <td><?php echo $value['cusFirstName'];?></td>
                </tr>
                <tr>
                  <th width="30%">Last Name</th>
                  <td><?php echo $value['cusLastName'];?></td>
                </tr>
                <tr>
                  <th width="30%">Email</th>
                  <td><?php echo $value['customerEmail'];?></td>
                </tr>
                <tr>
                  <th width="30%">Address One</th>
                  <td><?php echo $value['customerAddress'];?></td>
                </tr>
                <tr>
                  <th width="30%">Address Twice</th>
                  <td><?php echo $value['customerAddress1'];?></td>
                </tr>
                <tr>
                  <th width="30%">City</th>
                  <td><?php echo $value['customerCity'];?></td>
                </tr>

                <tr>
                  <th width="30%">Zip Code</th>
                  <td><?php echo $value['customerZipCode'];?></td>
                </tr>
                <tr>
                  <th width="30%">Country</th>
                  <td><?php echo $value['customerCountry'];?></td>
                </tr>
                <tr>
                  <th width="30%">Phone</th>
                  <td><?php echo $value['customerPhone'];?></td>
                </tr>
                <tr>
                  <th width="30%">Company Name</th>
                  <td><?php echo $value['CuCompName'];?></td>
                </tr>
                <?php } }?>            
              </table>
               <div style="margin-top:40px;margin-left:10px;">
               <a href="editprofile.php?eprof=<?php echo $id;?>"><button class="btn btn-primary">Edit Profile</button></a>
               </div>
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
<?php include ('inc/footer.php');?>