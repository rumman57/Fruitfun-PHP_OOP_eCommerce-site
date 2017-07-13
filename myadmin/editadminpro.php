<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php 
 include_once ('../classes/Adminprofile.php');
 $af = new Adminprofile();
 $fm = new Format();

   if(!isset($_GET['ape']) && $_GET['productedit']==NULL){
     echo "<script>window.location='adminprofile.php'</script>";
  }else{
     $aid = $_GET['ape'];
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $aumsg = $af->updateAdminProfile($_POST,$_FILES,$aid);
    }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">My Profile</a></li>
        <li class="active">Edit Admin Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                <small>Here you can edit your profile</small>
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
               if(isset($aumsg))
                echo $aumsg;
             ?>
             <?php
                $result = $af->showAdminValue($aid);
                if($result){
                  while ($value=$result->fetch_assoc()) {
             ?>
              <form action="" method="post" enctype="multipart/form-data" >
                <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">Admin Name</label>
                <input type="text" class="form-control" value="<?php echo $value['AdminName'];?>" name="AdminName">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">Admin Username</label>
                <input type="text" class="form-control" value="<?php echo $value['AdminUser'];?>" name="AdminUser">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">Admin Password</label>
                <input type="password" class="form-control" value="<?php echo $value['AdminPass'];?>" name="AdminPass">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">Admin Email</label>
                <input type="email" class="form-control" value="<?php echo $value['AdminEmail'];?>" name="AdminEmail">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">Photo of Admin</label>
                  <img src="<?php echo $value['AdminImage'];?>" height="80px" widht="80px"/>
                  <input type="file" class="form-control" name="AdminImage">
                </div>
                </div>
                 </div>
                 <div class="row">
                  <div class="col-xs-2">
                  <input type="submit" class="btn btn-primary btn-block btn-flat" value="Update Profile">
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
