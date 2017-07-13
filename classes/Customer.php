<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php

  class Customer
  {
  	    private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function customerRegistrationInsert($post){
	  		$customerName = $this->fm->validation($post['customerName']);
	  		$customerEmail = $this->fm->validation($post['customerEmail']);
	  		$customerPass = $this->fm->validation($post['customerPass']);


	  		$customerName  = mysqli_real_escape_string($this->db->link, $customerName);
	  		$customerEmail  = mysqli_real_escape_string($this->db->link, $customerEmail);
	  		$customerPass  = mysqli_real_escape_string($this->db->link, md5($customerPass));

	  	    if (!preg_match("/^[a-zA-Z ]*$/",$customerName)) {
			  $msg = "<span style='color:crimson;'>Name Only letters and white space allowed</span>";
				  return  $msg;
			}elseif (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
			  $msg = "<span style='color:crimson;'>Email Not Valid..</span>";
				  return  $msg;
			}else{
	  			 $cquery = "select * from forcustomer where customerEmail ='$customerEmail' limit 1";
	  			  $cresult = $this->db->select($cquery);
	  			  if($cresult){
                     $msg = "<span style='color:crimson;'>Email Already Exists...</span>";
	  			     return $msg;
	  			 }else{
	  			 	 $query="INSERT INTO forcustomer
	                (customerUsname,customerEmail,customerPass) VALUES 
	                ('$customerName','$customerEmail','$customerPass')";
	                $result = $this->db->insert($query);
	                if($result){
	                    $msg = "<span style='color:#83912B;font-size:18px;'>Account Created Successfully...Login Now</span>";
		  			     return $msg;
	                }else{
	                   $msg = "<span style='color:crimson;'>Account Not Created</span>";
		  			    return $msg;
                    }
	  			 }
	  		}

	  	}
        public function customerLogin($post){
        	$customeEmail = $this->fm->validation($post['customeEmail']);
        	$customerPassword = $this->fm->validation($post['customerPassword']);

        	$customeEmail  = mysqli_real_escape_string($this->db->link,$customeEmail);
        	$customerPassword  = mysqli_real_escape_string($this->db->link, md5($customerPassword));

        		$query = "SELECT * FROM forcustomer where customerEmail = '$customeEmail' AND customerPass='$customerPassword'";
        		$result = $this->db->select($query);
        		if($result){
        			$value = $result->fetch_assoc();
        				Session::set('cuslog',true);
        			    Session::set('cmrUser',$value['customerUsname']);
        			    Session::set('cmrId',$value['customerId']);
        			    Session::set('cmrEmail',$value['customerEmail']);
        			   // header("Location:index.php");
        			   echo "<script>window.location = 'index.php'</script>";
        			    
        		}else{
        			$msg = "<span style='color:crimson;'>Email & Password Not Matched..</span>";
	  			    return $msg;
        		}
        	
        }
        public function getCustomerById($id){
        	$query = "select * from forcustomer where customerId = '$id'";
        	$result = $this->db->select($query);
        	if($result){
        		return $result;
        	}
        }
        public function updateCustomerDataById($post,$epr){

        	$customerUsname = $this->fm->validation($post['customerUsname']);
	  		$cusFirstName = $this->fm->validation($post['cusFirstName']);
	  		$cusLastName = $this->fm->validation($post['cusLastName']);
	  		$customerEmail = $this->fm->validation($post['customerEmail']);
	  		$customerPass = $this->fm->validation(md5($post['customerPass']));
	  		$customerAddress = $this->fm->validation($post['customerAddress']);
	  		$customerAddress1 = $this->fm->validation($post['customerAddress1']);
	  		$customerCity = $this->fm->validation($post['customerCity']);
	  		$customerZipCode = $this->fm->validation($post['customerZipCode']);
	  		$customerCountry = $this->fm->validation($post['customerCountry']);
	  		$customerPhone = $this->fm->validation($post['customerPhone']);
	  		$CuCompName = $this->fm->validation($post['CuCompName']);


	  		$customerUsname  = mysqli_real_escape_string($this->db->link, $customerUsname);
	  		$cusFirstName  = mysqli_real_escape_string($this->db->link, $cusFirstName);
	  		$cusLastName  = mysqli_real_escape_string($this->db->link, $cusLastName);
	  		$customerEmail  = mysqli_real_escape_string($this->db->link, $customerEmail);
	  		$customerPass  = mysqli_real_escape_string($this->db->link, $customerPass);
	  		$customerAddress  = mysqli_real_escape_string($this->db->link, $customerAddress);
	  		$customerAddress1  = mysqli_real_escape_string($this->db->link, $customerAddress1);
	  		$customerCity  = mysqli_real_escape_string($this->db->link, $customerCity);
	  		$customerZipCode  = mysqli_real_escape_string($this->db->link, $customerZipCode);
	  		$customerCountry  = mysqli_real_escape_string($this->db->link, $customerCountry);
	  		$customerPhone  = mysqli_real_escape_string($this->db->link, $customerPhone);
	  		$CuCompName  = mysqli_real_escape_string($this->db->link, $CuCompName);

            if (!preg_match("/^[a-zA-Z ]*$/",$customerUsname)) {
			  $msg = "<span style='color:crimson;'>Name Only letters and white space allowed</span>";
				  return  $msg;
			}elseif (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
			  $msg = "<span style='color:crimson;'>Email Not Valid..</span>";
				  return  $msg;
			}else{
	                $query= "update forcustomer set
                    customerUsname = '$customerUsname',
                    cusFirstName = '$cusFirstName',
                    cusLastName = '$cusLastName',
                    customerEmail = '$customerEmail',
                    customerPass = '$customerPass',
                    customerAddress = '$customerAddress',
                    customerAddress1 = '$customerAddress1',
                    customerCity = '$customerCity',
                    customerZipCode = '$customerZipCode',
                    customerCountry = '$customerCountry',
                    customerPhone = '$customerPhone',
                    CuCompName = '$CuCompName'
	                where customerId = '$epr'";
	                $result = $this->db->update($query);
	                if($result){
	                    /*$msg = "<span style='color:#83912B;font-size:18px;'>Data Updated Successfully</span>";*/
	                    $msg = "<script>alertify.alert('Data Updated Successfully')</script>";
		  			     return $msg."<meta http-equiv='refresh' content='3;URL=profile.php'/>";
	                }else{
	                   $msg = "<span style='color:crimson;'>Data Not Updated</span>";
		  			    return $msg;
                 } 
	  		}
        }


  }


?>