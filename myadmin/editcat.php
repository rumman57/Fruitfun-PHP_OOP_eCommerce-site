<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php
include '../classes/Category.php';  
    $cat = new Category();
  if(!isset($_GET['catedit']) && $_GET['catedit']==NULL){
     echo "<script>window.location='showcat.php'</script>";
  }else{
     $catedit = $_GET['catedit'];
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $catName = $_POST['catName'];
      $catupdatemsg = $cat->updateCatById($catedit,$catName);
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Updated Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
        <li class="active">Show Category</li>
        <li class="active">Edit Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <small>Below Update your category</small>
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
                  $getcat = $cat->getCatById($catedit);
                  while ($result = $getcat->fetch_assoc()) { 
            ?>

            <form action="" method="post">
             <?php
                 if(!empty($catupdatemsg))
                  echo $catupdatemsg;
             ?> 
                  <div class="row">
                   <div class="col-xs-5">
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" value="<?php echo $result['catName'];?>" name="catName">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  </div>
                  </div>
                   <div class="row">
                  <div class="col-xs-2">
                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Update">
                  </div>
                </div>
            </form>
            <?php } ?>
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
