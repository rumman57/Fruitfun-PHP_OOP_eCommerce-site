<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php include '../classes/Category.php';  
    $cat = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $catName = $_POST['catName'];
      $catRole = $_POST['catRole'];
      $subCat = $_POST['subCat'];
      $catmsg = $cat->addCategory($catName,$catRole,$subCat);
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADD Category Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
        <li class="active">Add Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <small>Below add your category</small>
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
          if(!empty($catmsg)){
             echo $catmsg;
          }

     ?>
         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Category Name" name="catName">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>
          <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="sel1">Select Sub Category:</label>
                <select class="form-control" id="sel1" name="subCat">
                  <option>Select Sub Category</option>
                   <?php
                       $cat = new Category();
                       $result = $cat->showSubCategoryInAdminPanel();
                       if($result){
                         while ($value=$result->fetch_assoc()) {
                   ?>
                   <option value="<?php echo $value['catId'];?>"><?php echo $value['catName'];?></option>
                   <?php } } ?>
                </select>
                 </div>
                </div>
          </div>
         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <input type="hidden" class="form-control" value="<?php echo Session::get('AdminId');?>" name="catRole">
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
