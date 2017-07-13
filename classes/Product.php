<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class Product 
{
	    private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function insertProduct($post,$file){
	  		$productName  = $this->fm->validation($post['productName']);
	  		$productCat   = $this->fm->validation($post['productCat']);
	  		$productBrand = $this->fm->validation($post['productBrand']);
	  		$body         = $this->fm->validation($post['body']);
	  		$body         = $this->fm->RemoveTags($post['body']);
	  		$price        = $this->fm->validation($post['price']);
	  		$type         = $this->fm->validation($post['type']);
	  		$productRole         = $this->fm->validation($post['productRole']);
	  		$image        = $this->fm->validation($file['image']);


	  		$productName  = mysqli_real_escape_string($this->db->link, $productName);
	  		$productCat   = mysqli_real_escape_string($this->db->link, $productCat);
	  		$productBrand = mysqli_real_escape_string($this->db->link, $productBrand);
	  		$body         = mysqli_real_escape_string($this->db->link, $body);
	  		$price        = mysqli_real_escape_string($this->db->link, $price);
	  		$type         = mysqli_real_escape_string($this->db->link, $type);
	  		$productRole         = mysqli_real_escape_string($this->db->link, $productRole);
	  		$image        = mysqli_real_escape_string($this->db->link, $image);
            
             $fileformat = array('jpg','jpeg','png','gif');
	         $file_name = $file['image']['name'];
	         $file_size = $file['image']['size'];
	         $file_temp = $file['image']['tmp_name'];

	        $div = explode('.', $file_name);
	        $file_extension = strtolower(end($div));
	        $unique_name_image = substr(md5(time()),0,10).'.'.$file_extension;
	        $uploaded_directory_Imagename = "dist/img/".$unique_name_image;


	  		if(empty($productName) || empty($productCat) || empty($productBrand)|| empty($body) || empty($price)||  empty($file_name)){
	  			 $msg = "<span style='color:crimson;'>Filled  Must Not Be Empty...</span>";
	  			 return $msg;
	  		}elseif($file_size>1048576){
	             $msg = "<span style='color:crimson;'>File Size Not More Than 1MB</span>";
	  			 return $msg;
	        }elseif(in_array($file_extension, $fileformat)===false){
	            $msg = "<span style='color:crimson;'>You Can Upload Only : ".implode(' , ', $fileformat)."</span>";
	  			 return $msg;
	        }else{
                move_uploaded_file($file_temp, $uploaded_directory_Imagename);
                $query="INSERT INTO forproduct 
                (productName,productCat,productBrand,body,price,image,type,productRole) VALUES 
                ('$productName','$productCat','$productBrand','$body','$price','$uploaded_directory_Imagename','$type','$productRole')";
                $result = $this->db->insert($query);
                if($result){
                    $msg = "<span style='color:#83912B;font-size:18px;'>Product Inserted Successfully...</span>";
	  			     return $msg;
                }else{
                   $msg = "<span style='color:crimson;'>Product Not Inserted</span>";
	  			    return $msg;
                }
           }
	  	}
	  	public function showProduct(){
	  		/*$showquery = "SELECT forproduct.*,forcat.catName,forbrand.brandName 
	  		 FROM forproduct 
	  		 INNER JOIN forcat
	  		 ON forproduct.productCat = forcat.catId
	  		 INNER JOIN forbrand
	  		 ON forproduct.productBrand = forbrand.brandId
             order by forproduct.productId DESC";*/


            $showquery = "SELECT p.*,c.catName,b.brandName FROM forproduct as p,
                          forcat as c,forbrand as b 
                          WHERE p.productCat = c.catID AND p.productBrand = b.brandId 
                          order by p.productId DESC";


        	$showres = $this->db->select($showquery);
        	if($showres)
        	return $showres;
	  	}
	  	public function showProduct1($start_from, $num_rec_per_page){
	  		$showquery = "select * from forproduct order by productId  DESC LIMIT $start_from, $num_rec_per_page";
		    $showpostresult = $this->db->select($showquery);
		   if($showpostresult){
		   	  return $showpostresult;
		   }
	  	}
	  	public function showProductById($id){
	  		$showquery = "select * from forproduct where productId = $id";
		    $showpostresult = $this->db->select($showquery);
		   if($showpostresult){
		   	  return $showpostresult;
		   }
	  	}
	  	public function updateProductById($post,$file,$id){
            $productName  = $this->fm->validation($post['productName']);
	  		$productCat   = $this->fm->validation($post['productCat']);
	  		$productBrand = $this->fm->validation($post['productBrand']);
	  		$body         = $this->fm->validation($post['body']);
	  		$body         = $this->fm->RemoveTags($post['body']);
	  		$price        = $this->fm->validation($post['price']);
	  		$type         = $this->fm->validation($post['type']);
	  		$avail        = $this->fm->validation($post['Availability']);
	  		$cond         = $this->fm->validation($post['Condition']);
	  		$image        = $this->fm->validation($file['image']);


	  		$productName  = mysqli_real_escape_string($this->db->link, $productName);
	  		$productCat   = mysqli_real_escape_string($this->db->link, $productCat);
	  		$productBrand = mysqli_real_escape_string($this->db->link, $productBrand);
	  		$body         = mysqli_real_escape_string($this->db->link, $body);
	  		$price        = mysqli_real_escape_string($this->db->link, $price);
	  		$type         = mysqli_real_escape_string($this->db->link, $type);
	  		$avail         = mysqli_real_escape_string($this->db->link, $avail);
	  		$cond         = mysqli_real_escape_string($this->db->link, $cond);
	  		$image        = mysqli_real_escape_string($this->db->link, $image);
            
             $fileformat = array('jpg','jpeg','png','gif');
	         $file_name = $file['image']['name'];
	         $file_size = $file['image']['size'];
	         $file_temp = $file['image']['tmp_name'];

	        $div = explode('.', $file_name);
	        $file_extension = strtolower(end($div));
	        $unique_name_image = substr(md5(time()),0,10).'.'.$file_extension;
	        $uploaded_directory_Imagename = "dist/img/".$unique_name_image;


	  		if(empty($productName) || empty($productCat) || empty($productBrand)|| empty($body) || empty($price)){
	  			 $msg = "<span style='color:crimson;'>Filled  Must Not Be Empty...</span>";
	  			 return $msg;
	  		}
	  		elseif(!empty($file_name)){
		  			if($file_size>1048576){
		             $msg = "<span style='color:crimson;'>File Size Not More Than 1MB</span>";
		  			 return $msg;
		        }elseif(in_array($file_extension, $fileformat)===false){
		            $msg = "<span style='color:crimson;'>You Can Upload Only : ".implode(' , ', $fileformat)."</span>";
		  			 return $msg;
		        }else{
	                move_uploaded_file($file_temp, $uploaded_directory_Imagename);
	                $query="UPDATE forproduct SET
	                productName   = '$productName',
	                productCat    = '$productCat',
	                productBrand  = '$productBrand',
	                body          = '$body',
	                price         = '$price',
	                image         = '$uploaded_directory_Imagename',
	                type          = '$type',
	                productAvail  = '$avail',
	                productCond   = '$cond'
	                 WHERE productId = '$id'";
	                $result = $this->db->update($query);
	                if($result){
	                    $msg = "<span style='color:#83912B;font-size:18px;'>Product Updated Successfully...</span>";
		  			     return $msg."<script>setTimeout(\"location.href ='showProduct.php';\",2000);</script>";;
	                }else{
	                   $msg = "<span style='color:crimson;'>Product Not Updated</span>";
		  			    return $msg;
	                }
	           }
	  	   }else{

	  	   	    $query="UPDATE forproduct SET
                productName   = '$productName',
                productCat    = '$productCat',
                productBrand  = '$productBrand',
                body          = '$body',
                price         = '$price',
                type          = '$type',
                productAvail  = '$avail',
                productCond   = '$cond'
                 WHERE productId = '$id'";
                $result = $this->db->update($query);
                if($result){
                    $msg = "<span style='color:#83912B;font-size:18px;'>Product Updated Successfully...</span>";
	  			     return $msg."<script>setTimeout(\"location.href ='showproduct.php';\",2000);</script>";;
                }else{
                   $msg = "<span style='color:crimson;'>Product Not Updated</span>";
	  			    return $msg;
                }
	  	   }
	  		
	  	}
	  	public function delProductById($id){
	  		$query = "select * from forproduct where productId= $id";
		     $result = $this->db->select($query);
		     if($result){
		     	while ($value = $result->fetch_assoc()) {
		     		$getimage = $value['image'];
		     		unlink($getimage);
		     	}
		     }
		     $deletequery = "delete from forproduct where productId = $id";
		     $deleteresult = $this->db->delete($deletequery);
		     if($deleteresult){
		     	 return "<script>confirm('Product Deleted Successfully...')</script>";
		     }else{
		     	return "<script>confirm('Product Not Deleted')</script>";
		     }
	  	}
	  	public function getFeaturedProduct(){
	  		$showquery = "select * from forproduct where type='0' order by rand()  DESC LIMIT 6";
		    $showpostresult = $this->db->select($showquery);
		   if($showpostresult){
		   	  return $showpostresult;
		   }
	  	}
	  	public function getNewProduct(){
	  		$showquery = "select * from forproduct  order by productId  DESC LIMIT 4";
		    $showpostresult = $this->db->select($showquery);
		   if($showpostresult){
		   	  return $showpostresult;
		   }
	  	}
	  	public function productDetailsById($pdetails){
	  		$showquery = "SELECT p.*,c.catName,b.brandName FROM forproduct as p,
                          forcat as c,forbrand as b 
                          WHERE p.productCat = c.catID AND p.productBrand = b.brandId AND p.productId = '$pdetails'";
        	$showres = $this->db->select($showquery);
        	if($showres)
        	return $showres;
	  	}
	  	public function getRandomGrapeProduct(){
	  	$query = "select * from forproduct where productCat='12' order by rand() LIMIT 4";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	  	}
	  	public function getRandomPineappleProduct(){
	  		$query = "select * from forproduct where productCat='16' order by rand() LIMIT 4";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	  	}
	  	public function getRandomAppleProduct(){
	  	$query = "select * from forproduct where productCat='18' order by rand() LIMIT 4";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	  	}
	  	public function getRandomLemonProduct(){
	  	$query = "select * from forproduct where productCat='14' order by rand() LIMIT 4";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	  	}
	  	public function getRandomStrawberryProduct(){
	  	$query = "select * from forproduct where productCat='17' order by rand() LIMIT 4";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	  	}
	  	public function getProductByCategoryWise($catid){
	  		$query = "select * from forproduct where productCat='$catid' order by productId  DESC";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	  	}
	  	public function getThreeRecommendedPro($catid){
	  		$query = "select * from forproduct where productCat='$catid' order by rand() LIMIT 3";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	  	}
	  	public function getRelatedPro($pdetails){
	  		$query = "select * from forproduct where productCat='$pdetails' order by rand() LIMIT 3";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	  	}
	   public function productPagination(){
	   	  $sql = "SELECT * FROM forproduct"; 
		  $result = $this->db->select($sql);
		   if($result){
		   $total_records = mysqli_num_rows($result);  //count number of records
		   return $total_records;
			}else{
				return 0;
			}
	   }
	   public function productPaginationInBrand($brandid){
          $sql = "SELECT * FROM forproduct where productBrand = '$brandid'"; 
		  $result = $this->db->select($sql);
		   if($result){
		   $total_records = mysqli_num_rows($result);  //count number of records
		   return $total_records;
			}else{
				return 0;
			}
	   }
	   public function productPaginationInCat($catid){
	   	  $sql = "SELECT * FROM forproduct where productCat = '$catid'"; 
		  $result = $this->db->select($sql);
		   if($result){
		   $total_records = mysqli_num_rows($result);  //count number of records
		   return $total_records;
			}else{
				return 0;
			}
	   }
	   public function brandProductNumberById($hid){
	   	 $sql = "SELECT * FROM forproduct where productBrand = '$hid'"; 
		  $result = $this->db->select($sql);
		  if($result){
		   $total_records = mysqli_num_rows($result);  //count number of records
		   return $total_records;
		}else{
			return 0;
		}
	   }
	   public function showBrandProductById($brandid,$start_from, $num_rec_per_page){
	   	 $query = "select * from forproduct where productBrand='$brandid' order by productId DESC LIMIT $start_from, $num_rec_per_page";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	   }

	   public function showCatProductById($catid,$start_from, $num_rec_per_page){
	   	 $query = "select * from forproduct where productCat='$catid' order by productId DESC LIMIT $start_from, $num_rec_per_page";
		    $result = $this->db->select($query);
		   if($result){
		   	  return $result;
		   }
	   }
	  	

}


?>