<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class Category 
{
	
	    private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function addCategory($catName,$catRole,$subCat){

	  		$catNm = $this->fm->validation($catName);
	  		$catRole = $this->fm->validation($catRole);
	  		$subCat = $this->fm->validation($subCat);

	  		$catNm = mysqli_real_escape_string($this->db->link,$catNm);
	  		$catRole = mysqli_real_escape_string($this->db->link,$catRole);
	  		$subCat = mysqli_real_escape_string($this->db->link,$subCat);

	  		if(empty($catNm)){
	  			$msg = "<span style='color:crimson;'>Category Name Must Not Be Empty...</span>";
	  			return $msg;
	  		}else{
	  			$cquery = "select * from forcat where catName ='$catNm' limit 1";
	  			$cresult = $this->db->select($cquery);
	  			if($cresult){
                     $msg = "<span style='color:crimson;'>Category Already Exists...</span>";
	  			     return $msg;
	  			}else{
                   $query = "INSERT INTO forcat (catName,catRole,catParent) VALUES ('$catNm','$catRole','$subCat')";
                   $result = $this->db->insert($query);
                   if(!$result){
                      $msg = "<span style='color:crimson;'>Category Not Inserted..</span>";
	  			      return $msg;
                   }else{
                   	  $msg = "<span style='color:#83912B;font-size:18px;'>Category Inserted Successfully...</span>";
	  			      return $msg;
                   }
	  			}
	  		}
	  	}

        public function showCategory(){
        	$showquery = "select * from forcat order by catId DESC";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        }
        public function showSubCategoryInAdminPanel(){
        	$showquery = "select * from forcat where catParent='0'";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        }
        public function checkCategoryById($ck){
        	$showquery = "select * from forcat where catParent='$ck'";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        	else return false;
          }
        public function showSubCategoryById($aid){
        	$showquery = "select * from forcat where catParent='$aid'";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
          }

        public function updateCatById($catedit,$catName){

        	$catedit = $this->fm->validation($catedit);
        	$catedit = mysqli_real_escape_string($this->db->link,$catedit);
        	$catName = $this->fm->validation($catName);
	  		$catName = mysqli_real_escape_string($this->db->link,$catName);
	  		if(empty($catName)){
	  			$msg = "<span style='color:crimson;'>Category Name Must Not Be Empty...</span>";
	  			return $msg;
	  		}else{
	        	$query = "update forcat set
	             catName = '$catName'
	        	where catId='$catedit'";
	        	$result = $this->db->update($query);
	        	if($result){
	               $msg = "<span style='color:#83912B;font-size:18px;'>Category Updated Successfully...</span>";
		  		   return $msg."<script>setTimeout(\"location.href ='showcat.php';\",2000);</script>";
	        	}else{
	        		$msg = "<span style='color:crimson;'>Category Not Updated</span>";
		  			return $msg;
	        	}
          }
        }
        public function getCatById($catedit){
        	$cquery = "select * from forcat where catId ='$catedit'";
	  		 $cresult = $this->db->select($cquery);
	  			if($cresult){
                     return $cresult;
	  			}
        }
        public function delCatById($deletecat){
        	$query = "delete from forcat where catId='$deletecat'";
        	$result =  $this->db->delete($query);
        	if($result){
        		return "<script>confirm('Category Deleted Successfully...')</script>";
        	}else{
        		return "<script>alarm('Category Not Deleted Successfully...')</script>";
        	}
        }
        public function getOnlyCategoryNameById($catid){
        	$cquery = "select * from forcat where catId ='$catid'";
	  		 $cresult = $this->db->select($cquery);
	  			if($cresult){
	  				while ($value = $cresult->fetch_assoc()) {
	  					$name = $value['catName'];
	  					return $name;
	  				}
                     
	  			}
        }
        public function selectCategoryRandomly(){
          $cquery = "select * from forcat where catId in ('12','15','13','18','20','22') order by rand() DESC limit 3";
         $cresult = $this->db->select($cquery);
          if($cresult){
             return $cresult;
          }
        }
        public function selectProductDetailsCarosel($pdetails){
        $cquery = "select * from forcat where catId ='$pdetails' order by rand() DESC limit 3";
         $cresult = $this->db->select($cquery);
          if($cresult){
             return $cresult;
          }
      }

}
?>