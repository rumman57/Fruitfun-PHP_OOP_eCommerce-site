<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");

 class Cart
 {
 	
 	    private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function insetProToCartById($id,$quantity){

	  		$quantity = $this->fm->validation($quantity);
	  		$productId = $this->fm->validation($id);

	  		$quantity  = mysqli_real_escape_string($this->db->link, $quantity);
	  		$productId  = mysqli_real_escape_string($this->db->link, $productId);
            $sId = session_id();

            $query = "select * from forproduct where productId = '$productId'";
            $result = $this->db->select($query)->fetch_assoc();

            $productName  = $result['productName'];
            $price        = $result['price'];
            $image       = $result['image'];

            $chquery = "select * from forcart where sId = '$sId' AND productId = '$productId'";
            $chresult = $this->db->select($chquery);
            if($chresult){
            	$msg = "<script>alertify.alert('Product Already Added To Cart')</script>";
            	return $msg;
            }else{
            	 $inquery = "INSERT INTO forcart (sId,productId,productName,price,quantity,image) VALUES 
                ('$sId','$productId','$productName','$price','$quantity','$image')";
	            $inresult = $this->db->insert($inquery);
	            if($inresult){
	                    $msg = "<script>alertify.alert('Product Added to the Cart Successfully...')</script>";
            	        return $msg;
	            }else{
	                  $msg = "<script>alertify.alert('OOOpps...Something wrong!!!! Product Not Added')</script>";
            	      return $msg;
	            }
            }    
	  	}
	  	public function getCartProducBySesseion(){
	  		$sId = session_id();
	  		$query = "select * from forcart where sId ='$sId'";
	  		$result = $this->db->select($query);
	  		if($result){
	  			return $result;
	  		}
	  	}
	  	public function updateByQuntity($upquantity,$cartproid){
	  		 $query = "update forcart set
              quantity = '$upquantity'
	  		 where cartId = '$cartproid'";
	  		 $result = $this->db->update($query);
	  		 if($result){
	  		 	return $result;
	  		 }
	  	}
	  	public function deleteCartProductById($delcartpd){
	  		$query = "delete from forcart where cartId = '$delcartpd'";
	  		$result = $this->db->delete($query);
	  		if($result){
	  			return true;
	  		}else{
	  			return false;
	  		}
	  	}
	  	public function deleteCartInLogOut(){
	  		$sId = session_id();
	  		$query = "delete from forcart where sId ='$sId'";
	  		$result = $this->db->delete($query);
	  		if($result){
	  			return $result;
	  		}
	  	}
	  	public function deleteCartAfterOrder(){
	  		$sId = session_id();
	  		$query = "delete from forcart where sId ='$sId'";
	  		$result = $this->db->delete($query);
	  		if($result){
	  			return $result;
	  		}
	  	}
	  
 }

?>