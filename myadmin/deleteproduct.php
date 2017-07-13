<?php
include '../lib/Session.php';
Session::checkSession();
?>
<?php include '../classes/Product.php';  
    $pd = new Product();
?>
<?php
	  if(!isset($_GET['deleteproduct']) && $_GET['deleteproduct']==NULL){
	     echo "<script>window.location='showproduct.php'</script>";
	  }else{
	      $deleteproduct = $_GET['deleteproduct'];
          $deleteproduct = $pd->delProductById($deleteproduct);
          if(isset($deleteproduct)){
          	 echo $deleteproduct;
          	 echo "<script>window.location='showproduct.php'</script>";
          }
	  }

?>
