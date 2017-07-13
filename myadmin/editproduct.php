<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php include '../classes/Category.php';?>
<?php include '../classes/Brand.php';?>
<?php include '../classes/Product.php';
   $pd = new Product();

   if(!isset($_GET['productedit']) && $_GET['productedit']==NULL){
     echo "<script>window.location='showproduct.php'</script>";
  }else{
     $productedit = $_GET['productedit'];
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $productmsg = $pd->updateProductById($_POST,$_FILES,$productedit);
    }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Your Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li><a href="#">Show Product</a></li>
        <li class="active">Edit Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                <small>Here you can edit product</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
            <?php
               if(isset($productmsg))
                echo $productmsg;
             ?>
             <?php
                $result = $pd->showProductById($productedit);
                if($result){
                  while ($valuepr=$result->fetch_assoc()) {
             ?>
              <form action="" method="post" enctype="multipart/form-data" >
                <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">Name:</label>
                <input type="text" class="form-control" value="<?php echo $valuepr['productName'];?>" name="productName">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                 </div>
                <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="sel1">Select Category:</label>
                <select class="form-control" id="sel1" name="productCat">
                  <option>Select Category</option>
                   <?php
                       $cat = new Category();
                       $result = $cat->showCategory();
                       if($result){
                         while ($value=$result->fetch_assoc()) {
                   ?>
                   <option
                    <?php
                       if($valuepr['productCat']==$value['catId'])
                        echo "selected =\"selected\"";
                    ?> 
                   value="<?php echo $value['catId'];?>"><?php echo $value['catName'];?></option>
                   <?php } } ?>
                </select>
                 </div>
                </div>
                 </div>
                  <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="sel1">Select Brand:</label>
                <select class="form-control" id="sel1" name="productBrand">
                  <option>Select Brand</option>
                   <?php
                       $brand = new Brand();
                       $result = $brand->showBrand();
                       if($result){
                         while ($value=$result->fetch_assoc()) {
                   ?>
                  <option
                  <?php
                       if($valuepr['productBrand']==$value['brandId'])
                        echo "selected =\"selected\"";
                    ?> 
                   value="<?php echo $value['brandId'];?>"><?php echo $value['brandName'];?></option>
                   <?php } }?>
                </select>
                 </div>
                </div>
                 </div>
                 <div>
                  <label>Product Description:</label>
                  <textarea id="editor1" rows="10" cols="70" name="body">
                    <?php echo $valuepr['body'];?>
                  </textarea>
                  </div>
                  <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">Product Price:</label>
                  <input type="text" class="form-control" value="<?php echo $valuepr['price'];?>" name="price">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">Upload Image:</label>
                  <img src="<?php echo $valuepr['image'];?>" height="80px" widht="80px"/>
                  <input type="file" class="form-control" name="image">
                </div>
                </div>
                 </div>
                  <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="sel1">Product Feature:</label>
                <select class="form-control" id="sel1" name="type">
                  <option>Select Type</option>
                    <?php 
                      if($valuepr['type']=='1') { ?>
                        <option value="0">Featured</option>
                        <option value="1" selected =selected>Non Featured</option>
                       <?php } else { ?>
                         <option value="0" selected =selected>Featured</option>
                        <option value="1">Non Featured</option>
                       <?php } ?>
                </select>
                 </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="sel1">Product Availability:</label>
                <select class="form-control" id="sel1" name="Availability">
                  <option>Select Type</option>
                    <?php 
                      if($valuepr['type']=='1') { ?>
                        <option value="0">In Stock</option>
                        <option value="1" selected =selected>Stock Over</option>
                       <?php } else { ?>
                         <option value="0" selected =selected>In Stock</option>
                        <option value="1">Stock Over</option>
                       <?php } ?>
                </select>
                 </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="sel1">Product Condition:</label>
                <select class="form-control" id="sel1" name="Condition">
                  <option>Select Type</option>
                    <?php 
                      if($valuepr['type']=='1') { ?>
                        <option value="0">New</option>
                        <option value="1" selected =selected>Old</option>
                       <?php } else { ?>
                         <option value="0" selected =selected>New</option>
                        <option value="1">Old</option>
                       <?php } ?>
                </select>
                 </div>
                </div>
                 </div>
                 <div class="row">
                  <div class="col-xs-2">
                  <input type="submit" class="btn btn-primary btn-block btn-flat" value="Add Product">
                  </div>
                </div>
              </form>
              <?php } }?>
              <br><br>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('inc/foreditor.php');?>
