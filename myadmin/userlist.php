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
        Admin User List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active">Admin User List</li>
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
                  <th>Serial No.</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
          <?php
              $result = $af->showUserList();
              if($result){
              $i =0 ;
              while ($value = $result->fetch_assoc()) {
               $i++;
          ?>
                <tr>
                  <td><?php echo  $i;?></td>
                  <td><?php echo $value['AdminName'];?></td>
                  <td><?php echo $value['AdminUser'];?></td>
                  <td><?php echo $value['AdminEmail'];?></td>
                  <td>
                   <?php if($value['level']==0)
                   echo "Administration";
                 elseif($value['level']==1)
                  echo "Author";
                 else
                  echo "Editor";?></td>
                 <td>
                 <?php 
                if(Session::get('adminrole') =='0'){ ?>
                 <a onclick ="confirm('Are You Sure To Delete?');" href="deleteuserlist.php?audel=<?php echo $value['AdminId'];?>">Delete</a>
                 <?php } else
                   echo "N/A";
                  ?>
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