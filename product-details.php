<?php include ('inc/header.php');?>
<?php
 if(!isset($_GET['prdt']) && $_GET['prdt']==NULL){
     echo "<script>window.location='404.php'</script>";
  }else{
     $pdetails = $_GET['prdt'];
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['review']))
    {
    	$login = Session::get('cuslog');
	    $loginid =  Session::get('cmrId');
	    if($login==false){
	    	echo "<script>alertify.alert('You Have To Log In')</script>";
	    }
	    else{
	    	$rname = $_POST['name'];
		      $remail = $_POST['email'];
		      $rbody = $_POST['body'];
		      $rmsg = $prv->addReveiw($rname,$remail,$rbody,$pdetails);
		      if(isset($rmsg)){
		      	echo $rmsg;
		      }
	    }
    }
  if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['acart']))
    {
      $quantity = $_POST['quantity'];
      $catupdatemsg = $ct->insetProToCartById($pdetails,$quantity);
      if(isset($catupdatemsg)){
      	echo $catupdatemsg;
      }
    }
?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<?php
                     $query = $cat->showCategory();
                       if($query){
                           while ($value=$query->fetch_assoc()) {
                           	$ck = $value['catId'];
                             $ckk = $cat->checkCategoryById($ck);
							if($ckk==false) {
								if($value['catParent']=='0'){?>
								<div class="panel-heading">
									<h4 class="panel-title">                                    
                                     <a href="productbycat.php?pbc=<?php echo $value['catId'];?>"><?php echo $value['catName'];?></a>
                                    </h4>
                                </div>
                                 <?php } }else{?>
								 <div class="panel-heading">
									<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#m<?php echo $value['catId'];?>">
									<span class="badge pull-right"><i class="fa fa-plus"></i></span>
									<?php  echo $value['catName'];?>
									</a>
									</h4>
								</div>
									<?php } ?>
									
								<div id="m<?php echo $value['catId'];?>" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
										<?php
										  $aid = $value['catId'];
                                          $aquery = $cat->showSubCategoryById($aid);
                                          if($aquery){
                                          	while ($svalue= $aquery->fetch_assoc()) {                                        
										?>
											<li><a href="productbycat.php?pbc=<?php echo $svalue['catId'];?>"><?php echo  $svalue['catName']; ?></a></li>
											<?php } }?>
										</ul>
									</div>
								</div>
						     	<?php } }?>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php
                                  $bresult = $br->showBrand();
                                  if($bresult){
                                  	while ($bvalue = $bresult->fetch_assoc()) {
                                  	$hid = $bvalue['brandId'];
                                  	$gbn = $pd->brandProductNumberById($hid);
								?>
									<li><a href="productbybrand.php?pbo=<?php echo $bvalue['brandId'];?>"> <span class="pull-right">(<?php if(isset($gbn)) echo $gbn;?>)
									</span><?php echo $bvalue['brandName'];?></a></li>
								<?php } }?>
								</ul>
							</div>
						</div><!--/brands_products-->					
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
					<?php
                   $productdetails = $pd->productDetailsById($pdetails);
                   if($productdetails){
                   	while ($result = $productdetails->fetch_assoc()) {
                   		$pcatid = $result['productCat'];
                   		
				?>	
						<div class="col-sm-5">
							<div class="view-product">
								<img src="myadmin/<?php echo $result['image'];?>" alt="" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
								    <?php
                                $item1 = $pd->getRelatedPro($pcatid);
                                if($item1){
                                	$j=0;
                            	while ($rvalue2=$item1->fetch_assoc()) {
                            		$j++;
							?>	
								<div class="item <?php if($j==1) echo "active";?> hmm">
								  <img src="myadmin/<?php echo $rvalue2['image'];?>" alt="" ">
								  <img src="myadmin/<?php echo $rvalue2['image'];?>" alt="" ">
								  <img src="myadmin/<?php echo $rvalue2['image'];?>" alt="" ">	 
								</div>
								<?php } } ?>
								
							</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
							  <?php 
							    if($result['productCond']=='0') {?>
                                  <img src="images/product-details/new.jpg" class="newarrival" alt="" />
							 <?php } ?>
								
								<h2><?php echo $result['productName'];?></h2>
								<p>Web ID: 1089772</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span> $<?php echo $result['price'];?></span>
									<form style="display:inline;" action="#" method="post" >
									<label>Quantity:</label>
									<input type="text" value="3" name="quantity" />
									<button  class="btn btn-fefault cart" name="acart" value="Add to cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									<!--<i class="fa fa-shopping-cart"></i><input type="submit" class="btn btn-default cart" value="Add to cart" name="acart" />-->
									</form>
								</span>
								<p><b>Availability:</b> 
								<?php if($result['productAvail']=='0') {
								      echo "In Stock";
								 }else echo "Not In Stock" ?>
								</p>
								<p><b>Condition:</b> <?php if($result['productCond']=='0') {
								      echo "New";
								 }else echo "Old" ?></p>
								<p><b>Brand:</b> <?php echo $result['brandName'];?></p>
							</div><!--/product-information-->
						</div>
						
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews </a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="bbb">
								 <p><?php 
                                     echo nl2br(stripcslashes($result['body']));
								 ?></p>
								 </div>
							</div>
							
							
							<div class="tab-pane fade" id="companyprofile" >
						      <div class="bbb">
								 <p><?php 
                                     echo nl2br(stripcslashes($result['body']));
								 ?></p>
								 </div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
							  <div class="bbb">
								 <p><?php 
                                     echo nl2br(stripcslashes($result['body']));
								 ?></p>
								 </div>
							</div>
							<?php } }?>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
						<?php
                             $grv = $prv->showAllReview($pdetails);
                             if($grv){
                             	while ($revalue = $grv->fetch_assoc()) {
                            
						?>
								<ul>
									<li><a href=""><i class="fa fa-user"></i><?php echo $revalue['reviewName'];?></a></li>
									<li><a href=""><i class="fa fa-clock-o"></i><?php echo $fm->DateFormat2($revalue['date']);?></a></li>
									<li><a href=""><i class="fa fa-calendar-o"></i><?php echo $fm->DateFormat1($revalue['date']);?></a></li>
								</ul>
								<p><?php echo $revalue['reviewbody'];?></p>
								
							<?php  } }?>
									<p><b>Write Your Review</b></p>
									<form action="" method="post">
										<span>
											<input type="text" placeholder="Your Name" name="name" required="1" />
											<input type="email" placeholder="Email Address" name="email" required="1" />
										</span>
										<textarea name="body" required="1"></textarea>
										<input type="Submit" name="review" value="Submit" class="btn btn-success pull-right"/>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">related items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">

							<?php

                                 $gscat = $cat->selectCategoryRandomly();
                                 if($gscat){
                                 	$i=0;
                                 	while ($gcvalue = $gscat->fetch_assoc()) {
                                 $i++;
							?>
								<div class="item <?php if($i==1) echo "active";?>">
							<?php
                                $catid = $gcvalue['catId'];
                                $item = $pd->getRelatedPro($pcatid);
                                if($item){
                            	while ($rvalue=$item->fetch_assoc()) {
							?>	
									<div class="col-sm-4">
									 <div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo puzz1 text-center">
												<a href="preview.php?prodetails=<?php echo $rvalue['productId'];?>"><img src="myadmin/<?php echo $rvalue['image'];?>" alt="" /></a>
												<h2>$<?php echo $rvalue['price'];?></h2>
												<p><?php echo $rvalue['productName'];?></p>
												<a href="product-details.php?prdt=<?php echo $rvalue['productId'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									 </div>
									</div>
									<?php } }?>
								</div>
								<?php } }?>
						
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php include ('inc/footer.php');?>