<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class Brand 
{
	    private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function addBrand($brandName,$brandRole){

	  		$brandName = $this->fm->validation($brandName);
	  		$brandRole = $this->fm->validation($brandRole);
	  		
	  		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
	  		$brandRole = mysqli_real_escape_string($this->db->link,$brandRole);
	  		if(empty($brandName)){
	  			$msg = "<span style='color:crimson;'>Brand Name Must Not Be Empty...</span>";
	  			return $msg;
	  		}else{
	  			$cquery = "select * from forbrand where brandName ='$brandName' limit 1";
	  			$cresult = $this->db->select($cquery);
	  			if($cresult){
                     $msg = "<span style='color:crimson;'>Brand Already Exists...</span>";
	  			     return $msg;
	  			}else{
                   $query = "INSERT INTO forbrand (brandName,brandRole) VALUES ('$brandName','$brandRole')";
                   $result = $this->db->insert($query);
                   if(!$result){
                      $msg = "<span style='color:crimson;'>Brand Not Inserted..</span>";
	  			      return $msg;
                   }else{
                   	  $msg = "<span style='color:#83912B;font-size:18px;'>Brand Inserted Successfully...</span>";
	  			      return $msg;
                   }
	  			}
	  		}
	  	}
	  	public function showBrand(){
        	$showquery = "select * from forbrand order by brandId DESC";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        }
        public function updateBrandById($brandedit,$brandName){
            
        	$brandedit = $this->fm->validation($brandedit);
        	$brandedit = mysqli_real_escape_string($this->db->link,$brandedit);

        	$brandName = $this->fm->validation($brandName);
	  		$brandName = mysqli_real_escape_string($this->db->link,$brandName);

	  		if(empty($brandName)){
	  			$msg = "<span style='color:crimson;'>Brand Name Must Not Be Empty...</span>";
	  			return $msg;
	  		}else{
                    $query = "update forbrand set
		             brandName = '$brandName'
		        	where brandId='$brandedit'";
		        	$result = $this->db->update($query);
		        	if($result){
		               $msg = "<span style='color:#83912B;font-size:18px;'>Brand Updated Successfully...</span>";
			  		   return $msg."<script>setTimeout(\"location.href ='showbrand.php';\",2000);</script>";
		        	}else{
		        		$msg = "<span style='color:crimson;'>Brand Not Updated</span>";
			  			return $msg;
		        	}
	  		   	
            }
        }
        public function getBrandById($brandedit){
        	$cquery = "select * from forbrand where brandId ='$brandedit'";
	  		 $cresult = $this->db->select($cquery);
	  			if($cresult){
                     return $cresult;
	  			}
        }
        public function delBrandById($deletebrand){
        	$query = "delete from forbrand where brandId='$deletebrand'";
        	$result =  $this->db->delete($query);
        	if($result){
        		return "<script>confirm('Brand Deleted Successfully...')</script>";
        	}else{
        		return "<script>alarm('Brand Not Deleted Successfully...')</script>";
        	}
        }
}

?>