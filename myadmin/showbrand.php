<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php include '../classes/Brand.php';  
    $brand = new Brand();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Show Brand
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Brand</a></li>
        <li class="active">Show Brand</li>
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
                  <th>Number Of Brand</th>
                  <th>Name Of The Brand</th>
                  <th>Edit Brand</th>
                  <th>Delete Brand</th>
                </tr>
                </thead>
                <tbody>
          <?php
              $result = $brand->showBrand();
              if($result){
              $i =0 ;
              while ($value = $result->fetch_assoc()) {
               $i++;
          ?>
                <tr>
                  <td><?php echo  $i;?></td>
                  <td><?php echo $value['brandName'];?></td>
                  <td style="text-align:center;">
                  <?php
                      if(Session::get('AdminId') == $value['brandRole'] || Session::get('adminrole')=='0') { ?>
                     <a href="editbrand.php?brandedit=<?php echo $value['brandId'];?>">Edit</a>
                     <?php } else
                        echo "N/A";?>
                  </td>
                  <td style="text-align:center;">
                  <?php
                      if(Session::get('AdminId') == $value['brandRole'] || Session::get('adminrole')=='0') { ?>
                    <a onclick = "return confirm('Are You Sure To Delete ?')" href="deletebrand.php?deletebrand=<?php echo $value['brandId'];?>">Delete</a>
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