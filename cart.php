<?php include ('inc/header.php');?>
<?php

if(isset($_GET['delcartpd'])){
     $delcartpd = $_GET['delcartpd'];
     $delmsg = $ct->deleteCartProductById($delcartpd);
     if($delmsg==true){
     echo "<script>alertify.alert('Product Deleted From Cart Successfully')</script>";
     }else{
     	echo "<script>alertify.alert('OOps,Something went wrong,product not deleted')</script>";
     }
  }
  if($_SERVER['REQUEST_METHOD']  == 'POST'){
  	  $upquantity = $_POST['upquantity'];
  	  $cartproid = $_POST['id'];
  	  if($upquantity<='0'){
        echo "<script>alertify.alert('Please,Select Quantity At least One')</script>";
  	  }else{
  	  	$upmsg = $ct->updateByQuntity($upquantity,$cartproid);
  	  	echo "<script>alertify.alert('Product Quantity Updated..')</script>";
  	  }
  	  
  }
 if(!isset($_GET['id'])){
 	echo "<meta http-equiv='refresh' content='0;URL=?id=cart' />";
 }
 ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td width="10%">Number</td>
							<td class="image" width="22%">Image</td>
							<td class="description" width="23%">ProductName</td>
							<td class="price" width="10%">Price</td>
							<td class="quantity" width="15%">Quantity</td>
							<td class="total" width="15%">Total</td>
							<td width="5%">Action</td>
						</tr>
					</thead>
					<tbody>
					<?php
                          $getpro = $ct->getCartProducBySesseion();
                           $sum = 0;
                           $qty = 0;
                          if($getpro){
                          	$i =0;
                          	while ($value = $getpro->fetch_assoc()) {
                          		$i++;
						?>
						<tr>
						   <td>
								<?php echo $i;?>
							</td>
							<td class="cart_product">
								<a href="product-details.php?prdt=<?php echo $value['productId'];?>"><span style=""><img src="myadmin/<?php echo $value['image'];?>"  alt="" height="80px" width="80px"/></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $value['productName'];?></a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$<?php echo $value['price'];?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<!--<input  type="text" name="quantity" value="1" autocomplete="off" size="2">-->
									<form action="" method="post">
									  <input type="hidden" name="id" value="<?php echo $value['cartId'];?>"/>
										<input type="number" class="cart_quantity_input" name="upquantity" value="<?php echo $value['quantity'];?>"/>
										<input type="submit" class="btn btn-primary" name="submit" value="Update"/>
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$<?php $tp = $value['price']* $value['quantity'];
                                     echo $tp;
								?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="?delcartpd=<?php echo $value['cartId'];?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php 
                     $sum = $sum+$tp; 
					 $qty = $qty + $value['quantity'];
                     Session::set('sum',$sum);
                     Session::set('qty',$qty);
						} } else {
						echo "<script>alertify.alert('No Product In Cart,Please Shop Now')</script>";
						echo "<script>setTimeout(\"location.href ='shop.php';\",5000);</script>";
					}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$<?php  echo $sum;?></span></li>
							<li> Tax <span>10%</span></li>
							<li>Shipping Cost <span>$5</span></li>
							<li>Total <span>$<?php
                                    $gd = ($sum * 0.1)+5;
                                    echo $gd+$sum;
								?></span></li>
						</ul>
							<a class="btn btn-default update" href="shop.php">Update</a>
							<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	
		
<?php include ('inc/footer.php');?>