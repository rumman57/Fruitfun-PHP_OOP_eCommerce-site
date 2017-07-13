<?php
include '../lib/Session.php';
Session::checkSession();
?>
<?php include '../classes/Category.php';  
    $cat = new Category();
?>
<?php
	  if(!isset($_GET['deletecat']) && $_GET['deletecat']==NULL){
	     echo "<script>window.location='showcat.php'</script>";
	  }else{
	      $deletecat = $_GET['deletecat'];
          $deletecat = $cat->delCatById($deletecat);
          if(isset($deletecat)){
          	 echo $deletecat;
          	 echo "<script>window.location='showcat.php'</script>";
          }
	  }

?>
