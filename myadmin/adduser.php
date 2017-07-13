<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php 
 include_once ('../classes/Adminprofile.php');
 $af = new Adminprofile();
 $fm = new Format();
  if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $addmsg = $af->addAdminUser($_POST);
    }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Admin User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Add User</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                <small>Here add Admin User LIst</small>
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
               if(isset($addmsg))
                echo $addmsg;
             ?>
              <form action="" method="post" >
                <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">User Username</label>
                <input type="text" class="form-control" placeholder="User Name" name="AdminUser">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">User Password</label>
                <input type="password" class="form-control" placeholder="User Password" name="AdminPass">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="usr">User Email </label>
                <input type="email" class="form-control" placeholder="User Email" name="AdminEmail">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                </div>
                 </div>
                 <div class="row">
                 <div class="col-xs-4">
                <div class="form-group has-feedback">
                 <label for="sel1">User Role</label>
                <select class="form-control" id="sel1" name="userRole">
                  <option>Select Type</option>
                  <option value="0">Administration</option>
                  <option value="1">Author</option>
                  <option value="2">Editor</option>
                </select>
                 </div>
                </div>
                 </div>
                 <div class="row">
                  <div class="col-xs-2">
                  <input type="submit" class="btn btn-primary btn-block btn-flat" value="Update Profile">
                  </div>
                </div>
              </form>
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
