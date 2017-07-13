<?php
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php

 class Order
 {
 	
 	    private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function InsertOrderBySeId($id){
            $id = $this->fm->validation($id);
	  		$id  = mysqli_real_escape_string($this->db->link, $id);

            $sId = session_id();
            $query = "select * from forcart where sId = '$sId'";
            $result = $this->db->select($query);
            if($result)
            {
            	while ($value = $result->fetch_assoc()) {
            		$productId = $value['productId'];
            		$productName = $value['productName'];
            		$quantity = $value['quantity'];
            		$price = $value['price'] * $quantity;
            		$image= $value['image'];
            		 $inquery = "INSERT INTO fororder (orderId,productId,productName,quantity,price,image) VALUES 
                        ('$id','$productId','$productName','$quantity','$price','$image')";
                     $insertrow = $this->db->insert($inquery);
            	}
            }   
	  	}
	  	public function totalOrderedAmount($id){
	  		$query = "select * from fororder where orderId='$id' AND date = now()";
            $result = $this->db->select($query);
            if($result)
            	return $result;
	  	}
	  	public function delOrderInLogOutById($id){
	  		$query = "delete from fororder where orderId = '$id'";
	  		$result = $this->db->delete($query);
	  		if($result){
	  			return $result;
	  	   }
	  	}
        public function getOrderDataById($id){
            $query = "select * from fororder where orderId='$id' and status!='2' order by date DESC";
            $result = $this->db->select($query);
            if($result)
                return $result;
        }
        public function checkOrderById($cid){
            $query = "select * from fororder where orderId='$cid'";
            $result = $this->db->select($query);
            if($result){
                return $result;
            }
        }
        public function getAllOrder(){
            $gquery = "select * from fororder where status ='0' order by date DESC";
            $garesult = $this->db->select($gquery);
            if($garesult){
                return $garesult;
            }
        }
        public function getAllShiftedOrder(){
            $gquery = "select * from fororder where status ='1' order by date DESC";
            $garesult = $this->db->select($gquery);
            if($garesult){
                return $garesult;
            }
        } 
        public function shiftProductByUpdateStatus($scud,$price,$date){
            $query = "update fororder set
            status = '1'
            where orderId='$scud' and price=$price and date='$date'";
            $result = $this->db->update($query);
            if($result){
                $msg = "Product Shifted Successfully";
                return $msg;
            }else{
                $msg = "Product Not Shifted ";
                return $msg;
            }
        }
        public function deleteShiftedProduct($removeid,$price,$date){
        $query = "delete from fororder where orderId='$removeid' and price=$price and date='$date'";
            $result = $this->db->delete($query);
            if($result){
                $msg = "Product Deleted Successfully";
                return $msg;
            }else{
                $msg = "Product Not Deleted ";
                return $msg;
            }
        }
        public function unshiftedToShiftedProduct($unshift,$price,$date){
            $query = "update fororder set
            status = '0'
            where orderId='$unshift' and price=$price and date='$date'";
            $result = $this->db->update($query);
            if($result){
                $msg = "Product Unshifted Successfully";
                return $msg;
            }else{
                $msg = "Product Not Unshifted ";
                return $msg;
            }
        }
        public function cancelOrderByCustomer($robc,$price,$date){
            $query = "update fororder set
            status = '2'
            where orderId='$robc' and price=$price and date='$date'";
            $result = $this->db->update($query);
            if($result){
                $msg = "Product Unshifted Successfully";
                return $msg;
            }else{
                $msg = "Product Not Unshifted ";
                return $msg;
            }
        }
        public function getAllCanceledOrder(){
            $gquery = "select * from fororder where status ='2' order by date DESC";
            $garesult = $this->db->select($gquery);
            if($garesult){
                return $garesult;
            }
        }
 }
?>