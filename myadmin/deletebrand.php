<?php
include '../lib/Session.php';
Session::checkSession();
?>
<?php include '../classes/Brand.php';  
    $brand = new Brand();
?>
<?php
	  if(!isset($_GET['deletebrand']) && $_GET['deletebrand']==NULL){
	     echo "<script>window.location='showbrand.php'</script>";
	  }else{
	      $deletebrand = $_GET['deletebrand'];
          $deletebd = $brand->delBrandById($deletebrand);
          if(isset($deletebd)){
          	 echo $deletebd;
          	 echo "<script>window.location='showbrand.php'</script>";
          }
	  }

?>
