<?php include('inc/adminheader.php');?>
<?php include('inc/adminsidebar.php');?>
<?php include '../classes/Category.php';  
    $cat = new Category();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Show Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
        <li class="active">Show Category</li>
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
                  <th>Number Of Cat.</th>
                  <th>Name Of The Category</th>
                  <th>Edit Category</th>
                  <th>Delete Category</th>
                </tr>
                </thead>
                <tbody>
          <?php
              $result = $cat->showCategory();
              if($result){
              $i =0 ;
              while ($value = $result->fetch_assoc()) {
               $i++;
          ?>
                <tr>
                  <td><?php echo  $i;?></td>
                  <td><?php echo $value['catName'];?></td>
                  <td style="text-align:center;">
                  <?php
                      if(Session::get('AdminId') == $value['catRole'] || Session::get('adminrole')=='0') { ?>
                     <a href="editcat.php?catedit=<?php echo $value['catId'];?>">Edit</a>
                     <?php } else
                        echo "N/A";?>
                  </td>
                  <td style="text-align:center;">
                    <?php
                      if(Session::get('AdminId') == $value['catRole'] || Session::get('adminrole')=='0') { ?>
                      <a onclick = "return confirm('Are You Sure To Delete ?')" href="deletecat.php?deletecat=<?php echo $value['catId'];?>">Delete</a>
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