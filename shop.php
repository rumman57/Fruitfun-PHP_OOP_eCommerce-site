<?php include ('inc/header.php');?>

	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
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
						</div><!--/category-productsr-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
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
						
						<div style="margin-bottom: 30px;" class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Shop Items</h2>
						<?php
							$num_rec_per_page=9;
							if (isset($_GET["page"]))
							 { 
							 	$page  = $_GET["page"]; 
						     }
							  else {
							   $page=1; 
							} 
							$start_from = ($page-1) * $num_rec_per_page; 
							//$sql = "SELECT * FROM student LIMIT $start_from, $num_rec_per_page"; 
							//$rs_result = mysql_query ($sql); //run the query
                       $getpd = $pd->showProduct1($start_from, $num_rec_per_page);
                       if($getpd){
                       	while ($value = $getpd->fetch_assoc()) {
                     
				  ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="preview.php?prodetails=<?php echo $value['productId'];?>"><img src="myadmin/<?php echo $value['image'];?>" alt="" /></a>
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
							<?php
		                $gr = $pd->productPagination();
						$total_pages = ceil($gr / $num_rec_per_page); 

						?>	

						<ul class="pagination">
						<?php
						echo "<li class=\"active\"><a href='?page=1'>".'<<'."</a></li>"; // Goto 1st page
						for ($i=1; $i<=$total_pages; $i++) { 
                         echo "<li class=";
                          if(isset($_GET['page'])&& $_GET['page']==$i)
                          	echo 'active';
                         echo "><a href='?page=".$i."'>".$i."</a></li>";
                    } 
                    echo "<li class=\"active\"><a href='?page=$total_pages'>".'>>'."</a></li>"; // Goto last page
                    ?>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
<?php include ('inc/footer.php');?>