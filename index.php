<?php include ('inc/header.php');?>
<?php include ('inc/slider.php');?>	
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
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php
                       $getpd = $pd->getFeaturedProduct();
                       if($getpd){
                       	while ($value = $getpd->fetch_assoc()) {
                     
				?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="product-details.php?prdt=<?php echo $value['productId'];?>"><img src="myadmin/<?php echo $value['image'];?>" alt="" /></a>
											<h2>$<?php echo $value['price'];?></h2>
											<p><?php echo $value['productName'];?></p>
											<a href="product-details.php?prdt=<?php echo $value['productId'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $value['price'];?></h2>
												<p><?php echo $value['productName'];?></p>
												<a href="product-details.php?prdt=<?php echo $value['productId'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>	
							</div>
						</div>
							<?php } }?>
						
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#pineapple" data-toggle="tab">Pineapple</a></li>
								<li><a href="#grape" data-toggle="tab">Grape</a></li>
								<li><a href="#apple" data-toggle="tab">Apple</a></li>
								<li><a href="#lemon" data-toggle="tab">Lemon</a></li>
								<li><a href="#strawberry" data-toggle="tab">Strawberry</a></li>
							</ul>
						</div>
						<div class="tab-content">

                         
							<div class="tab-pane fade active in" id="pineapple" >
                          <?php
                            $ggrape = $pd->getRandomPineappleProduct();
                            if($ggrape){
                            	while ($gvalue=$ggrape->fetch_assoc()) {                          
                          ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo puzz text-center">
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>"><span style=""><img src="myadmin/<?php echo $gvalue['image'];?>"  alt="" /></a>
												<h2>$<?php echo $gvalue['price'];?></h2>
												<p><?php echo $gvalue['productName'];?></p>
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php } }?>
							</div>
							<div class="tab-pane fade in" id="grape" >
                          <?php
                            $ggrape = $pd->getRandomGrapeProduct();
                            if($ggrape){
                            	while ($gvalue=$ggrape->fetch_assoc()) {                          
                          ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo puzz text-center">
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>"><span style=""><img src="myadmin/<?php echo $gvalue['image'];?>"  alt="" /></a>
												<h2>$<?php echo $gvalue['price'];?></h2>
												<p><?php echo $gvalue['productName'];?></p>
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php } }?>
							</div>
							<div class="tab-pane fade  in" id="apple" >
                          <?php
                            $ggrape = $pd->getRandomAppleProduct();
                            if($ggrape){
                            	while ($gvalue=$ggrape->fetch_assoc()) {
                           
                          ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo puzz text-center">
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>"><img src="myadmin/<?php echo $gvalue['image'];?>" alt="" /></a>
												<h2>$<?php echo $gvalue['price'];?></h2>
												<p><?php echo $gvalue['productName'];?></p>
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php } }?>
							</div>
							<div class="tab-pane fade  in" id="lemon" >
                          <?php
                            $ggrape = $pd->getRandomLemonProduct();
                            if($ggrape){
                            	while ($gvalue=$ggrape->fetch_assoc()) {
                           
                          ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo puzz text-center">
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>"><img src="myadmin/<?php echo $gvalue['image'];?>" alt="" /></a>
												<h2>$<?php echo $gvalue['price'];?></h2>
												<p><?php echo $gvalue['productName'];?></p>
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php } }?>
							</div>
							<div class="tab-pane fade  in" id="strawberry" >
                          <?php
                            $ggrape = $pd->getRandomStrawberryProduct();
                            if($ggrape){
                            	while ($gvalue=$ggrape->fetch_assoc()) {
                           
                          ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo puzz text-center">
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>"><img src="myadmin/<?php echo $gvalue['image'];?>" alt="" /></a>
												<h2>$<?php echo $gvalue['price'];?></h2>
												<p><?php echo $gvalue['productName'];?></p>
												<a href="product-details.php?prdt=<?php echo $gvalue['productId'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php } }?>
							</div>
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
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
                                $item = $pd->getThreeRecommendedPro($catid);
                                if($item){
                            	while ($rvalue=$item->fetch_assoc()) {
							?>	
									<div class="col-sm-4">
									 <div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo puzz1 text-center">
												<a href="product-details.php?prdt=<?php echo $rvalue['productId'];?>"><img src="myadmin/<?php echo $rvalue['image'];?>" alt="" /></a>
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