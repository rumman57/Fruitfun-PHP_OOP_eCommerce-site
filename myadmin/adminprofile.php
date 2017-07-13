<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php
 include_once ('../classes/Adminprofile.php');
 $af = new Adminprofile();
 $fm = new Format();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Admin Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active">Admin Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <small>Below Show Admin Profile Details</small>
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
             <table id="example1" class="table table-bordered table-striped">
          <?php
               $id =  Session::get('AdminId');
              $user = Session::get('adminUser');
              $result = $af->getAdminProfileDetails($id);
             if($result){
              while ($value=$result->fetch_assoc()) {
          ?>
                <tr>
                  <th width="30%">Admin Name</th>
                  <td><?php echo $value['AdminName'];?></td>
                </tr>
                <tr>
                  <th width="30%">Admin Username</th>
                  <td><?php echo $value['AdminUser'];?></td>
                </tr>
                <tr>
                  <th width="30%">Admin Password</th>
                  <td><?php echo $value['AdminPass'];?></td>
                </tr>
                <tr>
                  <th width="30%">Admin Email</th>
                  <td><?php echo $value['AdminEmail'];?></td>
                </tr>
                <tr>
                  <th width="30%">Photo of Admin</th>
                  <td><img src="<?php echo $value['AdminImage'];?>" height="80" width="80"/></td>
                </tr>
                <tr>
                  <th width="30%">Admin Role</th>
                  <td>
                 <?php 
                  if($value['level']==0)
                   echo "Administration";
                 elseif($value['level']==1)
                  echo "Author";
                 else
                  echo "Editor";?>
                  </td>
                </tr>
                <tr>
                  <th width="30%">Member Since</th>
                  <td><?php echo $fm->DateFormat($value['AdminDate']);?></td>
                </tr>
                <?php } }?>            
              </table>
               <div style="margin-top:40px;margin-left:10px;">
               <a href="editadminpro.php?ape=<?php echo $id;?>"><button class="btn btn-primary">Edit Profile</button></a>
               </div>
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
