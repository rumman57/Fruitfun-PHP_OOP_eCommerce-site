<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php include '../classes/Brand.php';  
    $cat = new Brand();
    $sid = Session::get('AdminId');
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $brandName = $_POST['brandName'];
      $brandRole = $_POST['brandRole'];
      $catbrand = $cat->addBrand($brandName,$brandRole);
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADD Brand Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Brand</a></li>
        <li class="active">Add Brand</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <small>Below add your brand</small>
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
           <form action="" method="post">

     <?php
          if(!empty($catbrand)){
             echo $catbrand;
          }

     ?>
         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Brand Name" name="brandName">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>
         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <input type="hidden" class="form-control" value="<?php echo Session::get('AdminId');?>" name="brandRole">
            
          </div>
          </div>
         </div>
          <div class="row">
          <!-- /.col -->
            <div class="col-xs-3">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="ADD">
            </div>
            <!-- /.col -->
          </div>
      </form>
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
