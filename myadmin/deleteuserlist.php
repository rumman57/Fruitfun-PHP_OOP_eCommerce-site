<?php
include '../lib/Session.php';
Session::checkSession();
?>
<?php include '../classes/Adminprofile.php';  
    $af = new Adminprofile();
?>
<?php
	  if(!isset($_GET['audel']) && $_GET['audel']==NULL){
	     echo "<script>window.location='userlist.php'</script>";
	  }else{
	      $audel = $_GET['audel'];
          $dmsg = $af->delUserById($audel);
          if(isset($dmsg)){
          	 echo $dmsg;
          	 echo "<script>window.location='userlist.php'</script>";
          }
	  }

?>
