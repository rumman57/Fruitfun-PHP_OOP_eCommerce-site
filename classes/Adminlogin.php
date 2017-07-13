<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Session.php");
  Session::checkLogin();
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
   class AdminLogin 
  {
	  	private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function adloginCheck($adminUser,$adminPass){
	  		$adUser = $this->fm->validation($adminUser);
	  		$chemd5 = '$adminPass';
	  		$adPass = md5($chemd5);
	  		$adPass = $this->fm->validation($adminPass);

	  		$adUser = mysqli_real_escape_string($this->db->link,$adUser);
	  		$adPass = mysqli_real_escape_string($this->db->link,$adPass);
	  		if(empty($adUser) || empty($adPass)){
	  			$loginmsg = "Username & Password Must Not Be Empty...";
	  			return $loginmsg;
	  		}else{
	  			$query = "SELECT * FROM foradmin WHERE AdminUser ='$adUser' AND AdminPass ='$adPass'";
	  			$result = $this->db->select($query);
	  			if($result){
	  				$value = $result->fetch_assoc();
	  				Session::set('login',true);
	  				Session::set('AdminId',$value['AdminId']);
	  				Session::set('adminName',$value['AdminName']);
	  				Session::set('adminUser',$value['AdminUser']);
	  				Session::set('adminPass',$value['AdminPass']);
	  				Session::set('adminEmail',$value['AdminEmail']);
	  				Session::set('adminDate',$value['AdminDate']);
	  				Session::set('adminrole',$value['level']);
	  				echo "<script>window.location = 'index.php'</script>";
	  				//header("Location: index.php");
	  			}else{
	  				$loginmsg = "Username & Password Not Matched";
	  			    return $loginmsg;
	  			}
	  		}
	  	}
	  	public function setCookie(){
             $cookie_name = '$adUser';
             $cookie_pass = '$adPass';
             $cookie_time = (3600 * 24 * 30); // 30 days
             setcookie ($cookie_name,'', time() + $cookie_time);
	  	}
	  	public function recoverAdminPassword($adminemail){
	  		 $email = $this->fm->validation($adminemail);
	  	   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $msg = "<span style='color:crimson;>Invalid Email</span>";
              return $msg;
           }else{
           	    $checkemail="select * from foradmin where AdminEmail = '$email'";
                $checkresult = $this->db->select($checkemail);
                 if(!$checkresult){
                    $msg = "<span style='color:crimson'>Email Not Matched</span>";
                    return $msg;
                 }else{
                    $result   = $checkresult->fetch_assoc();
                    $userid   = $result['AdminId'];
                    $username = $result['AdminUser'];

                    $password = substr($email,0,5);
                    $password .= rand(32434,45434);
                    $query= "update foradmin set
                      AdminPass = '$password'
                      where AdminId = '$userid'";
                    $update_row = $this->db->update($query);
                    if($update_row){
                     $to      = '$email';
                     $headers = 'rumman142228@gmail.com';
                     $subject = "Your Password Information..";
                     $message = "Your Username is : ".$username."\n"." Your New Password is : ".           $password."Visit Website Again To Log in";
                       $sendsms = mail($to, $subject, $message,$headers);
                       if($sendsms){
                            $msg = "<span style='color:#83912B;font-size:18px;'>We send your Password to your Email. Please, check your Eamil..</span>";
                            return $msg;
                       }else{
                            $msg = "<span style='color:crimson'>Password Not Sent By emial..</span>";
                            return $msg;
                       }

                    }else{
                        $msg = "<span style='color:crimson'>Ooops...soemthing went wrong..</span>";
                        return $msg;
                    }
                    
                 }
             }
	  	  }
  }


?>