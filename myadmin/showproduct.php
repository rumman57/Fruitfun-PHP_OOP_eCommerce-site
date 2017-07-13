<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php 
   include '../classes/Product.php';  
   include_once '../helpers/format.php';  
    $pd = new Product();
    $fm = new Format();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Show Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">Show Product</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Num.</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product Description</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Type</th>
                  <th>Avail.</th>
                  <th>Cond.</th>
                  <th>Data</th>
                  <th>Edit Pr.</th>
                  <th>Delete Pr.</th>
                </tr>
                </thead>
                <tbody>
          <?php
              $result = $pd->showProduct();
              if($result){
              $i =0 ;
              while ($value = $result->fetch_assoc()) {
               $i++;
          ?>
                <tr>
                  <td><?php echo  $i;?></td>
                  <td><?php echo $value['productName'];?></td>
                  <td><?php echo $value['catName'];?></td>
                  <td><?php echo $value['brandName'];?></td>
                  <td><?php echo $fm->textExerpt($value['body'],45);?></td>
                  <td>$<?php echo $value['price'];?></td>
                  <td><img src="<?php echo $value['image'];?>" height="80" width="80"/></td>
                  <td><?php 
                   if($value['type']=='0')
                  echo "Featured";
                  else 
                   echo "Non Featured";?>
                  </td>
                  <td><?php 
                   if($value['productAvail']=='0')
                  echo "In Stock";
                  else 
                   echo "Stock Over";?>
                  </td>
                  <td><?php 
                   if($value['productCond']=='0')
                  echo "New";
                  else 
                   echo "Old";?>
                  </td>
                  <td><?php echo $fm->DateFormat1($value['date']);?></td>
                  <td style="text-align:center;">
                  <?php
                      if(Session::get('AdminId') == $value['productRole'] || Session::get('adminrole')=='0') { ?>
                     <a href="editproduct.php?productedit=<?php echo $value['productId'];?>">Edit</a>
                      <?php } else
                        echo "N/A";?>
                  </td>
                  <td style="text-align:center;">
                  <?php
                      if(Session::get('AdminId') == $value['productRole'] || Session::get('adminrole')=='0') { ?>
                    <a onclick = "return confirm('Are You Sure To Delete ?')" href="deleteproduct.php?deleteproduct=<?php echo $value['productId'];?>">Delete</a>
                    <?php } else
                        echo "N/A";?>
                  </td>
                </tr>
                <?php } }?>
                </tbody>             
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('inc/fortable.php');?>